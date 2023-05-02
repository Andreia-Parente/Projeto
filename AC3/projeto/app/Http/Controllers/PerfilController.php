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
    public function mostrar_perfil(Request $request){
        //mostra todos os itens do utilizador
        $user = $user = Auth::user();

        //mostra a Pagina da Perfil.vue com os dados do utilizador autenticado
        return Inertia::render('Paginas_Privadas/Perfil', ['user'=>$user]);
    }

    public function update(Request $request){
        //define um nome para pesquisar o utilizador existente
        $verificar_utilizador_existe = User::where('email', $request->email)->exists();
        
        //verifica se existe
        if ($verificar_utilizador_existe) {
            $message = 'O utilizador já existe';

            //mostra a mensagem e leva o utilizador para a pagina
            return redirect('perfil')->with('message', $message);
        } else {
            //serve para buscar os dados do nome e email que esta iniciada a sessao
            $request->user()->fill($request->validate([
                'name' => 'required',
                'email' => 'required'
            ]));

            //iguala o input a todos os dados
            $input = $request->all();
            
            //verifica o ficheiro, pasta, extensao e cria os objetos
            if ($image = $request->file('image')) {
                $pastaDestino = 'imagens_perfil/';
                $imagemNome = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($pastaDestino, $imagemNome);
                $input['image'] = "$profileImage";
            }else{
                unset($input['image']);
            }

            //atualiza o perfil do utilizador
            $request->user()->update($input);

            //leva o utilizador para a pagina
            return redirect()->route('perfil');
        }
    }
}