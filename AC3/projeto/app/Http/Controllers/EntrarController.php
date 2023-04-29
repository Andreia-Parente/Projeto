<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importacao do inertia ao controller
use Inertia\Inertia;
//importacao dos scripts para a entrada/saida do utilizador
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EntrarController extends Controller
{
    //para criar a vista da pagina entrar
    public function mostrar_entrar(Request $request){
        //mostra a Pagina da Entrar.vue
        return Inertia::render('Paginas_Publicas/Entrar');
    }

    public function entrar(Request $request){
        //define um array com os valores do nome e palavra-passe
        $credenciais = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        //entra com as credenciais do array
        if (Auth::attempt($credenciais)) {
            $message = 'Utilizador entrou com sucesso';

            //mostra a mensagem e leva o utilizador para a pagina
            return redirect('/pagina_inicial_utilizador')->with('message', $message);  
        } else {
            $message = 'Utilizador não encontrado';

            //mostra a mensagem e leva o utilizador para a pagina
            return redirect('/entrar')->with('message', $message);
        }         
    }
    
    public function sair(){
        try {
            //liverta a sessao iniciada
            Session::flush();
            $success = true;
            $message = 'Saída com sucesso';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        $response = [
            'success' => $success,
            'message' => $message,
        ];

        //mostra a mensagem a leva utilizador para a pagina
        return redirect('/')->with('message', json_encode($response));
    }
}