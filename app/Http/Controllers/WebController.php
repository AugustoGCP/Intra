<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Controllers\ConvenioController;


class WebController extends Controller
{

    public function index(){
        return view('search');
    }

    public function indexDashboard(){

        $results = new ConvenioController;
        $convenios = $results->show();

        return view('/dashboard', ['convenios' => $convenios]);
        // return redirect()->route('/dashboard', ['convenios' => $convenios]);
    }

    public function create(Request $request){

        $data = $request->all();

        if($users = Usuario::where('nome_usuario', $data['usuario'])->where('senha_usuario', $data['password'])->get()){ 

            foreach($users as $user){


                if(isset($user->cod_usuario)){
                    session(['logged' => $user->cod_usuario, 'name' => $data['usuario']]);
                    return $this->indexDashboard();
                }else
                    return view('/search');

            }

        }else
            return view('/search');

    }
    
    public function delete(){
        session()->flush();
        return redirect('/');
    }
}
