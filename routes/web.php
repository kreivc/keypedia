<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/keyboard')->middleware('auth')->group(function(){
    Route::get('/createKeyboard',[KeyboardController::class,'index'])->middleware('manager')->name('createKeyboard');
    Route::post('/create',[KeyboardController::class,'add'])->middleware('manager')->name('addKeyboard');
    Route::get('/edit/{id}',[KeyboardController::class,'edit'])->middleware('manager')->name('editKeyboard');
    Route::put('/update/{id}',[KeyboardController::class,'update'])->middleware('manager')->name('updateKeyboard');
    Route::get('/delete/{id}',[KeyboardController::class,'delete'])->middleware('manager')->name('deleteKeyboard');
});

Route::prefix('/category')->middleware('auth')->group(function(){
    Route::get('/manageCategory',[CategoryController::class,'index'])->middleware('manager')->name('manageCategory');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->middleware('manager')->name('editCategory');
    Route::put('/update/{id}',[CategoryController::class,'update'])->middleware('manager')->name('updateCategory');
    Route::get('/delete/{id}',[CategoryController::class,'delete'])->middleware('manager')->name('delete');
});

Route::get('/changePassword',[HomeController::class,'changePassword'])->middleware('auth')->name('changePassword');
Route::post('/changePassword',[HomeController::class,'storeNewPassword'])->middleware('auth')->name('storeNewPassword');

Route::get('/viewKeyboard/{id}',[CategoryController::class,'viewByCategory'])->name('viewKeyboard');
Route::get('/keyboard/detail/{id}',[KeyboardController::class,'viewDetail'])->name('detailKeyboard');
Route::post('/addToCart/{id}',[CartController::class,'addToCart'])->middleware('auth')->name('addCart');


Route::get('/search',[CategoryController::class,'search'])->name('search');

Route::get('/myCart',function(){
    return view('myCart');
})->name('myCart');
