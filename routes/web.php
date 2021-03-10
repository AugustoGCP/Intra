<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\ProcedimentoController;
use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/', [WebController::class, 'index']);

Route::post('/login', [WebController::class ,'create'])->middleware('web');
Route::get('/logout', [WebController::class ,'delete']);

Route::post('/search/convenio/search', [ConvenioController::class, 'search']);

Route::get('/procedimento/{id_convenio}/{id_procedimento}', [ConvenioController::class, 'index']);

Route::middleware([EnsureTokenIsValid::class])->group(function () {
    
    Route::get('/dashboard', [WebController::class, 'indexDashboard']);

    Route::post('/dashboard/convenio/store', [ConvenioController::class, 'store']);
    Route::post('/dashboard/convenio/show', [ConvenioController::class, 'show']);
    Route::post('/dashboard/convenio/find', [ConvenioController::class, 'find']);
    Route::post('/dashboard/convenio/update', [ConvenioController::class, 'update']);

    Route::post('/dashboard/procedimento/store', [ProcedimentoController::class, 'store']);
    Route::post('/dashboard/procedimento/find', [ProcedimentoController::class, 'find']);
    Route::post('/dashboard/procedimento/edit', [ProcedimentoController::class, 'edit']);
    Route::post('/dashboard/procedimento/update', [ProcedimentoController::class, 'update']);

});




