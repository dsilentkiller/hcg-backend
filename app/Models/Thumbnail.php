<?php

namespace App\Models\Admin\Package;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Admin\Package;

class Thumbnail extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'package_id',
    ];
    public function package()
    {
        return $this->belongsTo(Package::class , 'package_id');
    }
}
