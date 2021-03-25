<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ShopOwner extends \TCG\Voyager\Models\User
{
    protected $table = 'shop_owners';

    protected $fillable = [
        'phone'
    ];

    public function shops()
    {
        return $this->hasMany('App\Shop');
    }
}
