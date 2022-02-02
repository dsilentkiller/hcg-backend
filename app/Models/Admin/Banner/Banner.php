<?php

namespace App\Models\Admin\Banner;
use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Request\BannerRequest;

class Banner extends Model
{
    use HasFactory;
    use softDeletes;

    use HasFactory;
    protected $fillable =[
        'title',
        'slug',
        'image'
    ];
}
