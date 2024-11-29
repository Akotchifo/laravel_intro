<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UserController;

Route::get('/', [PagesController::class, 'index']);
Route::get('/contact-us', [PagesController::class, 'contact']);
Route::get('/about-us', [PagesController::class, 'about']);
Route::get('/articles', [ArticlesController::class, 'index']);
Route::get('/article/{id}', [ArticlesController::class, 'show']);
Route::get('/articles/create', [ArticlesController::class, 'create']);
Route::post('/articles/create', [ArticlesController::class, 'store']);

Route::get('/article/{article}/edit', [ArticlesController::class, 'edit']);
Route::patch('/article/{article}/edit', [ArticlesController::class, 'update']);
Route::delete('article/{article}/delete', [ArticlesController::class, 'delete']);

// Auth
// Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
// Route::post('/register', [RegisterController::class, 'create']);
// Route::get('/login', [SessionsController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [SessionsController::class, 'authenticate'])->middleware('guest');
// Route::post('/logout', [SessionsController::class, 'logout'])->name('logout')->middleware('auth');
// profile
Route::get('/profile', [UserController::class, 'index']);


