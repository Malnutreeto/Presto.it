<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\twoFactorAuthenticationController;
use App\Models\Sub_category;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth')->group(function() {
    Route::get('/user/2fa', [twoFactorAuthenticationController::class, 'enableOrDisable'])->name('auth.2fa');
    Route::resource('category', CategoryController::class);
    Route::resource('sub_category', SubCategoryController::class);
});

Route::get('/', function () {
    return view('welcome');
});