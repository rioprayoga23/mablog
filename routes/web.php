<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\RegisterController;



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

    Route::get('/', function () {
        return view('home',[
            "title" => "Home"
        ]);
    });

    Route::get('/posts', [PostController::class, 'index'] );


    Route::get('/about', function () {
        return view('about', [
            "title" => "About"
        ]);
    });

    // halaman single post
    Route::get('posts/{post:slug}', [PostController::class, 'show']);

    // halaman semua category
    Route::get('categories', [CategoryController::class, 'categories']);

    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
    Route::post('/register', [RegisterController::class, 'store']);
    
    Route::get('/dashboard', function(){
        return view('dashboard.index');
    })->middleware('auth');

    Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
    Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
