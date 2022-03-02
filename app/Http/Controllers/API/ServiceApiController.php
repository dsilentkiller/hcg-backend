<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Service\Service;

class ServiceApiController extends Controller
{
    //
    public function index(){
        return Service::all();
    }

    public function show(Service $Service){
        return $Service;
    }

    public function store(Request $request){
        $Service = Service::create($request->all());
        return response()->json($Service, 201);
    }

    public function update(Request $request, Service $Service){
        $Service->update($request->all());
        return response()->json($Service, 201);

    }
    public function destroy(Service $Service){
        $Service->delete();
        return response()->json(null,200);
    }
}
