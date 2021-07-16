<?php

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
Auth::routes();

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index',])->middleware('verified')->name('home');

	
	//USERS VIEWS
    Route::get('/users', [App\Http\Controllers\UsersController::class, 'users',])->name('user');
    
    Route::get('/users/edit/{id}', [App\Http\Controllers\UsersController::class, 'editedbyadmin',])->name('user.edit');
    Route::post('/users/edit',  [App\Http\Controllers\UsersController::class, 'updatedbyadmin',])->name('user.update');

    Route::get('/users/delete/{id}',  [App\Http\Controllers\UsersController::class, 'deletedbyadmin',])->name('user.delete');
	
    Route::get('/users/create', [App\Http\Controllers\UsersController::class, 'createdViewAdmin',])->name('user.createview');
    Route::post('/users/create',  [App\Http\Controllers\UsersController::class, 'createdbyAdmin',])->name('user.create');
	
	
	//BANNERS VIEWS
	Route::get('/banners', [App\Http\Controllers\BannerController::class, 'banners'],)->name('banners');
	
    Route::get('banners/edit/{id}', [App\Http\Controllers\BannerController::class, 'editedbyadmin',])->name('banners.edit');
    Route::post('banners/edit',  [App\Http\Controllers\BannerController::class, 'updatedbyadmin',])->name('banners.update');
	
	//VIPS VIEWS
	Route::get('/vips', [App\Http\Controllers\VipController::class, 'vips'],)->name('vips');
	
    Route::get('/vips/edit/{id}', [App\Http\Controllers\VipController::class, 'editvips',])->name('vips.edit');
	Route::post('/vips/edit/', [App\Http\Controllers\VipController::class, 'update',])->name('vips.update');
	Route::post('/vips/editlista/', [App\Http\Controllers\VipController::class, 'updatelista',])->name('vips.updatelista');
	Route::post('/vips/deletelista/', [App\Http\Controllers\VipController::class, 'deletelista',])->name('vips.deletelista');
	
    Route::get('/vips/create', [App\Http\Controllers\VipController::class, 'createdView',])->name('vips.view');
    Route::post('/vips/create',  [App\Http\Controllers\VipController::class, 'created',])->name('vips.create');
	
	
    Route::get('/vips/delete/{id}',  [App\Http\Controllers\VipController::class, 'deleted',])->name('vips.delete');
	