<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticlesController;

Route::get('/', [PagesController::class, 'index']);
Route::get('/contact-us', [PagesController::class, 'contact']);
Route::get('/about-us', [PagesController::class, 'about']);
Route::get('/articles', [ArticlesController::class, 'index']);
Route::get('/article/{id}', [ArticlesController::class, 'show']);
Route::get('/articles/create', [ArticlesController::class,'create']);
Route::post('/articles/create', [ArticlesController::class,'store']); 
Route::get('article/{article}/edit', [ArticlesController::class, 'edit']);

