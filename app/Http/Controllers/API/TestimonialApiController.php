<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Testimonial\Testimonial;

class TestimonialApiController extends Controller
{
    //
    public function index(){
        return Testimonial::all();
    }

    public function show(Testimonial $Testimonial){
        return $Testimonial;
    }

    public function store(Request $request){
        $Testimonial = Testimonial::create($request->all());
        return response()->json($Testimonial, 201);
    }

    public function update(Request $request, Testimonial $Testimonial){
        $Testimonial->update($request->all());
        return response()->json($Testimonial, 201);

    }
    public function destroy(Testimonial $Testimonial){
        $Testimonial->delete();
        return response()->json(null,200);
    }
}
