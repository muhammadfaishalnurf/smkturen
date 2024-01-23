
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\SessionController;

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
/*

Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',[BaseController::class,'index']);
Route::get('/database',[BaseController::class,'database']);
Route::get('/database/futsal',[BaseController::class,'futsal']);
Route::post('/database/store' ,[BaseController::class,'store']);
Route::get('/database/edit/{id}', [BaseController::class, 'edit']);
Route::post('/database/update', [BaseController::class,'update']);
Route::get('/database/hapus/{id}', [BaseController::class,'hapus']);
Route::get('/database/cari', [BaseController::class, 'cari']);
Route::get('/sesi',[SessionController::class,'index']);
Route::post('/sesi/login',[SessionController::class,'login']);
Route::post('/sesi/logout',[SessionController::class,'logout']);
