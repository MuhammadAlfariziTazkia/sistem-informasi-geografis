<?php

use App\Http\Controllers\OlahragaController;
use App\Http\Controllers\WisataController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/olahraga', [OlahragaController::class, 'index']);
Route::get('/olahraga/{id}', [OlahragaController::class, 'detail']);
Route::get('/wisata', [WisataController::class, 'index']);
Route::get('/wisata/{id}', [WisataController::class, 'detail']);