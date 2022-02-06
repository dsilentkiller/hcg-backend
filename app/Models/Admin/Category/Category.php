<?php

namespace App\Models\Admin\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'created_by',
    	'image',
    	'slug',
    	'description',
    	'summary',
    	'title_tag',
    	'meta_keywords',
    	'meta_description',
    ];
    // public function destinations()
    // {
    //     return $this->hasMany(Destination::class, 'category_id');
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
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

