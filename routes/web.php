<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MainController::class, 'mainView'])->name('/');

Route::middleware('UserControll')->group(function (){

    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    Route::get('admins', [AdminController::class, 'adminView'])->name('admin')->middleware('AdminControll');

    Route::get('addprod', [ProductController::class, 'addProductView'])->name('addProd')->middleware('AdminControll');
    Route::post('addprod', [ProductController::class, 'addProductPost']);
    Route::get('addcateg', [CategoryController::class, 'addCategView'])->name('addCateg')->middleware('AdminControll');
    Route::post('addcateg', [CategoryController::class, 'addCategPost'])->middleware('AdminControll');

    Route::post('/cart/{id}', [MainController::class, 'cartAdd'])->name('addCart');
    Route::get('cart', [CartController::class, 'cartView'])->name('cartView');

    Route::post('cart/del/{id}', [CartController::class, 'deleteCart'])->name('deleteCart');


});

Route::get('login', [UserController::class, 'loginView'])->name('login');
Route::post('login', [UserController::class, 'loginPost']);

Route::get('registration', [UserController::class, 'registrView'])->name('reg');
Route::post('registration', [UserController::class, 'registrPost']);

Route::get('warning', [UserController::class, 'warningView'])->name('warning');

