<?php

use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\API\Admin\Page\PageController;
use App\Http\Controllers\API\Admin\About\AboutController;
use App\Http\Controllers\API\Admin\Banner\BannerController;
use App\Http\Controllers\API\Admin\Member\MemberController;
use App\Http\Controllers\API\Admin\Contact\ContactController;
use App\Http\Controllers\API\Admin\Project\ProjectController;
use App\Http\Controllers\API\Admin\Service\ServiceController;
use App\Http\Controllers\API\Admin\Setting\SettingController;
use App\Http\Controllers\API\Admin\Project\ProjectCategoryController;
use App\Http\Controllers\API\Admin\Testimonial\TestimonialController;
use App\Http\Frontend\FrontendController;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/admin', [AdminHomeController::class , 'index'])->name('admin.setting.'); //admin home directory
Route::get('/home', [AdminHomeController::class , 'index'])->name('admin.setting.');
Route::get('/login', [AdminHomeController::class , 'index'])->name('admin.setting.'); //admin home directory
Route::resource('setting', SettingController::class)->except(['destroy']);

Auth::routes();
// Route::prefix('admin')->group(function () {
Route::get('admin/home', [AdminHomeController::class , 'index'])->middleware('role:admin')->name('admin.dashboard');
Route::resource('banner', BannerController::class)->except(['create']);
Route::resource('setting', SettingController::class)->except(['destroy']);
Route::resource('about', AboutController::class);
Route::resource('contact', ContactController::class);
Route::resource('testimonial', TestimonialController::class);
Route::resource('member', MemberController::class);
Route::resource('page', PageController::class);
Route::resource('service', ServiceController::class);


