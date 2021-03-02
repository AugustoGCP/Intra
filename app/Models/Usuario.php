<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;    

    protected $table = 'usuario';
    protected $primaryKey = 'cod_usuario';    
    protected $fillable = [
        'nome_usuario',
        'nome_completo_usuario',
        'senha_usuario',
        'email_usuario'
    ];
    public $timestamps = false;
}
