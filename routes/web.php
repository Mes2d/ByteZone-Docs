<?php

use Illuminate\Support\Facades\Route;


Auth::routes();



Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('/categories',App\Http\Controllers\CategoryController::class);
    Route::resource('/spaces',App\Http\Controllers\SpaceController::class);
    Route::resource('/groups',App\Http\Controllers\GroupController::class);
    Route::resource('/pages',App\Http\Controllers\PageController::class);
});


Route::get('/{lang}',[\App\Http\Controllers\SiteController::class,'home']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('{lang}/contact',[\App\Http\Controllers\SiteController::class,'contact']);

Route::get('/{lang}/categories/{slug}',[\App\Http\Controllers\SiteController::class,'category']);
Route::get('/{lang}/spaces/{space}/{group?}/{page?}',[\App\Http\Controllers\SiteController::class,'page']);
