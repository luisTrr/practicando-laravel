<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

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
// 1. Mostrar los 10 primeras eventos
Route::get('/eventos',[EventoController::class,'getEventos']);

// 2. Mostrar los primeros 10 comentario capturando el ID de publicacion
Route::get('/noticiasDeEventos', [EventoController::class, 'getNoticiasDeEventos']);

// 3. Insertar una publicacion mediante postman
Route::post('/eventosEdit', [EventoController::class, 'insertarNoticia']);

// 4. Buscar una publiacion con el nombre de :
Route::post('/buscarPorTitulo', [EventoController::class, 'buscarNoticiaPorTitulo']);

// 5. Contar cuantos comentarios tiene la primera publicacion
Route::get('/contarNoticiasPrimerEvento', [EventoController::class, 'contarNoticiasPrimerEvento']);

// 6. mediaten el Id comentario verificar  a que publicacion corresponde
Route::post('/verificarEventoDeNoticia', [EventoController::class, 'verificarEventoDeNoticia']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
