<?php

namespace App\Models\Admin\Project;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable=[
    	'title',
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
        return $this->belongsTo(User::class, 'created_by');
    }
    public function projects()
    {
        return $this->hasMany(project::class, 'project_category_id');
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
