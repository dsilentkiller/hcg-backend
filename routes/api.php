<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\AdminHomeController;
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

Route::post('/users',function(Request $request){
    return new \Illuminate\Http\JsonResponse([
        'data' => 'aaa'
    ]);
});

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

//

