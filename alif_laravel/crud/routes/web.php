<?php

use App\Http\Controllers\basecontroller;
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

Route::get('/',[basecontroller::class,'index']);

Route::get('/database',[basecontroller::class,'database']);
Route::get('/database/tambah',[basecontroller::class,'tambah']);
Route::post('/database/store',[basecontroller::class, 'store']);
Route::get('/database/edit/{id}',[basecontroller::class, 'edit']);
Route::post('/database/update',[basecontroller::class, 'update']);
Route::get('/database/hapus/{id}',[basecontroller::class,'hapus']);
Route::get('/search',[basecontroller::class,'search']);
Route::get('/sesi',[SessionController::class,'index']);
Route::post('/sesi/login',[SessionController::class,'login']);
Route::post('/sesi/logout',[SessionController::class,'logout']);