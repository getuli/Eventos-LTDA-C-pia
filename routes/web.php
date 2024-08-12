<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventosController;

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

Route::get('/',[EventosController::class, 'evento']);
Route::get('/form',[EventosController::class, 'form']);
Route::post('/create',[EventosController::class, 'register']);
Route::get('/view/{id}',[EventosController::class, 'view']);
Route::get('/dashboard',[EventosController::class, 'dashboard']);
Route::get('/edit/{id}',[EventosController::class, 'edit'])->middleware('auth');
Route::put('/edit/update/{id}',[EventosController::class, 'update'])->middleware('auth');
Route::delete('/destroy/{id}',[EventosController::class, 'destroy'])->middleware('auth');
Route::post('/join/{id}',[EventosController::class, 'join'])->middleware('auth');
Route::delete('/leave/{id}',[EventosController::class, 'leave'])->middleware('auth');


