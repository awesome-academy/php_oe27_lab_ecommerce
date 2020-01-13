<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cake;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $category = $this->category->getAll();

        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        $categories = $this->category->getCat();

        return view('admin.category.add', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $data = [
            'name' => $request->get('name'),
            'parent_id' => $request->get('parent_id'),
        ];

        $category = $this->category->create($data);

        return redirect(route('category.index'))->with('message', trans('setting.add_success'));
    }

    public function edit($id)
    {
        try
        {
            $category = $this->category->find($id);

            return view('admin.category.edit', compact('category'));
        }
        catch (ModelNotFoundException $e)
        {
            echo $e->getMessage();
        }
    }

    public function update(CategoryRequest $request, $id)
    {
        try
        {
            $data = [
              'name' => $request->get('name'),
              'parent_id' => $request->get('parent_id'),
            ];

            $category = $this->category->update($id, $data);

            return redirect(route('category.index'))->with('message', trans('setting.edit_success'));
        }
        catch (ModelNotFoundException $e)
        {
            echo $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try
        {
            $category = $this->category->delete($id);

            return redirect(route('category.index'))->with('message', trans('setting.delete_success'));
        }
        catch (ModelNotFoundException $e)
        {
            echo $e->getMessage();
        }
    }

}
