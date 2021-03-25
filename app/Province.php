<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    protected $fillable = [
        'name'
    ];

    public function shops()
    {
        $this->hasMany('App\Shop');
    }
}
