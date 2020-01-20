<?php

namespace App\Repositories\image;

use App\Models\Image;
use App\Repositories\BaseRepository;
use App\Repositories\image\ImageRepositoryInterface;

class ImageRepository extends BaseRepository implements ImageRepositoryInterface
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param User $user
     * @return Collection
     */
    public function getModel()
    {
        return Image::class;
    }

    public function addImage($image, $cakeId)
    {
        $imageName = time() . $image->getClientOriginalName();
        $imageType = $image->getClientOriginalExtension();
        if (in_array($imageType, ['png', 'jpeg', 'jpg'])) {
            $image->move(config('setting.avatar.user'), $imageName);
        }
        return $this->store($imageName, $cakeId);
    }

    public function store($image, $cakeId)
    {
        return Image::create([
            'name' => $image,
            'cake_id' => $cakeId,
            'image' => $image,
        ]);
    }
}
