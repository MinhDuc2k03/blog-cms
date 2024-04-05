<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\UserPostController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\User\UserController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminUserController;


//HOME
Route::get('/', [UserPostController::class, 'home'])->name('home');


//LOGIN
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginPost'])->name('login.post');


//REGISTER
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'registerPost'])->name('register.post');


//LOGOUT
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//USER PROFILE INFO
Route::get('/user/{name}', [UserController::class, 'profileShow'])->name('profile.show');


//USER PROFILE EDIT
Route::get('/user/{name}/edit', [UserController::class, 'profileEdit'])->name('profile.edit')->middleware('loggedin');
Route::put('/user/{name}/edit', [UserController::class, 'profileEditPost'])->name('profile.update')->middleware('loggedin');


//USER CREATE POST
Route::get('/post/create', [UserPostController::class, 'createPost'])->name('create')->middleware('loggedin');
Route::post('/post/create', [PostController::class, 'store'])->name('create.post')->middleware('loggedin');


Route::get('/post/{id}/show', [UserPostController::class, 'postShow'])->name('post.show');


//USER EDIT POST
Route::get('/post/{id}/edit', [UserPostController::class, 'editPost'])->name('post.edit')->middleware('loggedin');
Route::put('/post/{id}/edit', [PostController::class, 'userUpdatePost'])->name('post.update')->middleware('loggedin');


//USER DELETE POST
Route::delete('/post/{id}', [PostController::class, 'destroyPost'])->name('delete');


//ADMIN
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth.admin']], function() {

    //DASHBOARD HOME
    Route::get('/', [AdminDashboardController::class, 'dashboardShowAll'])->name('dashboard');
    
    //POST SHOW
    Route::get('/post/{id}/show', [AdminPostController::class, 'postShow'])->name('post.show');

    //POST DELETE
    Route::delete('/post/{id}', [PostController::class, 'destroyPost'])->name('post.delete');

    //POST SHOW ALL
    Route::get('/post', [AdminPostController::class, 'postShowAll'])->name('post.showAll');

    //POST EDIT
    Route::get('/post/{id}/edit', [AdminPostController::class, 'postEdit'])->name('post.edit');
    Route::put('/post/{id}/edit', [PostController::class, 'adminUpdatePost'])->name('post.update');

    //POST CREATE
    Route::get('/post/create', [AdminPostController::class, 'postCreate'])->name('post.create');
    Route::post('/post/create', [PostController::class, 'store'])->name('post.create.post');





    //TAG SHOW ALL
    Route::get('/tag', [AdminTagController::class, 'tagShowAll'])->name('tag.showAll');

    //TAG CREATE
    Route::get('/tag/create', [AdminTagController::class, 'tagCreate'])->name('tag.create');
    Route::post('/tag/create', [TagController::class, 'store'])->name('tag.create.post');

    //TAG SHOW
    Route::get('/tag/{id}/show', [AdminTagController::class, 'tagShow'])->name('tag.show');

    //TAG EDIT
    Route::get('/tag/{id}/edit', [AdminTagController::class, 'tagEdit'])->name('tag.edit');
    Route::put('/tag/{id}/edit', [TagController::class, 'adminUpdateTag'])->name('tag.update');

    //TAG DELETE
    Route::delete('/tag/{id}', [TagController::class, 'destroyTag'])->name('tag.delete');




    //CATEGORY SHOW ALL
    Route::get('/category', [AdminCategoryController::class, 'categoryShowAll'])->name('category.showAll');

    //CATEGORY CREATE
    Route::get('/category/create', [AdminCategoryController::class, 'categoryCreate'])->name('category.create');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.create.post');

    //CATEGORY SHOW
    Route::get('/category/{id}/show', [AdminCategoryController::class, 'categoryShow'])->name('category.show');

    //CATEGORY EDIT
    Route::get('/category/{id}/edit', [AdminCategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::put('/category/{id}/edit', [CategoryController::class, 'adminUpdateCategory'])->name('category.update');


    //CATEGORY DELETE
    Route::delete('/category/{id}', [CategoryController::class, 'destroyCategory'])->name('category.delete');




    //USER SHOW ALL
    Route::get('/user', [AdminUserController::class, 'userShowAll'])->name('user.showAll');

    //USER CREATE
    Route::get('/user/create', [AdminUserController::class, 'userCreate'])->name('user.create');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.create.post');

    //USER SHOW
    Route::get('/user/{id}/show', [AdminUserController::class, 'userShow'])->name('user.show');

    //USER EDIT
    Route::get('/user/{id}/edit', [AdminUserController::class, 'userEdit'])->name('user.edit');
    Route::put('/user/{id}/edit', [UserController::class, 'adminUpdateUser'])->name('user.update');

    //USER DELETE
    // Route::delete('/user/{id}', [UserController::class, 'destroyUser'])->name('user.delete');
});