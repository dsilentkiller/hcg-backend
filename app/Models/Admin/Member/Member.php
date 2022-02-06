<?php

namespace App\Models\Admin\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'summary',
        'client_name',
        'profession',

    ];
}
