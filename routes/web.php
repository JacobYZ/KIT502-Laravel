<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SubmissionsController;

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

Route::resource('/submissions', SubmissionsController::class);
Route::resource('/products', ProductsController::class);

Route::get('/hello', function () {
    return response('<h1>Hello World!</h1>')->header('Content-Type', 'text/plain')->header('X-Header-One', 'Header ValueX');
});
Route::get('/posts/{id}', function ($id) {
    return response("You are viewing post " . $id);
})->where('id', '[0-9]+');
Route::get('/search', function (Request $request) {
    return ($request->name . ' ' . $request->city);
});

// Common Resource Routes
// index - show all listings
// create - show create form
// store - store listing data
// show - show single listing
// edit - show edit form
// update - update listing data
// destroy - delete listing

// All Listings
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);
// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

Route::get('/products', [ProductsController::class, 'index']);
//validation
//pattern is integer
Route::get('/products/{id}', [ProductsController::class, 'show'])->where('id', '[0-9]+');
//pattern is string
Route::get('/products/{name}', [ProductsController::class, 'show'])->where('name', '[A-Za-z]+');
//multiple patterns
Route::get('/products/{id}/{name}', [ProductsController::class, 'show'])->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);
//Named Routes
Route::get('/products', [ProductsController::class, 'index'])->name('products');

Route::get('/', [MainPageController::class, 'index'])->name('main');
Route::get('about', [MainPageController::class, 'about'])->name('about');
