<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venderstory extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id', 'quote', 'w1', 'w2','w3','content1','img1','content2','img2','content3','meeting','execute','delivery','meet'
    ];
}
