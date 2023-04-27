<?php

//importacao do route
use Illuminate\Support\Facades\Route;

//importacao dos controllers
use App\Http\Controllers\{
    //importacao do PaginaInicialController
    PaginaInicialController,
    //importacao do RegistrarController
    RegistrarController,
    //importacao do EntrarController
    EntrarController,
    //importacao do PaginaInicialUtilizadorController
    PaginaInicialUtilizadorController,
    PerfilController
    //LinguaController

};

//importacao do inertia ao controller
use Inertia\Inertia;

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

//importacao dos routes dos controllers
//routes publicos
Route::get('/', [PaginaInicialController::class, 'mostrar_pagina_inicial']);

Route::get('registrar', [RegistrarController::class, 'mostrar_registrar'])->name('registrar');
Route::post('registrar', [RegistrarController::class, 'registrar'])->name('registrar');
Route::get('entrar', [EntrarController::class, 'mostrar_entrar'])->name('entrar');
Route::post('entrar', [EntrarController::class, 'entrar']);

//routes privados
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('sair', [EntrarController::class, 'sair'])->name('sair');
    Route::get('pagina_inicial_utilizador', [PaginaInicialUtilizadorController::class, 
        'mostrar_pagina_inicial_utilizador'])->name('pagina_inicial_utilizador');
    Route::get('perfil', [PerfilController::class, 'inicio_perfil'])->name('perfil');
    Route::post('perfil', [PerfilController::class, 'update'])->name('profile.update');
});
