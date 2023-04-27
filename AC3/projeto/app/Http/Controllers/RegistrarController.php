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
            $success = false;
            $message = 'O utilizador já existe';
        } else {
            $utilizador = new User();
            $utilizador->name = $request->name;
            $utilizador->email = $request->email;
            //cria a senha portegida
            $utilizador->password = Hash::make($request->password);
            $utilizador->save();

            $success = true;
            $message = 'Utilizador registado com sucesso';
        
        }

        $response = [
            'success' => $success,
            'message' => $message,
        ];
                
        //return response()->json($response);
        //mostra a mensagem a leva utilizador para a pagina
        return redirect('/entrar')->with('message', json_encode($response));
    }
}