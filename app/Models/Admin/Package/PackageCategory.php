<?php

namespace App\Models\Admin\Package;

use App\Models\Admin\Package\Package;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable = [
        'name',
        'created_by',
        'category_id',
        'summary',
        'description',
        'title_tag',
        'meta_keywords',
        'meta_description',
        'image',
    ];
    public function user()
    {
        return $this->belongsTo(User::class , 'created_by');
    }
    public function packages()
    {
        return $this->hasMany(Package::class , 'package_category_id');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
