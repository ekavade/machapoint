<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendorteam extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id', 'image', 'name', 'position',
    ];

}
