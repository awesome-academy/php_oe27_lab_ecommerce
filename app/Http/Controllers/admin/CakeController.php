<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Repositories\cake\CakeRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\image\ImageRepositoryInterface;
use App\Http\Requests\CakeRequest;
use Illuminate\Support\Facades\DB;

class CakeController extends Controller
{
    protected $cake;
    protected $category;
    protected $image;

    public function __construct(
        CakeRepositoryInterface $cake,
        CategoryRepositoryInterface $category,
        ImageRepositoryInterface $image
    )
    {
        $this->category = $category;
        $this->cake = $cake;
        $this->image = $image;
    }

    public function index()
    {
        $cake = $this->cake->getAll();
        $image = $this->cake->getAllCake();

        return view('admin.cake.index', compact('cake', 'image'));
    }

    public function create()
    {
        $categoties = $this->category->getAll();

        return view('admin.cake.add', compact('categoties'));
    }

    public function store(CakeRequest $request)
    {
        $data = [
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'quanity' => $request->get('quanity'),
            'price' => $request->get('price'),
            'price_sale' => $request->get('price_sale'),
            'status' => $request->get('status'),
            'category_id' => $request->get('category_id')
        ];

        return DB::transaction(function () use ($data) {
            $cake = $this->cake->create($data);
            foreach ($data['image'] as $image) {
                $this->image->addImage($image, $cake->id);
            }

            return redirect(route('cake.index'))->with('message', trans('setting.add_success'));
        });
    }

    public function destroy($id)
    {
        try {
            $cake = $this->cake->delete($id);

            return redirect(route('cake.index'))->with('message', trans('setting.delete_success'));
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }
}
