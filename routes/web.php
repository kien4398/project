<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\test1;
use Illuminate\Support\Facades\Route;

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
Route::get('/test',[test1::class,'test']);

Route::group(['prefix' =>'/'], function(){
    Route::get('/',[SiteController::class, 'index']);
    Route::get('/search',[SiteController::class, 'search']);
    Route::get('/category/{id}',[SiteController::class, 'category']);
    Route::get('/{title}.html',[SiteController::class, 'details']);
});



Route::get('/login',[LoginController::class, 'login'])->middleware('checklogin');
Route::post('/login',[LoginController::class, 'postLogin'])->middleware('checklogin');
Route::get('logout',[AdminController::class, 'logout']);

Route::group(['prefix' => 'admin','middleware' => 'checkadmin'], function () {
    Route::get('/', [AdminController::class, "admin"]);
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, "user"])->name('user');
        Route::get('/index', [UserController::class, "index"]);
        // Route::get('/userall', [UserController::class, "userAll"]);
        Route::get('/add', [UserController::class, "addUser"])->name('user.add');
        Route::post('/create', [UserController::class, "createUser"])->name('user.create');
        Route::get('/edit/{id}', [UserController::class, "editUser"])->name('user.edit');
        Route::post('/update/{id}', [UserController::class, "updateUser"])->name('user.update');
        Route::get('/delete/{id}', [UserController::class, "deleteUser"])->name('user.delete');
        Route::delete('/deletee/{id}', [UserController::class, "deleteeUser"])->name('user.deletee');
        Route::get('/trash', [UserController::class, "trash"])->name('user.trash');
        Route::get('/untrash/{id}', [UserController::class, "untrash"])->name('user.untrash');

    });
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [PostController::class, "posts"])->name('posts');
        Route::get('/add', [PostController::class, "addPosts"])->middleware(['role:admin|writer'])->name('posts.add');
        Route::post('/create', [PostController::class, "createPosts"])->middleware(['role:admin|writer'])->name('posts.create');
        Route::post('/store', [PostController::class, "store"])->name('posts.store');
        Route::get('/edit/{id}', [PostController::class, "editPosts"])->middleware('permission:edit posts')->name('posts.edit');
        Route::post('/update/{id}', [PostController::class, "updatePosts"])->middleware('permission:edit posts')->name('posts.update');
        Route::delete('/delete/{id}', [PostController::class, "deletePosts"])->middleware('permission:delete posts')->name('posts.delete');
        Route::get('/trash', [PostController::class, "trash"])->middleware('permission:restore posts')->name('posts.trash');
        Route::get('/untrash/{id}', [PostController::class, "unTrash"])->middleware('permission:restore posts')->name('posts.untrash');

    });
    // Route::group(['prefix' => 'category'], function () {
    //     Route::get('/', [CategoryController::class, "category"]);
    //     Route::get('/add', [CategoryController::class, "addcategory"]);
    //     Route::post('/create', [CategoryController::class, "createcategory"]);
    //     Route::get('/edit/{id}', [CategoryController::class, "editcategory"]);
    //     Route::post('/update/{id}', [CategoryController::class, "updatecategory"]);
    //     Route::get('/delete/{id}', [CategoryController::class, "deletecategory"]);
    // });
});



