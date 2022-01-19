<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [App\Http\Controllers\FotoController::class, 'index']);
Route::post('dashboard', [App\Http\Controllers\FotoController::class, 'dashboard']);
Route::get('dashboard', [App\Http\Controllers\FotoController::class, 'dashboard']);
Route::get('detail/{id}/{token}', [App\Http\Controllers\FotoController::class, 'detail']);

Route::get('form/{token}', [App\http\Controllers\FotoController::class, 'create']);
Route::get('form/{id}/{token}', [App\http\Controllers\FotoController::class, 'edit']);

Route::post('store', [App\http\Controllers\FotoController::class, 'store']);
Route::put('update/{id}', [App\http\Controllers\FotoController::class, 'update']);
Route::get('delete/{id}/{token}', [App\http\Controllers\FotoController::class, 'delete']);
Route::delete('destroy/{id}', [App\http\Controllers\FotoController::class, 'destroy']);

Route::post('like', [App\Http\Controllers\FotoController::class, 'like']);
Route::post('unlike', [App\Http\Controllers\FotoController::class, 'unlike']);
Route::post('logout', [App\Http\Controllers\FotoController::class, 'logout']);
