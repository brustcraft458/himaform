<?php

use App\Http\Controllers\FormTemplateController;
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

Route::get('/form/template', function () {
    return view('form.template', [
        'jadwal_list' => [
            [
                'id_jadwal' => '0',
                'nama' => 'asdad',

            ]
        ]
    ]);
})->name('form_template');

Route::post('/form/template', [FormTemplateController::class, 'store']);
