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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum,admin', 'verified'])->get('admin/dashboard', function () {
    return view('dashboard');
})->name('admin.dashboard');

Route::group(['prefix'=>'admin.', 'middleware'=>'admin.admin'], function (){
    Route::get('login',[\App\Http\Controllers\AdminController::class, 'showLoginForm']);
    Route::post('login',[\App\Http\Controllers\AdminController::class, 'login'])->name('login');
});
