<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    protected $fillable = array(
        'shop_id',
        'food_category_id',
        'name',
        'size',
        'price',
        'taste',
        'image'
    );

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
