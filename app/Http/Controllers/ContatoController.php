<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contato = [
            '1' => "Dúvida",
            '2' => "Elogio",
            '3' => "Reclamação"
        ];
        
        return view('site/contato', compact('motivo_contato'));
        
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';

        // echo $request->input('nome');

        // $contato = new SiteContato();
        // $contato->fill($request->all());   
        

        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');

        // print_r($contato->getAttributes());

        // $contato->save();
    }


    public function salvar(Request $request){

        // validação

        $request->validate([
            "nome" => 'required|min:3|max:40',
            "telefone" => 'required',
            "email" => 'required|email',
            "motivo_contato" => 'required',
            "mensagem" => 'required|max:2000',
        ]);
        // $contato = new SiteContato();
        // $contato->create($request->all());
    }


}
;