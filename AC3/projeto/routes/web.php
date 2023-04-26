<?php

use Illuminate\Support\Facades\Route;

//importacao dos controllers
use App\Http\Controllers\{
    //importacao do PaginaInicialController
    HomeController,

};

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
Route::get('/', [HomeController::class, 'mostrar_pagina_inicial']);
