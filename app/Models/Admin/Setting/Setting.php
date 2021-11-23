<?php

namespace App\Models\Admin\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'image',
        'logo',
        'icon',
        'description',
        'summary',
        'slug',
        'meta_keywords',
        'meta_description',
        'name',
        'email',
        'contact_no',
        'address',
    ];
}
