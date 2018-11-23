<?php

namespace App\Http\Controllers\Api;

use App\Cost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CostRequest;
use App\Repositories\Interfaces\CostRepository;

/**
 * Class CostsController
 * @package App\Http\Controllers\Api
 */
class CostsController extends Controller
{

    /**
     * @var CostRepository|null
     */
    protected $costRepository = null;

    /**
     * CostsController constructor.
     * @param CostRepository $costRepository
     */
    public function __construct(CostRepository $costRepository)
    {
        $this->costRepository = $costRepository;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->costRepository->index($request->all(), 10);
    }

    /**
     * @param Cost $cost
     * @return mixed
     */
    public function show(Cost $cost)
    {
        return $this->costRepository->show($cost);
    }

    /**
     * @param CostRequest $request
     * @return mixed
     */
    public function store(CostRequest $request)
    {
        return $this->costRepository->store($request->all());
    }

    /**
     * @param CostRequest $request
     * @param Cost $cost
     * @return mixed
     */
    public function update(CostRequest $request, Cost $cost)
    {
        return $this->costRepository->update($request->all(), $cost);
    }

    /**
     * @param Request $request
     * @param Cost $cost
     * @return int
     */
    public function delete(Request $request, Cost $cost)
    {
        $this->costRepository->delete($cost);
    }

}
