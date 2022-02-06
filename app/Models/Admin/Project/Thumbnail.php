<?php

namespace App\Models\Admin\project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Admin\project;

class Thumbnail extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'project_id',
    ];
    public function project()
    {
        return $this->belongsTo(project::class , 'project_id');
    }
}
