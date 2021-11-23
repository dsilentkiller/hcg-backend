<?php

namespace App\Models\Admin\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'top_heading',
        'slug',
        'description',
        'created_by',
        'image',
        'title_tag',
        'meta_keywords',
        'meta_description',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function user()
    {
        return $this->belongsTo(user::class , 'created_by');
    }
}
