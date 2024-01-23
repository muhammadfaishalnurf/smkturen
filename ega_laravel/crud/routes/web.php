<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\baseController;
use App\Http\Controllers\sessionsController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/',[baseController::class,'index'])->middleware('auth');

Route::get('/login',[sessionsController::class,'login'])->name('login');
Route::post('/login',[sessionsController::class,'authenticating']);
Route::get('/logout',[sessionsController::class,'logout'])->middleware('auth');

Route::get('/database',[baseController::class,'database'])->middleware('auth');
Route::get('/database/absen',[baseController::class,'absen'])->middleware('auth');
Route::post('/database/store',[baseController::class,'store'])->middleware('auth');
Route::get('/database/edit/{id}',[baseController::class,'edit'])->middleware('auth');
Route::post('/database/update',[baseController::class,'update'])->middleware('auth');
Route::get('/database/hapus/{id}',[baseController::class,'hapus'])->middleware('auth');
Route::get('/database/cari',[baseController::class,'cari'])->middleware('auth');
