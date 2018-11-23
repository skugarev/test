<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryRepository;

/**
 * Class CategoriesController
 * @package App\Http\Controllers\Api
 */
class CategoriesController extends Controller
{

    /**
     * @var CategoryRepository|null
     */
    protected $categoryRepository = null;

    /**
     * CategoriesController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->categoryRepository->index();
    }

}
