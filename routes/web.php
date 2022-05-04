<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ForgetPasswordController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
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
    Route::get('/{id}-{slug}',[SiteController::class, 'details'])->name('detail.slug');
    Route::post('/comment/{post_id}',[SiteController::class, 'comment'])->name('comment');
});



Route::get('/login',[LoginController::class, 'login'])->middleware('checklogin');
Route::post('/login',[LoginController::class, 'postLogin'])->middleware('checklogin');
Route::get('logout',[AdminController::class, 'logout']);

// forgetPassword
Route::get('/forget_password',[ForgetPasswordController::class, 'forgetPassword'])->name('ForgetPasswordGet');
Route::post('/forget_password',[ForgetPasswordController::class, 'forgetPasswordStore'])->name('ForgetPasswordPost');
Route::get('/reset_password/{token}',[ForgetPasswordController::class, 'resetPassword'])->name('ResetPasswordGet');
Route::post('/reset_password',[ForgetPasswordController::class, 'resetPasswordStore'])->name('ResetPasswordPost');

Route::group(['prefix' => 'admin','middleware' => 'checkadmin'], function () {
    Route::get('/', [AdminController::class, "admin"]);

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, "user"])->name('user');
        Route::get('/index', [UserController::class, "index"]);
        Route::get('/add', [UserController::class, "addUser"])->name('user.add');
        Route::post('/create', [UserController::class, "createUser"])->name('user.create');
        Route::get('/edit/{id}', [UserController::class, "editUser"])->name('user.edit');
        Route::post('/update/{id}', [UserController::class, "updateUser"])->name('user.update');
        Route::delete('/delete/{id}', [UserController::class, "deleteUser"])->name('user.delete');
        Route::get('/trash', [UserController::class, "trash"])->name('user.trash');
        Route::get('/untrash/{id}', [UserController::class, "untrash"])->name('user.untrash');

    });
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [PostController::class, "posts"])->name('posts');
        Route::get('/add', [PostController::class, "addPosts"])->name('posts.add');
        Route::post('/create', [PostController::class, "createPosts"])->name('posts.create');
        Route::post('/store', [PostController::class, "store"])->name('posts.store');
        Route::get('/edit/{id}', [PostController::class, "editPosts"])->name('posts.edit');
        Route::post('/update/{id}', [PostController::class, "updatePosts"])->name('posts.update');
        Route::delete('/delete/{id}', [PostController::class, "deletePosts"])->name('posts.delete');
        Route::get('/trash', [PostController::class, "trash"])->name('posts.trash');
        Route::get('/untrash/{id}', [PostController::class, "unTrash"])->name('posts.untrash');

    });
    Route::group(['prefix' => 'role'], function () {
        Route::get('/', [RoleController::class, 'role'])->name('role');
        Route::get('/add', [RoleController::class, 'add'])->name('role.add');
        Route::post('/create', [RoleController::class, 'create'])->name('role.create');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');
    });
    Route::group(['prefix' => 'permission'], function () {
        Route::get('/', [PermissionController::class, 'permission'])->name('permission');
        Route::get('/add', [PermissionController::class, 'add'])->name('permission.add');
        Route::post('/create', [PermissionController::class, 'create'])->name('permission.create');
        Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::post('/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
        Route::get('/delete/{id}', [PermissionController::class, 'delete'])->name('permission.delete');
    });
    Route::group(['prefix'=>'comment'], function(){
        Route::get('/', [CommentController::class, 'comment'])->name('comment.index');
        Route::get('/edit/{id}', [CommentController::class, 'edit'])->name('comment.edit');
        Route::post('/update/{id}', [CommentController::class, 'update'])->name('comment.update');
        Route::delete('/delete/{id}', [CommentController::class, 'delete'])->name('comment.delete');
        Route::get('/trash', [CommentController::class, 'trash'])->name('comment.trash');
        Route::get('/untrash/{id}', [CommentController::class, 'untrash'])->name('comment.untrash');

    });
    
});



