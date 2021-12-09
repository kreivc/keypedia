<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeyboardController;
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
    Route::get('/createKeyboard',[HomeController::class,'showAddKeyboard'])->middleware('manager')->name('createKeyboard');
    Route::post('/create',[KeyboardController::class,'add'])->middleware('manager')->name('addKeyboard');
});