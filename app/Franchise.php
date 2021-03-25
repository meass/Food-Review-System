<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    protected $table = 'francises';

    protected $fillable = [
        'name'
    ];

    public function shops()
    {
        $this->hasMany('App\Shop');
    }
}
