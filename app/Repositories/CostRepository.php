<?php

namespace App\Repositories;

use App\Cost;
use App\Repositories\Interfaces\CostRepository as CostRepositoryInterface;
use App\Http\Resources\Cost as CostResource;

/**
 * Class CostRepository
 * @package App\Repositories
 */
class CostRepository implements CostRepositoryInterface
{

    /**
     * @param array $data
     * @param int $perPage
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|mixed
     */
    public function index(array $data, int $perPage)
    {
        $query = Cost::orderBy('updated_at', 'desc');

        if(!empty($data['category_id'])) {
            $query->where('category_id', '=', $data['category_id']);
        }
        if(!empty($data['date_from']) && !empty($data['date_to'])) {
            $query->where('created_at', '>=', $data['date_from'])
                ->where('created_at', '<=', $data['date_to']);
        }
        $costs = $query->paginate($perPage)->appends('paged');
        return CostResource::collection($costs);
    }

    /**
     * @param Cost $cost
     * @return CostResource|mixed
     */
    public function show(Cost $cost)
    {
        return new CostResource($cost);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        $business = Cost::create([
            'category_id' => array_get($data, 'category_id'),
            'pay' => array_get($data, 'pay')
        ]);
        return new CostResource($business);
    }

    /**
     * @param array $data
     * @param Cost $cost
     * @return CostResource|mixed
     */
    public function update(array $data, Cost $cost)
    {
        $updateData = [
            'category_id' => array_get($data, 'category_id'),
            'pay' => array_get($data, 'pay')
        ];
        $updateData = array_diff($updateData, array(null));

        $cost->update($updateData);
        return new CostResource($cost);
    }

    /**
     * @param Cost $cost
     * @return mixed|void
     * @throws \Exception
     */
    public function delete(Cost $cost)
    {
        $cost->delete();
    }

}
