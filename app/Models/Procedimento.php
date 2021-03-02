<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    use HasFactory;

    protected $table = 'procedimento';
    protected $primaryKey = 'cod_procedimento';
    protected $fillable = [
        'nome_procedimento',
        'cabecalho_procedimento',
        'corpo_procedimento',
        'data_criacao_procedimento',
        'pertence',
        'gerado_por'
    ];
    public $timestamps = false;
}
