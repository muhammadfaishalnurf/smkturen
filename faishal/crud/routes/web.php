<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class, 'authenticating']);
Route::get('/logout',[AuthController::class, 'logout'])->middleware('auth');


Route::get('/',[BaseController::class,'index'])->middleware('auth');
Route::get('/database',[BaseController::class,'database'])->middleware('auth');
Route::get('/database/tambah',[BaseController::class,'tambah'])->middleware('auth');
Route::post('/database/store',[BaseController::class, 'store'])->middleware('auth');
Route::post('/database/update',[BaseController::class, 'update'])->middleware('auth');
Route::get('/database/hapus/{id}',[BaseController::class, 'hapus'])->middleware('auth');
Route::get('/search',[BaseController::class,'search'])->middleware('auth');