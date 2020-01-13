<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\category\CategoryRepositoryInterface;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param User $user
     * @return Collection
     */
    public function getModel()
    {
        return Category::class;
    }

    public function getCat()
    {
        return Category::where('parent_id', null)->get();
    }
}
