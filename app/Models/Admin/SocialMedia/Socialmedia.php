<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socialmedia extends Model
{
    use HasFactory;
    protected $fillable =[
        'facebooklink',
        'twitterlink',
        'viber_no',
        'whatapp_no',
        'linkdlinlink',
        'instagramlink',
        'phone_no',
        'address',



    ];
}
