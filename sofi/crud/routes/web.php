<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\SessionController;
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

Route::get('/',[DataController::class,'index'])->middleware('auth');

Route::get('/datanilai',[DataController::class,'datanilai']);
Route::get('/datanilai/tambah',[DataController::class,'tambah']);
Route::post('/datanilai/store',[DataController::class, 'store']);
Route::get('/datanilai/edit/{id}',[DataController::class, 'edit']);
Route::post('/datanilai/update',[DataController::class, 'update']);
Route::get('/datanilai/hapus/{id}',[DataController::class,'hapus']);
Route::get('/search',[DataController::class,'search']);
Route::get('/sesi',[SessionController::class,'index'])->name('login');
Route::post('/sesi/login',[SessionController::class,'login']) ;
Route::post('/sesi/logout',[SessionController::class,'logout']);