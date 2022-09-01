<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

//Need to add this file if using Eloquent
use App\Models\User;
use App\Models\Brand;

//Need to add this file if using query builder
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    return view('home', compact('brands'));
});

Route::get('/home', function () {
    echo "This is home page";
    //return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});
// ->middleware('check');

//Laravel 7 method
// Route::get('/contact', 'ContactController@index');
// Route::get('/contact', [ContactController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index'])->name('con');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// CATEGORY CONTROLLER (ROUTE)
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

// Add Category Controller (Route)
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('add.category');

// Edit Category Controller (Route)
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);

// Update Category Controller (Route)
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);

// Soft Delete Category Controller (Route)
Route::get('/category/softdelete/{id}', [CategoryController::class, 'SoftDelete']);

// Restore Category Controller (Route)
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

// Restore Category Controller (Route)
Route::get('/category/delete/{id}', [CategoryController::class, 'Delete']);

// BRAND CONTROLLER (ROUTE)
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
// Add Brand Controller (Route)
Route::post('/brand/add', [BrandController::class, 'AddBrand'])->name('add.brand');
// Edit Brand Controller (Route)
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
// Update Brand Controller (Route)
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
// Soft Delete Category Controller (Route)
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

// MULTI IMAGE CONTROLLER (ROUTE)
Route::get('/multi/image', [BrandController::class, 'MultiPic'])->name('multi.image');
// Add Brand Controller (Route)
Route::post('/multi/add', [BrandController::class, 'AddImage'])->name('add.image');

Route::get('/help', function () {
    echo "This is help page";
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        //Eloquent technique
        // $users = User::all();

        //Query Builder technique
        // $users = DB::table('users')->get();
        return view('admin.index');
    })->name('dashboard');
});

// ADMIN DASHBOARD CONTROLLER (ROUTE)
Route::get('/dashboard/slider', [AdminController::class, 'AdminSlider'])->name('admin.slider');
Route::get('/dashboard/slider/add', [AdminController::class, 'AddSlider'])->name('add.slider');
Route::post('/dashboard/slider/store', [AdminController::class, 'StoreSlider'])->name('store.slider');
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
