<?php

namespace App\Models\Admin\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable = [
        'title',
        // 'category_id',
        'category_name',
        'image',
        'description',
        'created_by',
        'summary',
        'title_tag',
        'meta_keywords',
        'meta_description',
        'thumbnail',
        'slug',

    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }

}
