<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Admin\Banner\Banner;
use App\Http\Controllers\Controller;

class BannerApiController extends Controller
{
    //
    public function index(){
        return Banner::all();
    }

    public function show(Banner $banner){
        return $banner;
    }

    public function store(Request $request){
        $banner = Banner::create($request->all());
        return response()->json($banner, 201);
    }

    public function update(Request $request, Banner $banner){
        $banner->update($request->all());
        return response()->json($banner, 201);

    }
    public function destroy(Banner $banner){
        $banner->delete();
        return response()->json(null,200);
    }
}
