<?php

namespace App\Repositories;

use App\Category;
use App\Repositories\Interfaces\CategoryRepository as CategoryRepositoryInterface;
use App\Http\Resources\Category as CategoryResource;

/**
 * Class CategoryRepository
 * @package App\Repositories
 */
class CategoryRepository implements CategoryRepositoryInterface
{

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|mixed
     */
    public function index()
    {
        return CategoryResource::collection(
            Category::get()
        );
    }

}
