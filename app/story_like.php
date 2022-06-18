<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class story_like extends Model
{
    protected $fillable = [
        'story_id', 'user_id',	'ip_address'
    ];
}
