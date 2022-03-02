<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Admin\About\About;
use App\Http\Controllers\Controller;

class AdminApiController extends Controller
{
    //
    public function about(){
        $about = About::findorFail();
        return $about;
    }


// Route::post('abouts', function(Request $request){
//     return About::create($request->all);
//     return dd('gh');
// });

// Route::post('abouts/{id}',function(Request $request, $id){
//     $about = About::findorFail($id);
//     $about->update($request->all());
//     return $about;
// });
// Route::delete('abouts/{id}', function($id){
//     About::find($id)->delete();
//     return 204;
// });
}
