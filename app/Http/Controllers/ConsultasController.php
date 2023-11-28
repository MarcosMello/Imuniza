<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ConsultasController extends Controller
{
    public function consultaDataNascimentoEVacinacao(){
        $entries = DB::transaction(function () {
            return DB::select("SELECT SISTEMAVACINA.CIDADAO.Numero_SUS,
                                            SISTEMAVACINA.CIDADAO.Nome,
                                            SISTEMAVACINA.VACINAS_ADMINISTRADAS.Data_Aplicacao
                                     FROM SISTEMAVACINA.VACINAS_ADMINISTRADAS
                                     INNER JOIN SISTEMAVACINA.CIDADAO ON
                                                SISTEMAVACINA.VACINAS_ADMINISTRADAS.Cidadao_Numero_SUS = SISTEMAVACINA.CIDADAO.Numero_SUS
                                     ORDER BY SISTEMAVACINA.CIDADAO.Nome, SISTEMAVACINA.VACINAS_ADMINISTRADAS.Data_Aplicacao;");
        });

        return view('index.buscas.consultaDataNascimentoEVacinacao', compact('entries'));
    }

    public function consultaOrdemAlfabeticaEDataVacinacao(){
        $entries = DB::transaction(function () {
            return DB::select("SELECT SISTEMAVACINA.CIDADAO.Numero_SUS,
                                               SISTEMAVACINA.CIDADAO.Nome,
                                               SISTEMAVACINA.CIDADAO.Data_de_nascimento,
                                               SISTEMAVACINA.VACINAS_ADMINISTRADAS.Data_Aplicacao
                                        FROM SISTEMAVACINA.VACINAS_ADMINISTRADAS
                                        INNER JOIN SISTEMAVACINA.CIDADAO ON
                                            SISTEMAVACINA.VACINAS_ADMINISTRADAS.Cidadao_Numero_SUS = SISTEMAVACINA.CIDADAO.Numero_SUS
                                        ORDER BY SISTEMAVACINA.CIDADAO.Data_de_nascimento, SISTEMAVACINA.VACINAS_ADMINISTRADAS.Data_Aplicacao;");
        });

        return view('index.buscas.consultaOrdemAlfabeticaEDataVacinacao', compact('entries'));
    }
}
