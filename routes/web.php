<?php

use App\Http\Controllers\FormTemplateController;
use App\Http\Controllers\UserController;
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

// Get
Route::get('/form/template', [UserController::class, 'index'])->name('form_template');
Route::view('/login', [UserController::class, 'index'])->name('login');

// Post
Route::post('/form/template', [FormTemplateController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);
