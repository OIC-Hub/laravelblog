<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostsController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Posts
Route::get('/admin/post', [PostsController::class, 'index'])->name('admin.post');
Route::get('/admin/post/create', [PostsController::class, 'create'])->name('admin.post.create');
Route::post('/admin/post', [PostsController::class, 'store'])->name('admin.post.store');
Route::delete('/admin/post/delete/{id}', [PostsController::class, 'delete'])->name('admin.post.delete');
