<?php

namespace App\Http\Controllers;

use App\Models\Procedimento;
use App\Http\Controllers\WebController;
use Illuminate\Http\Request;

class ProcedimentoController extends Controller
{
    public function index(){
        
    }

    public function create(){

        //

    }

    public function store(Request $request){

        $data = $request->all();

        Procedimento::create([
            'nome_procedimento' => $data['nome_procedimento'],
            'cabecalho_procedimento' => $data['cabecalho_procedimento'],
            'corpo_procedimento'=> $data['corpo_procedimento'],
            'data_criacao_procedimento' => date("Y-m-d"),
            'pertence' => $data['pertence'],
            'gerado_por' => session('logged')
        ]);

        return redirect('/dashboard');
    }
    
    public static function show($cod_convenio){

        if($procedimentos = Procedimento::where('pertence', $cod_convenio)->get())
            return $procedimentos;
        else
            return false;

    }

    public function find(Request $request){

        $data = $request->all();

        return $procedimento = Procedimento::where('pertence', $data['valor'])->get();

        // if($procedimento = Procedimento::where('pertence', $data['valor'])->get())
        //     return $procedimento;
        // elseif($procedimento = Procedimento::where('cod_procedimento', $data['valor'])->get())
        //     return $procedimento;
        // else    
        //     return false;
            
    }

    public function edit(Request $request){
        
        $id_procedimento = $request->get('valor');
        
        $array = [];

        $procedimentos = Procedimento::where('cod_procedimento', $id_procedimento)->get();

        foreach($procedimentos as $procedimento){

            $array[] = [
                'nome_procedimento' => $procedimento['nome_procedimento'],
                'cabecalho_procedimento' => $procedimento['cabecalho_procedimento'],
                'corpo_procedimento' => $procedimento['corpo_procedimento'],
            ];

        }

        return $array;

    }

    public function update(Request $request){

        $data = $request->all();

        // return $request;

        Procedimento::where('cod_procedimento', $data['cod_procedimento'])
        ->update([
            'nome_procedimento' => $data['nome_procedimento_edit'],
            'cabecalho_procedimento' => $data['cabecalho_procedimento_edit'],
            'corpo_procedimento' => $data['corpo_procedimento_edit'],
        ]);

        return redirect('/dashboard');

    }

    public function destroy(Procedimento $procedimento)
    {
        //
    }
}
