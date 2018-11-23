<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 */
class Category extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function costs()
    {
        return $this->hasMany('App\Cost');
    }
}
