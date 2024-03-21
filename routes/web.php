<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;



//HOME
Route::get('/', [UserController::class, 'home'])->name('home');


//LOGIN
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginPost'])->name('login.post')->middleware('auth.login');


//REGISTER
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'registerPost'])->name('register.post');


//LOGOUT
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//USER CREATE POST
Route::get('/create_post', [UserController::class, 'createPost'])->name('create');
Route::post('/create_post', [PostController::class, 'store'])->name('create.post');


//USER EDIT
Route::get('/{id}/edit', [UserController::class, 'editPost'])->name('edit');
Route::put('/{id}/edit', [PostController::class, 'userUpdatePost'])->name('update');


//USER DELETE
Route::delete('/{id}', [PostController::class, 'destroyPost'])->name('delete');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth.admin']], function() {


    //ADMIN HOME
    Route::get('/', [AdminController::class, 'adminIndex'])->name('index');
    

    //ADMIN DASHBOARD
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('dashboard');


    //ADMIN DELETE
    Route::delete('/{id}', [PostController::class, 'destroyPost'])->name('delete');


    //ADMIN SHOW
    Route::get('/{id}/show', [AdminController::class, 'adminShow'])->name('show');


    //ADMIN EDIT
    Route::get('/{id}/edit', [AdminController::class, 'adminEdit'])->name('edit');
    Route::put('/{id}/edit', [PostController::class, 'adminUpdatePost'])->name('update');


    //ADMIN CREATE POST
    Route::get('/create_post', [AdminController::class, 'adminCreate'])->name('create');
    Route::post('/create_post', [PostController::class, 'store'])->name('create.post');
});