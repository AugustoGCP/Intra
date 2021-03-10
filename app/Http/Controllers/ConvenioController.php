<?php

namespace App\Http\Controllers;

use App\Models\Convenio;
use App\Models\Telefone;
use App\Models\Procedimento;
use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\ProcedimentoController;
use App\Http\Controllers\WebController;
use Illuminate\Http\Request;


class ConvenioController extends Controller
{

    public function index($id_convenio, $id_procedimento){

        $convenios = Convenio::where('cod_convenio', $id_convenio)->get();

        foreach($convenios as $convenio){

            $procedimentos = Procedimento::where('cod_procedimento', $id_procedimento)->get();

            foreach($procedimentos as $procedimento){
                
                $array = [];

                $telefones = TelefoneController::show($convenio['cod_convenio']);

                unset($tels);

                foreach($telefones as $telefone){

                    $tels[] = $telefone['numero_telefone'];

                }

                $array[] = [
                    'nome_convenio' => $convenio['nome_convenio'],
                    'nome_procedimento' => $procedimento['nome_procedimento'],
                    'cabecalho_procedimento' => $procedimento['cabecalho_procedimento'],
                    'corpo_procedimento' => $procedimento['corpo_procedimento'],
                    'telefones' => $tels
                ];

            }

            return view('/procedimento', ['array' => $array]);

        }

    }

    public function create()
    {
        //
    }

    public function store(Request $request){ 

        // $json = $request->all();

        // $data = json_decode($json['data']);

        $data = $request->all();

        // return $data;

        Convenio::create([
            'nome_convenio' => $data['nome_convenio'],
            'rua_convenio' => $data['rua_convenio'],
            'bairro_convenio'=> $data['bairro_convenio'],
            'cidade_convenio' => $data['cidade_convenio'],
            'pertence' => $data['pertence'],
            'gerado_por' => session('logged')
        ]);

        TelefoneController::create($data['telefone'], $convenio->cod_convenio);

        return redirect('/dashboard');

        // if( ($convenio->save()) && (TelefoneController::create($data['telefone'], $convenio->cod_convenio)))
        //     return true;
        // else    
        //     return false;

    }

    public function show(){

        $result = Convenio::all();

        return $result;

    }

    public function find(Request $request){

        $data = $request->all();

        $array = [];

        $convenio = Convenio::find($data['cod']);

        $telefones = TelefoneController::show($convenio['cod_convenio']);

        $array = [
            'nome_convenio' => $convenio['nome_convenio'],
            'rua_convenio' => $convenio['rua_convenio'],
            'bairro_convenio' => $convenio['bairro_convenio'],
            'cidade_convenio' => $convenio['cidade_convenio'],
            'telefones' => $telefones,
            'activated' => $convenio['activated'],
        ];

        return $array;

    }

    public function search(Request $request){

        $data = $request->all(); 
        
        if(isset($data['dados']['palavra']))
            $search = $data['dados']['palavra'];
        else
            $search = $data['dados'];

        $convenios = Convenio::where('nome_convenio','like', $search.'%')
        ->orderBy('nome_convenio')
        ->get(); 

        // $array = [];

        foreach($convenios as $convenio){
            
            $array[] = $this->fillArray($convenio);

        }    
    
        return $array;

    }

    private function fillArray($convenio){

        $array = [];

        $procedimentos = ProcedimentoController::show($convenio['cod_convenio']);

            foreach($procedimentos as $procedimento){
                
                $telefones = TelefoneController::show($convenio['cod_convenio']);

                unset($tels);

                foreach($telefones as $telefone){

                    $tels[] = $telefone['numero_telefone'];

                }

                $array[] = [
                    'cod_convenio' => $convenio['cod_convenio'],
                    'cod_procedimento' => $procedimento['cod_procedimento'],
                    'nome_convenio' => $convenio['nome_convenio'],
                    'nome_procedimento' => $procedimento['nome_procedimento'],
                    'cabecalho_procedimento' => $procedimento['cabecalho_procedimento'],
                    'corpo_procedimento' => $procedimento['corpo_procedimento'],
                    'telefones' => $tels
                ];

            }
        
        return $array;
        
    }

    public function edit(Request $request){


    }

    public function update(Request $request){
        
        $data = $request->all();

        Convenio::where('cod_convenio', $data['cod_convenio'])
        ->update([
            "nome_convenio" => $data['nome_convenio'],
            "rua_convenio" => $data['rua_convenio'],
            "bairro_convenio" => $data['bairro_convenio'],
            "cidade_convenio" => $data['cidade_convenio']
        ]); 

        Telefone::where('convenio_telefone', $data['cod_convenio'])->delete();

        TelefoneController::create($data['telefone'], $data['cod_convenio']);
    
        return redirect('/dashboard');

    }
    
    public function destroy(Convenio $convenio)
    {
        //
    }
}
