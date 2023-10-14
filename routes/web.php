<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\adminController;



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
// người dùng
Route::get('/', [indexController::class, 'index'])->name('index');
Route::get('/san-pham/{id}', [indexController::class, 'show'])->name('show1');
//san pham
Route::get('/admin/san-pham', [adminController::class, 'index'])->name('indexProducts');
Route::get('/admin/san-pham/chinh-sua/{id}', [adminController::class, 'show'])->name('show');
Route::post('/admin/san-pham/chinh-sua/{id}', [adminController::class, 'edit'])->name('edit');
Route::post('/admin/san-pham/them-moi', [adminController::class, 'store'])->name('xu-li-them-san-pham');
Route::delete('/admin/san-pham/{id}',[adminController::class,'destroy'])->name('destroy');
//loai san pham
Route::get('/admin/loai-san-pham', [adminController::class, 'indexCate'])->name('indexCates');
Route::post('/admin/loai-san-pham', [adminController::class, 'storeCate'])->name('xu-li-them-loai-san-pham');
Route::get('/admin/loai-san-pham/chinh-sua/{id}', [adminController::class, 'showCate'])->name('showCate');
Route::post('/admin/loai-san-pham/chinh-sua/{id}', [adminController::class, 'editCate'])->name('editCate');
Route::delete('/admin/loai-san-pham/{id}',[adminController::class,'destroyCate'])->name('destroyCate');








