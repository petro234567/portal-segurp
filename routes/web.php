<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReceivedEmailController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/acerca', [HomeController::class, 'about'])
    ->name('about');

Route::get('/contacto', [HomeController::class, 'contact'])
    ->name('contact');

Route::post('/contacto', [HomeController::class, 'sendContact'])
    ->middleware('throttle:10,1')
    ->name('contact.send');

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'store'])
        ->middleware('throttle:login')
        ->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/logout', [LoginController::class, 'destroy'])
        ->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])
    ->middleware('throttle:login')->name('login.store');
    
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
        Route::post('/logout', [LoginController::class, 'destroy'])
        ->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::resource('pages', PageController::class)
        ->middleware('can:manage-content');
});

Route::get('/contact', [ContactController::class, 'create'])
    ->name('Emails.contact.create');

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:contact')
    ->name('contact.store');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/correos', [ReceivedEmailController::class, 'index'])->name('emails.index');
});