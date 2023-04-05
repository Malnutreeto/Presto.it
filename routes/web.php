<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\twoFactorAuthenticationController;
use App\Http\Middleware\Authenticate;
use App\Models\Sub_category;
use App\Models\Main_category;
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

Route::get('/user/2fa', [twoFactorAuthenticationController::class, 'enableOrDisable'])->name('auth.2fa')->middleware('auth');
Route::resource('category', CategoryController::class);
Route::resource('sub_category', SubCategoryController::class);
Route::resource('product', ProductController::class);

Route::get('auth/{provider}/redirect', [SocialController::class, 'redirect'])->name('auth.socialite.redirect');
Route::get('auth/{provider}/callback', [SocialController::class, 'callback'])->name('auth.socialite.callback');
Route::get('auth/{provider}/user', [SocialController::class, 'index']);

Route::get('/', [PageController::class, 'home'] )->name('home');
Route::get('/admin', [PageController::class, 'adminPanel'] )->name('admin');
Route::get('/work', [PageController::class, 'workWithUs'] )->name('work');
Route::post('/work', [PageController::class, 'workRequest'] );