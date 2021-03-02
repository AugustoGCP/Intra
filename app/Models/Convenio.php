<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;

    protected $table = 'convenio';
    protected $primaryKey = 'cod_convenio';
    protected $fillable = [
        'nome_convenio',
        'rua_convenio',
        'bairro_convenio',
        'cidade_convenio',
        'criado_por',
        'activated'
    ];
    public $timestamps = false;


}
