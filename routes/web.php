<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\UserPostController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserProfileController;
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
Route::get('/users/{name}', [UserController::class, 'profileShow'])->name('profile.show');


//USER PROFILE EDIT
Route::get('/users/{name}/edit', [UserController::class, 'profileEdit'])->name('profile.edit')->middleware('loggedin');
Route::put('/users/{name}/edit', [UserController::class, 'profileEditPost'])->name('profile.update')->middleware('loggedin');


//USER CREATE POST
Route::get('/posts/create', [UserPostController::class, 'createPost'])->name('create')->middleware('loggedin');
Route::post('/posts/create', [PostController::class, 'store'])->name('create.post')->middleware('loggedin');


Route::get('/posts/{id}/show', [UserPostController::class, 'postShow'])->name('post.show');


//USER EDIT POST
Route::get('/posts/{id}/edit', [UserPostController::class, 'editPost'])->name('post.edit')->middleware('loggedin');
Route::put('/posts/{id}/edit', [PostController::class, 'userUpdatePost'])->name('post.update')->middleware('loggedin');


//USER DELETE POST
Route::delete('/posts/{id}', [PostController::class, 'destroyPost'])->name('delete');


//ADMIN
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth.admin']], function() {

    //DASHBOARD HOME
    Route::get('/', [AdminDashboardController::class, 'dashboardShowAll'])->name('dashboard');
    
    //POST SHOW
    Route::get('/posts/{id}/show', [AdminPostController::class, 'postShow'])->name('post.show');

    //POST DELETE
    Route::delete('/posts/{id}', [PostController::class, 'destroyPost'])->name('post.delete');

    //POST SHOW ALL
    Route::get('/posts', [AdminPostController::class, 'postShowAll'])->name('post.showAll');

    //POST EDIT
    Route::get('/posts/{id}/edit', [AdminPostController::class, 'postEdit'])->name('post.edit');
    Route::put('/posts/{id}/edit', [PostController::class, 'adminUpdatePost'])->name('post.update');

    //POST CREATE
    Route::get('/posts/create', [AdminPostController::class, 'postCreate'])->name('post.create');
    Route::post('/posts/create', [PostController::class, 'store'])->name('post.create.post');





    //TAG SHOW ALL
    Route::get('/tags', [AdminTagController::class, 'tagShowAll'])->name('tag.showAll');

    //TAG CREATE
    Route::get('/tags/create', [AdminTagController::class, 'tagCreate'])->name('tag.create');
    Route::post('/tags/create', [TagController::class, 'store'])->name('tag.create.post');

    //TAG SHOW
    Route::get('/tags/{id}/show', [AdminTagController::class, 'tagShow'])->name('tag.show');

    //TAG EDIT
    Route::get('/tags/{id}/edit', [AdminTagController::class, 'tagEdit'])->name('tag.edit');
    Route::put('/tags/{id}/edit', [TagController::class, 'adminUpdateTag'])->name('tag.update');

    //TAG DELETE
    Route::delete('/tags/{id}', [TagController::class, 'destroyTag'])->name('tag.delete');




    //CATEGORY SHOW ALL
    Route::get('/categories', [AdminCategoryController::class, 'categoryShowAll'])->name('category.showAll');

    //CATEGORY CREATE
    Route::get('/categories/create', [AdminCategoryController::class, 'categoryCreate'])->name('category.create');
    Route::post('/categories/create', [CategoryController::class, 'store'])->name('category.create.post');

    //CATEGORY SHOW
    Route::get('/categories/{id}/show', [AdminCategoryController::class, 'categoryShow'])->name('category.show');

    //CATEGORY EDIT
    Route::get('/categories/{id}/edit', [AdminCategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::put('/categories/{id}/edit', [CategoryController::class, 'adminUpdateCategory'])->name('category.update');


    //CATEGORY DELETE
    Route::delete('/categories/{id}', [CategoryController::class, 'destroyCategory'])->name('category.delete');




    //USER SHOW ALL
    Route::get('/users', [AdminUserController::class, 'userShowAll'])->name('user.showAll');

    //USER CREATE
    Route::get('/users/create', [AdminUserController::class, 'userCreate'])->name('user.create');
    Route::post('/users/create', [UserProfileController::class, 'store'])->name('user.create.post');

    //USER SHOW
    Route::get('/users/{id}/show', [AdminUserController::class, 'userShow'])->name('user.show');

    //USER EDIT
    Route::get('/users/{id}/edit', [AdminUserController::class, 'userEdit'])->name('user.edit');
    Route::put('/users/{id}/edit', [UserProfileController::class, 'adminUpdateUser'])->name('user.update');

    //USER DELETE
    // Route::delete('/user/{id}', [UserProfileController::class, 'destroyUser'])->name('user.delete');
});