<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importacao do inertia ao controller
use Inertia\Inertia;
//importacao dos scripts para a criacao do utilizador
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrarController extends Controller
{
    //para criar a vista da pagina registrar
    public function mostrar_registrar(Request $request){
        //mostra a Pagina da Registrar.vue
        return Inertia::render('Paginas_Publicas/Registrar');
    }

    public function registrar(Request $request){
        //define um nome para pesquisar u utilizador existente
        $verificar_utilizador_existe = User::where('email', $request->email)->exists();

        //verifica se existe
        if ($verificar_utilizador_existe) {
            $message = 'O utilizador já existe';

            //mostra a mensagem e leva o utilizador para a pagina
            return redirect('/registrar')->with('message', $message);
        } else {
            $utilizador = new User();
            $utilizador->name = $request->name;
            $utilizador->email = $request->email;
            //cria a senha portegida
            $utilizador->password = Hash::make($request->password);
            $utilizador->save();

            $message = 'Utilizador registado com sucesso';

            //mostra a mensagem e leva o utilizador para a pagina
            return redirect('/entrar')->with('message', $message);
        }
    }
}