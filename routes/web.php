<?php

use App\Http\Controllers\Frontend\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Livewire\RoleManagement;

Route::get('/', function () {
    return view('welcome');
});
  
Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/role-management', RoleManagement::class)->middleware('auth');


Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('d.home');
    
});
  
Route::group(['middleware' => ['auth'], 'as' => 'dashboard.'], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

