<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ChamadoController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\DepartamentoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class, 'login'])->withoutMiddleware(['auth:sanctum']);
Route::middleware(['auth:sanctum'])->get('/token/user', [UserController::class, 'getUserByToken']);

Route::post('/token', [LoginController::class, 'requestToken'])->withoutMiddleware(['auth:sanctum']);

Route::middleware(['auth:sanctum'])->get('user/{id}/chamados', [ChamadoController::class, 'meusChamados']);
Route::middleware(['auth:sanctum'])->get('chamados/data', [DepartamentoController::class, 'getGeneralData']);
Route::middleware(['auth:sanctum'])->resource('user', UserController::class);
Route::middleware(['auth:sanctum'])->post('user/{id}/set_foto', [UserController::class, 'setFoto']);
// Route::middleware(['auth:sanctum'])->resource('chamados', ChamadoController::class);
Route::middleware(['auth:sanctum'])->resource('chamados', ChamadoController::class);
