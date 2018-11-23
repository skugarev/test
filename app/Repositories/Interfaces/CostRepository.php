<?php

namespace App\Repositories\Interfaces;

use App\Cost;

/**
 * Interface CostRepository
 * @package App\Repositories\Interfaces
 */
interface CostRepository
{

    /**
     * @param array $data
     * @param int $perPage
     * @return mixed
     */
    public function index(array $data, int $perPage);

    /**
     * @param Cost $cost
     * @return mixed
     */
    public function show(Cost $cost);

    /**
     * @param $data
     * @return mixed
     */
    public function store(array $data);

    /**
     * @param array $data
     * @param Cost $cost
     * @return mixed
     */
    public function update(array $data, Cost $cost);

    /**
     * @param Cost $cost
     * @return mixed
     */
    public function delete(Cost $cost);
}
