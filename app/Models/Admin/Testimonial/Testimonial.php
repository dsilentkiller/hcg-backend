<?php
namespace App\Models\Admin\Testimonial;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'summary',
        'client_name',
        'profession',
        'created_by',
        'status',
    ];
}
