<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(IndexController::class)->group(function () {
    Route::get('/', IndexController::class);
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix'=>'admin', 'middleware'=>['auth', 'admin']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix'=>'posts'], function () {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/{post}', 'DeleteController')->name('admin.post.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix'=>'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.categories.index');
        Route::get('/create', 'CreateController')->name('admin.categories.create');
        Route::post('/', 'StoreController')->name('admin.categories.store');
        Route::get('/{category}', 'ShowController')->name('admin.categories.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.categories.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.categories.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.categories.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix'=>'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
