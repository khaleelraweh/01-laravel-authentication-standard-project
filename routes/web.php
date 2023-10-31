<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify'=>true]);

//Frontend 
Route::get('/',         [FrontendController::class,'index'])->name('frontend.index');
Route::get('/index',    [FrontendController::class,'index'])->name('frontend.index');
Route::get('/cart',     [FrontendController::class,'cart'])->name('frontend.cart');
Route::get('/checkout', [FrontendController::class,'checkout'])->name('frontend.checkout');
Route::get('/detail',   [FrontendController::class,'detail'])->name('frontend.detail');
Route::get('/shop',     [FrontendController::class,'shop'])->name('frontend.shop');


//Backend
Route::get('/admin', [BackendController::class,'index'])->name('backend.index');
Route::get('/admin/index', [BackendController::class,'index'])->name('backend.index2');
Route::get('/admin/login', [BackendController::class,'login'])->name('backend.auth-login');
Route::get('/admin/register', [BackendController::class,'register'])->name('backend.auth-register');
Route::get('/admin/recover-password', [BackendController::class,'recover_password'])->name('backend.auth-recover-password');
Route::get('/admin/lock-screen', [BackendController::class,'lock_screen'])->name('backend.auth-lock-screen');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
