<?php
namespace App\Models\Admin\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'title',
        'name',
        'summary',
        'image',
        'happy_clients',
        'project_done',
        'created_by',
        'title_tag',
        'meta_description',
        'meta_keywords',

    ];
}

