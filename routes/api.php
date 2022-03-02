<?php

use Illuminate\Http\Request;
// use App\Models\Admin\About\About;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\API\AboutApiController;
use App\Http\Controllers\Admin\Banner\BannerController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('/users',function(Request $request){
//     return new \Illuminate\Http\JsonResponse([
//         'data' => 'aaa'
//     ]);
// });
// Api middleware for frontend
// header('Access-Control-Allow-Origin:  *');
// header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
// header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

// Route::post('cors', ['middleware' => 'cors',function () {
//     return response()->json(['message' =>'cors'], 200); }  ]);
// Route::group([ ‘middleware’ => ‘cors’], function() {
    // Route::get('', ['middleware' => 'cors', function() {
    //     return 'You did it!';
    // }]);
    // ‘prefix’ => ‘api’,
    // Route::get('blogs/list', array('middleware' => 'cors', 'uses' => 'BlogController@bloglist'));
// about
// Route::group('middleware') , 'prefix' => 'api'
Route::group(['middleware' => ['api']], function () {
Route::get('about', [App\Http\Controllers\API\AboutApiController::class,'index']);
// ->middleware('cors');
// Route::get('about/{about}', [App\Http\Controllers\API\AboutApiController::class,'show']);
Route::post('about', [App\Http\Controllers\API\AboutApiController::class,'store']);
Route::put('about', [App\Http\Controllers\API\AboutApiController::class,'update']);
Route::delete('about', [App\Http\Controllers\API\AboutApiController::class,'delete']);

// banner
Route::get('banner',[App\Http\Controllers\API\BannerApiController::class,'index']);
Route::get('banner/{banner}', [App\Http\Controllers\API\BannerApiController::class,'show']);
Route::post('banner', [App\Http\Controllers\API\BannerApiController::class,'store']);
Route::put('banner', [App\Http\Controllers\API\BannerApiController::class,'update']);
Route::delete('banner', [App\Http\Controllers\API\AboutApiController::class,'delete']);



// testimonial
Route::get('testimonial',[App\Http\Controllers\API\TestimonialApiController::class,'index']);
Route::get('testimonial/{testimonial}', [App\Http\Controllers\API\TestimonialApiController::class,'show']);
Route::post('testimonial', [App\Http\Controllers\API\TestimonialApiController::class,'store']);
Route::put('testimonial', [App\Http\Controllers\API\TestimonialApiController::class,'update']);
Route::delete('testimonial', [App\Http\Controllers\API\TestimonialApiController::class,'delete']);


// Service
Route::get('service',[App\Http\Controllers\API\ServiceApiController::class,'index']);
Route::get('service/{service}', [App\Http\Controllers\API\ServiceApiController::class,'show']);
Route::post('service', [App\Http\Controllers\API\ServiceApiController::class,'store']);
Route::put('service', [App\Http\Controllers\API\ServiceApiController::class,'update']);
Route::delete('service', [App\Http\Controllers\API\ServiceApiController::class,'delete']);


// member
Route::get('member',[App\Http\Controllers\API\MemberApiController::class,'index']);
Route::get('member/{member}', [App\Http\Controllers\API\MemberApiController::class,'show']);
Route::post('member', [App\Http\Controllers\API\MemberApiController::class,'store']);
Route::put('member', [App\Http\Controllers\API\MemberApiController::class,'update']);
Route::delete('member', [App\Http\Controllers\API\MemberApiController::class,'delete']);


// contact
Route::get('list',[App\Http\Controllers\API\ContactApiController::class,'index']);
Route::get('contact/{contact}', [App\Http\Controllers\API\ContactApiController::class,'show']);
Route::post('contact', [App\Http\Controllers\API\ContactApiController::class,'store']);
Route::put('contact', [App\Http\Controllers\API\ContactApiController::class,'update']);
Route::delete('contact', [App\Http\Controllers\API\ContactApiController::class,'delete']);


// })
// Route::post('/users/{id}', function(\App\Models\User $id){
//     return new \Illuminate\Http\JsonResponse([
//         'data'=> $id
//     ]);
// });

// Route::post('/users',function(Request $request){
//     return new \Illuminate\Http\JsonResponse([
//         'data' => 'aaa'
//     ]);
// });

// Route::post('/users/{id}', function(\App\Models\User $id){
//     return new \Illuminate\Http\JsonResponse([
//         'data'=> $id
//     ]);
// });
// Route::patch('/users/{user}',function(\App\Models\User $user){
//     return new \Illuminate\Http\JsonResponse([
//         'data' => 'posted'
//     ]);
// });
// Route::delete('/users/{user}',function(\App\Models\User $user){
//     return new \Illuminate\Http\JsonResponse([
//         'data' => 'delete'
//     ]);
// });





// Route::middleware('auth:sanctum')->post('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('/login', [UserController::class, 'login'])->name('login');
// Route::get('login',array('as'=>'login',function(){
//     return view('home');
// }));
// Route::post('/register', [UserController::class, 'register']);
// Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
// //setting
// Route::get('/home', [AdminHomeController::class , 'index'])->name('home'); //admin home directory
// Route::get('/admin', [AdminHomeController::class , 'index'])->name('admin.setting.');
// Route::resource('setting', SettingController::class)->except(['destroy']);
// // Banner
// Route::apiResource('banner',BannerController::class);
// Route::patch('/update-order/banner',[BannerController::class, 'update'])->name('update.banner');

});

// ?>
