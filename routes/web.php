<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminPropertyController;
use App\Http\Controllers\Client\ClientHomeController;
use App\Http\Controllers\Client\ClientPropertyController;
use App\Http\Controllers\Client\ClientBaseController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Artisan;
use App\Models\Career;
use App\Models\Property;
use App\Models\Product;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard'); 
    Route::get('/', [AdminAuthController::class, 'index'])->name('login');
    Route::post('custom-login', [AdminAuthController::class, 'customLogin'])->name('login.custom'); 
    Route::get('reset', [AdminAuthController::class, 'reset'])->name('reset-user');
    Route::post('reset-user', [AdminAuthController::class, 'resetUser'])->name('reset.user'); 
    Route::get('signout', [AdminAuthController::class, 'signOut'])->name('signout');


    // Route::get('products/update/{id}', [AdminProductController::class , 'update'])->name('products.update');
    // Route::get('products/data', [AdminProductController::class , 'data'])->name('products.data');
    // Route::resource('products', AdminProductController::class);

    Route::get('properties/data', [AdminPropertyController::class , 'data'])->name('properties.data');
    Route::resource('properties', AdminPropertyController::class);

    // Route::get('careers/data', [AdminCareerController::class , 'data'])->name('careers.data');
    // Route::resource('careers', AdminCareerController::class);

    // Route::get('enquiry/message/{id}', [AdminEnquiryController::class , 'enquiry_message'])->name('enquiry.message');
    // Route::get('enquiry/check/{id}', [AdminEnquiryController::class , 'enquiry_check'])->name('enquiry.check');
    // Route::post('enquiry/{id}', [AdminEnquiryController::class , 'enquiry_destroy'])->name('enquiry.destroy');

    // Route::post('enquiry/product/store', [AdminEnquiryController::class , 'product_enquiry_store'])->name('enquiry.product.store');
    // Route::get('enquiry/product/data', [AdminEnquiryController::class , 'product_enquiry_data'])->name('enquiry.product.data');
    // Route::get('enquiry/product', [AdminEnquiryController::class , 'product_enquiry'])->name('enquiry.product');

    // Route::post('enquiry/service/store', [AdminEnquiryController::class , 'service_enquiry_store'])->name('enquiry.service.store');
    // Route::get('enquiry/service/data', [AdminEnquiryController::class , 'service_enquiry_data'])->name('enquiry.service.data');
    // Route::get('enquiry/service', [AdminEnquiryController::class , 'service_enquiry'])->name('enquiry.service');

    // Route::post('enquiry/career/store', [AdminEnquiryController::class , 'career_enquiry_store'])->name('enquiry.career.store');
    // Route::get('enquiry/career/data', [AdminEnquiryController::class , 'career_enquiry_data'])->name('enquiry.career.data');
    // Route::get('enquiry/career', [AdminEnquiryController::class , 'career_enquiry'])->name('enquiry.career');


});

Route::name('client.')->group(function(){

    Route::get('/', [ClientHomeController::class , 'index'])->name('home');

    // Route::get('/about-us', function () {
    //     return view('client.about',['pageTitle'=>'','page'=>'About Us']);
    // })->name('about');

    // Route::get('/service1', function () {
    //     return view('client.service1',['pageTitle'=>'','page'=>'']);
    // })->name('service1');

    // Route::get('/careers', [ClientCareerController::class , 'careers'])->name('careers');
    // Route::get('/career/{id}', [ClientCareerController::class , 'career'])->name('career');

    Route::get('/property/{id}', [ClientPropertyController::class , 'property'])->name('property');
    Route::get('/properties/{type}/{location}/{state}/{keyword?}', [ClientPropertyController::class , 'properties'])->name('properties');
    Route::get('/service/{id}', [ClientPropertyController::class , 'service'])->name('service');

    // Route::get('/products', [ClientProductController::class , 'products'])->name('products');
    // Route::get('/product/{id}', [ClientProductController::class , 'product'])->name('product');

    Route::get('/about', [ClientBaseController::class , 'about'])->name('about');
    Route::get('/gallery', [ClientBaseController::class , 'gallery'])->name('gallery');
    Route::get('/contact', [ClientBaseController::class , 'contact'])->name('contact');

});


Route::get('location-autocomplete-search', [AjaxController::class,'locationSearch']);


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/project-init', function () {
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
});

Route::post('ckeditor/file-upload/{project}', [CKEditorController::class , 'file_uploader'])->name('ckeditor.file-upload');
