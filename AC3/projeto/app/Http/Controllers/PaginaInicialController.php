<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importacao do inertia ao controller
use Inertia\Inertia;

class PaginaInicialController extends Controller
{
    //para criar a vista da pagina pagina inicial
    public function mostrar_pagina_inicial(Request $request){
        //mostra a Pagina da Pagina_Inicial.vue
        return Inertia::render('Paginas_Publicas/Pagina_Inicial');
    }
}