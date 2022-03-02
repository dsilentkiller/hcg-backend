<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Admin\Member\Member;
use App\Http\Controllers\Controller;

class MemberApiController extends Controller
{
    //
    public function index(){
        return Member::all();
    }

    public function show(Member $Member){
        return $Member;
    }

    public function store(Request $request){
        $Member = Member::create($request->all());
        return response()->json($Member, 201);
    }

    public function update(Request $request, Member $Member){
        $Member->update($request->all());
        return response()->json($Member, 201);

    }
    public function destroy(Member $Member){
        $Member->delete();
        return response()->json(null,200);
    }
}
