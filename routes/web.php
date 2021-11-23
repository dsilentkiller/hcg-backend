<?php

use App\Http\Controllers\AdminHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\Request;
use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Package\PackageController;
use App\Models\Admin\Package\PackageCategory;
use App\Http\Controllers\Admin\Testimonial\TestimonialController;
use App\Http\Controllers\Admin\Service\ServiceController;
// use Auth;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [AdminHomeController::class , 'index'])->name('admin.setting.'); //admin home directory
Route::resource('setting', SettingController::class)->except(['destroy']);

Auth::routes();
Route::get('/admin/home', [AdminHomeController::class , 'index'])->middleware('role:admin')->name('admin.dashboard');
Route::resource('banner', BannerController::class)->except(['create']);
Route::resource('setting', SettingController::class)->except(['destroy']);
Route::resource('blog', BlogController::class);
Route::resource('category', CategoryController::class);
Route::resource('package', PackageController::class);
Route::resource('packagecategory', PackageCategoryController::class);

Route::resource('testimonial', TestimonialController::class);

Route::resource('page', PageController::class);

Route::resource('service', ServiceController::class);
