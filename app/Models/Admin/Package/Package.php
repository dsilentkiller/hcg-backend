<?php

namespace App\Models\Admin\Package;

use App\Models\Admin\Package\PackageCategory;
use App\Models\Admin\Package\Thumbnail;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable = [
        'created_by',
        'name',
        'package_category_id',

        'start_from',
        'summary',

        'thumbnail',
        'title_tag',
        'meta_keywords',
        'meta_description',
        'slug',

    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function thumbnails()
    {
        return $this->hasMany(Thumbnail::class , 'package_id');
    }
    public function category()
    {
        return $this->belongsTo(PackageCategory::class , 'package_category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class , 'created_by');
    }

}
