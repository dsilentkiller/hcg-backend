<?php
namespace App\Models\Admin\Testimonial;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Support\ImageSupport;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'speech',
        'image',
        'summary',
        'status',
    ];
}