<?php

namespace App\Models\Admin\Project;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable =[
        'image',
        'title',
        'created_by',
    	'name',
    	'project_category_id',
    	'summary',
        'description',
        'title_tag',
        'meta_keywords',
        'meta_description',
        'thumbnail',


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
        return $this->hasMany(Thumbnail::class, 'package_id');
    }
    public function category()
    {
        return $this->belongsTo(PackageCategory::class, 'package_category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
