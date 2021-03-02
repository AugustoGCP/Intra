<?php

namespace App\Http\Controllers;

use App\Models\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    
    public function index(){
        //
    }

    public static function create($telefones, $cod_convenio){

        foreach($telefones as $telefone){

            if($telefone===null)
                continue;
            else{
                Telefone::create([
                    'numero_telefone' => $telefone,
                    'convenio_telefone' => $cod_convenio
                ]);
            }
            
        }  

    }
    
    public function store($telefones){
        //
    }

    public static function show($cod_convenio){

        if($telefones = Telefone::select('numero_telefone')
        ->where('convenio_telefone', $cod_convenio)
        ->get())
            return $telefones; 
        else    
            return false;
            
    }
    public function edit(Telefone $telefone)
    {
        //
    }
    public function update(Request $request, Telefone $telefone)
    {
        //
    }
    public function destroy(Telefone $telefone)
    {
        //
    }
}
