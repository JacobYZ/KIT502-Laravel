<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SubmissionsController;
use App\Http\Controllers\UserController;

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
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth')->name('listings.edit');

// Update Listing Data
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth')->name('listings.destroy');

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');
// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



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


Route::get('about', [MainPageController::class, 'about'])->name('about');
