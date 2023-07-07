<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;

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

Route::get('/', [UserController::class,'fetch']);
Route::post('/',[UserController::class,'add'])->name('add.user');
Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit.user');
Route::get('/user',[UserController::class,'user'])->name('user');
Route::get('/search',[ProductController::class,'sear'])->name('filter');

Route::resource('student', StudentController::class);
