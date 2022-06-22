<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
Route::get('/', [ContactController::class, 'inputContact']);
Route::post('/confirm', [ContactController::class, 'confirmContact']);
Route::post('/revise', [ContactController::class, 'reviseContact']);
Route::post('/thanks', [ContactController::class, 'sendContact']);
Route::get('/index', [ContactController::class, 'index']);
Route::post('/index', [ContactController::class, 'index']);
Route::post('/index/delete', [ContactController::class, 'delete']);
Route::get('/verror', [ContactController::class, 'inputContact']);