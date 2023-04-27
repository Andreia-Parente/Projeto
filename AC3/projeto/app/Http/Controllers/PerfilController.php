<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importacao do inertia ao controller
use Inertia\Inertia;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{
    //para criar a vista da pagina perfil
    public function inicio_perfil(Request $request){
        //mostra todos os itens do utilizador
        $users = User::all();
        //mostra a Pagina da Perfil.vue
        return Inertia::render('Paginas_Privadas/Perfil', compact('users'));
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
            $destinationPath = 'images/';
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