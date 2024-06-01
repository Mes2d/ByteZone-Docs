<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::resource('/categories',App\Http\Controllers\CategoryController::class);
    Route::resource('/spaces',App\Http\Controllers\SpaceController::class);
    Route::resource('/groups',App\Http\Controllers\GroupController::class);
    Route::resource('/pages',App\Http\Controllers\PageController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/contact','contact');

Route::get('/categories/{slug}',[\App\Http\Controllers\SiteController::class,'category']);
Route::get('/spaces/{space}/',[\App\Http\Controllers\SiteController::class,'space']);
