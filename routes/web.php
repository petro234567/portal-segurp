<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index'])
->name('home'); 

Route::get('/contacto', [HomeController::class, 'contact']) 
->name('contact');

Route::get('/acerca', [HomeController::class, 'about']) 
->name('about'); 

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');