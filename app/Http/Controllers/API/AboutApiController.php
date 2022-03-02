<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Support\ImageSupport;
use App\Models\Admin\About\About;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AboutApiController extends Controller
{



    public function index()
    {
       return About::all();

    }


    public function store(Request $request)
    {
        //
       $about = About::create($request->all());
       return response()->json($about, 201);


    }

    public function show(About $about)
    {
        return $about;
    }



    public function update(Request $request, About $about)
    {
        $about->update($request->all());
        return response()->json($about,200);
    }


    public function destroy(About $about)
    {
        $about->delete();
        return response()->json(null,204);
    }
}
