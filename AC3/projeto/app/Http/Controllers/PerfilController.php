<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importacao do inertia ao controller
use Inertia\Inertia;
//importacao das tabelas de utilizador
use App\Models\User;
//ver o utilizador autenticado
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    //para criar a vista da pagina perfil
    public function inicio_perfil(Request $request){
        //mostra todos os itens do utilizador
        $user = $user = Auth::user();

        //mostra a Pagina da Perfil.vue com os dados do utilizador autenticado
        return Inertia::render('Paginas_Privadas/Perfil', ['user'=>$user]);
    }

    public function update(Request $request){

        //serve para buscar os dados do nome e email que esta iniciada a sessao
        $request->user()->fill($request->validate([
            'name' => 'required',
            'email' => 'required'
        ]));

        //iguala o input a todos os dados
        $input = $request->all();
        
        //verifica o ficheiro, pasta, extensao e cria os objetos
        if ($image = $request->file('image')) {
            $destinationPath = 'imagens_perfil/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $request->user()->update($input);


        

        return redirect()->route('perfil');
        
    }


}