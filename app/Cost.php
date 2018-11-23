<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cost
 * @package App
 */
class Cost extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'category_id',
        'pay'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
