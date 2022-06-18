<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class story extends Model
{
    protected $fillable = [
        'img_url', 'likes','views', 'store_id','store_url'
    ];

    // public function country(){
    // 	return $this->belongsTo(Country::class);
    // }

    // public function city(){
    // 	return $this->hasMany(City::class);
    // }

    public function store()
    {
        return $this->belongsTo('App\Store', 'store_id');
    }
}
