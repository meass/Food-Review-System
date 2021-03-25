<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
    	'user_id',
    	'shop_id',
    	'rating',
    	'description'
    ];

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getTimeAgoAttribute()
    {
        $date = Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
        return $date;
    }
}
