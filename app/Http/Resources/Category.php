<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

/**
 * Class Category
 * @package App\Http\Resources
 */
class Category extends Resource
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        /** @var \App\Category $this */
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
