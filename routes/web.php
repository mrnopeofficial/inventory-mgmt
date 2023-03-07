<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

//Need to add this file if using Eloquent
use App\Models\User;
use App\Models\Brand;
use App\Models\Portfolio;

//Need to add this file if using query builder
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('abouts')->first();
    $portfolios = Portfolio::all();
    return view('home', compact('brands','abouts','portfolios'));
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', [ContactController::class, 'index'])->name('con');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// CATEGORY CONTROLLER (ROUTE)
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('add.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
Route::get('/category/softdelete/{id}', [CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('/category/delete/{id}', [CategoryController::class, 'Delete']);

// BRAND CONTROLLER (ROUTE)
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'AddBrand'])->name('add.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

// MULTI IMAGE CONTROLLER (ROUTE)
Route::get('/multi/image', [BrandController::class, 'MultiPic'])->name('multi.image');
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

// PORTFOLIO CONTROLLER (ROUTE)
Route::get('/portfolio', [UserController::class, 'Portfolio'])->name('portfolio');

// SERVICE CONTROLLER (ROUTE)
Route::get('/passion/detail/{id}', [UserController::class, 'PassionDetail']);

// CONTACT CONTROLLER (ROUTE)
Route::get('/contact', [UserController::class, 'Contact'])->name('contact');
Route::post('contact/form', [UserController::class, 'StoreContactForm'])->name('contact.form');

// ADMIN DASHBOARD CONTROLLER (ROUTE)

//Slider
Route::get('/dashboard/slider', [AdminController::class, 'AdminSlider'])->name('admin.slider');
Route::get('/slider/add', [AdminController::class, 'AddSlider'])->name('add.slider');
Route::post('slider/store', [AdminController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [AdminController::class, 'Edit']);
Route::post('/slider/update/{id}', [AdminController::class, 'Update']);
Route::get('slider/delete/{id}', [AdminController::class, 'Delete']);

//About
Route::get('/dashboard/about', [AdminController::class, 'AdminAbout'])->name('admin.about');
Route::get('/about/add', [AdminController::class, 'AddAbout'])->name('add.about');
Route::post('about/store', [AdminController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AdminController::class, 'EditAbout']);
Route::post('/about/update/{id}', [AdminController::class, 'UpdateAbout']);
Route::get('about/delete/{id}', [AdminController::class, 'DeleteAbout']);

//Passion
Route::get('/dashboard/passion', [AdminController::class, 'AdminPassion'])->name('admin.passion');
Route::get('/passion/add', [AdminController::class, 'AddPassion'])->name('add.passion');
Route::post('passion/store', [AdminController::class, 'StorePassion'])->name('store.passion');
Route::get('/passion/edit/{id}', [AdminController::class, 'EditPassion']);
Route::post('/passion/update/{id}', [AdminController::class, 'UpdatePassion']);
Route::get('passion/delete/{id}', [AdminController::class, 'DeletePassion']);

//Portfolio
Route::get('/dashboard/portfolio', [AdminController::class, 'AdminPortfolio'])->name('admin.portfolio');
Route::get('/portfolio/add', [AdminController::class, 'AddPortfolio'])->name('add.portfolio');
Route::post('portfolio/store', [AdminController::class, 'StorePortfolio'])->name('store.portfolio');
Route::get('/portfolio/edit/{id}', [AdminController::class, 'EditPortfolio']);
Route::post('/portfolio/update/{id}', [AdminController::class, 'UpdatePortfolio']);
Route::get('portfolio/delete/{id}', [AdminController::class, 'DeletePortfolio']);

//Service
Route::get('/dashboard/service', [AdminController::class, 'AdminService'])->name('admin.service');
Route::get('/service/add', [AdminController::class, 'AddService'])->name('add.service');
Route::post('service/store', [AdminController::class, 'StoreService'])->name('store.service');
Route::get('/service/edit/{id}', [AdminController::class, 'EditService']);
Route::post('/service/update/{id}', [AdminController::class, 'UpdateService']);
Route::get('service/delete/{id}', [AdminController::class, 'DeleteService']);

//Contact
Route::get('/dashboard/contact', [AdminController::class, 'AdminContact'])->name('admin.contact');
Route::get('/contact/add', [AdminController::class, 'AddContact'])->name('add.contact');
Route::post('contact/store', [AdminController::class, 'StoreContact'])->name('store.contact');
Route::get('/contact/edit/{id}', [AdminController::class, 'EditContact']);
Route::post('/contact/update/{id}', [AdminController::class, 'UpdateContact']);
Route::get('contact/delete/{id}', [AdminController::class, 'DeleteContact']);
Route::get('/dashboard/contactform', [AdminController::class, 'AdminContactForm'])->name('admin.contactform');
Route::get('contactform/delete/{id}', [AdminController::class, 'DeleteContactForm']);

Route::get('/dashboard/profile', [AdminController::class, 'UpdateProfile'])->name('admin.updateprofile');
Route::post('profile/save', [AdminController::class, 'SaveProfile'])->name('admin.saveprofile');

Route::get('/dashboard/password', [AdminController::class, 'ChangePassword'])->name('admin.changepassword');
Route::post('password/update', [AdminController::class, 'UpdatePassword'])->name('admin.updatepassword');
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
