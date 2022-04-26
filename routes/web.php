<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [RegisterController::class, 'check_register']);

Route::post('/register/step1', [UserController::class, 'step_one']);
Route::post('/register/step2', [UserController::class, 'step_two']);
Route::post('/register/step3', [UserController::class, 'step_three']);
