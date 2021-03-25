<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';

    protected $fillable = [
        'name',
        'key',
        'activated',
        'address',
        'phone',
        'email',
        'website',
        'open_hour',
        'close_hour',
        'logo',
        'slider_img_1',
        'slider_img_2',
        'slider_img_3',
	];

    public function getRouteKeyName()
    {
        return 'name';
    }

	public function shopOwner()
    {
        return $this->belongsTo('App\ShopOwner');
    }

    public function foods()
    {
        return $this->hasMany('App\Food');
    }

    public function category()
    {
        return $this->hasOne('App\ShopCategory');
    }

    public function province()
    {
        return $this->belongsTo('App\Province');
    }

    public function franchise()
    {
        return $this->belongsTo('App\Franchise');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
