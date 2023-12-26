<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShiftsController;

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

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');

Route::get('/turnos', [ShiftsController::class, 'request']);
Route::get('/areas', [ShiftsController::class, 'areas'])->name('turnos.areas');
Route::get('turnos/solicitado', [ShiftsController::class, 'save'])->name('request');
Route::get('/salas', [ShiftsController::class, 'roomScreens']);
Route::get('/sala/{room}', [ShiftsController::class, 'screen']);
