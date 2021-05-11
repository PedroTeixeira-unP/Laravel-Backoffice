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
Route::group(['prefix' => 'panel'], function()  
{  
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index',])->name('home');

    Route::get('/users', [App\Http\Controllers\UsersController::class, 'users',])->name('user');
    
    Route::get('/users/create/{id}', [App\Http\Controllers\UsersController::class, 'edit',])->name('edit');
    
    Route::get('/users/create/{id}', [App\Http\Controllers\UsersController::class, 'deleteusers',])->name('users.delete');
});