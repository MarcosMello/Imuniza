<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->name('index.')->group(function (){
    Route::resource('colaboradores', \App\Http\Controllers\ColaboradorController::class);
    Route::get('colaboradores/{UBS_CNES_UBS}/{Matricula}/edit', [\App\Http\Controllers\ColaboradorController::class, 'edit'])->name('colaboradoresEdit');
    Route::put('colaboradores/{UBS_CNES_UBS}/{Matricula}/update', [\App\Http\Controllers\ColaboradorController::class, 'update'])->name('colaboradoresUpdate');

    Route::resource('vacinas', \App\Http\Controllers\VacinasController::class);
    Route::resource('ubs', \App\Http\Controllers\UBSController::class);
    Route::resource('cidadao', \App\Http\Controllers\CidadaoController::class);

    Route::resource('vacinasAdministradas', \App\Http\Controllers\VacinasAdministradasController::class);
    Route::get('vacinasAdministradas/{Cidadao_Numero_SUS}/{Vacina_Lote}/{Data_Aplicacao}/edit', [\App\Http\Controllers\VacinasAdministradasController::class, 'edit'])->name('vacinasAdministradasEdit');
    Route::put('vacinasAdministradas/{Cidadao_Numero_SUS}/{Vacina_Lote}/{Data_Aplicacao}/update', [\App\Http\Controllers\VacinasAdministradasController::class, 'update'])->name('vacinasAdministradasUpdate');

    Route::get('consultaDataNascimentoEVacinacao', [\App\Http\Controllers\ConsultasController::class, 'consultaDataNascimentoEVacinacao'])->name('consultaDataNascimentoEVacinacao');
    Route::get('consultaOrdemAlfabeticaEDataVacinacao', [\App\Http\Controllers\ConsultasController::class, 'consultaOrdemAlfabeticaEDataVacinacao'])->name('consultaOrdemAlfabeticaEDataVacinacao');
});
