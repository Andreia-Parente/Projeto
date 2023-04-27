<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importacao do inertia ao controller
use Inertia\Inertia;

class PaginaInicialUtilizadorController extends Controller
{
    //para criar a vista da pagina inicial do utilizador
    public function mostrar_pagina_inicial_utilizador(Request $request){
        //mostra a Pagina da Pagina_Inicial_Utilizador.vue
        return Inertia::render('Paginas_Privadas/Pagina_Inicial_Utilizador');
    }
}