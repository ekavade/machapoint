<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venderhome extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id', 'content1', 'content2', 'tag','our_mission','our_vision','why_us','images','image1','image2','image3','content2images','num1','num2',
        'num3',
        'num4',
        'sign1',
        'sign2',
        'sign3',
        'sign4',
        'name1',
        'name2',
        'name3',
        'name4'
    ];
}