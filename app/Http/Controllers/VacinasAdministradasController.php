<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacinasAdministradasStoreRequest;
use App\Http\Requests\VacinasAdministradasUpdateRequest;
use Illuminate\Support\Facades\DB;

class VacinasAdministradasController extends Controller
{
    public function index()
    {
        $vacinasAdministradas = DB::select("SELECT * FROM SISTEMAVACINA.VACINAS_ADMINISTRADAS");
        return view('index.vacinasAdministradas.index', compact('vacinasAdministradas'));
    }

    public function create()
    {
        return view('index.vacinasAdministradas.crud');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VacinasAdministradasStoreRequest $request)
    {
        $data = $request->validated();

        $status = DB::transaction(function () use ($data){
            return DB::insert('INSERT INTO SISTEMAVACINA.VACINAS_ADMINISTRADAS
                                        VALUES (?, ?, ?, ?, ?, ?)',
                [   $data['Cidadao_Numero_SUS'],
                    $data['Vacinas_Lote'],
                    $data['Colaborador_CNES_UBS'],
                    $data['Colaborador_Matricula'],
                    $data['Data_Aplicacao'],
                    $data['Tipo_Vacina'],
                ]
            );
        });

        return redirect()->route('index.vacinasAdministradas.index')->with('status', $status);
    }

    /**
     * Display the specified resource.
     */
    public function show($Cidadao_Numero_SUS, $Vacinas_Lote, $Data_Aplicacao)
    {
        return DB::transaction(function () use ($Cidadao_Numero_SUS, $Vacinas_Lote, $Data_Aplicacao) {
            return DB::select('SELECT * FROM SISTEMAVACINA.VACINAS_ADMINISTRADAS
                                        WHERE Cidadao_Numero_SUS = ? AND
                                              Vacinas_Lote = ? AND
                                              Data_Aplicacao = ?',
                [$Cidadao_Numero_SUS, $Vacinas_Lote, $Data_Aplicacao]);
        });
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Cidadao_Numero_SUS, $Vacinas_Lote, $Data_Aplicacao)
    {
        $vacinaAdministrada = DB::transaction(function () use ($Cidadao_Numero_SUS, $Vacinas_Lote, $Data_Aplicacao) {
            return DB::select('SELECT * FROM SISTEMAVACINA.VACINAS_ADMINISTRADAS
                                        WHERE Cidadao_Numero_SUS = ? AND
                                              Vacinas_Lote = ? AND
                                              Data_Aplicacao = ?', [$Cidadao_Numero_SUS, $Vacinas_Lote, $Data_Aplicacao]);
        });

        if (empty($vacinaAdministrada)){
            return redirect()->route('index.vacinasAdministradas.index')->with('status', 0);
        }

        $vacinaAdministrada = $vacinaAdministrada[0];

        return view('index.vacinasAdministradas.crud', compact('vacinaAdministrada'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VacinasAdministradasUpdateRequest $request, $Cidadao_Numero_SUS, $Vacinas_Lote, $Data_Aplicacao)
    {
        $data = $request->validated();

        $status = DB::transaction(function () use ($data, $Cidadao_Numero_SUS, $Vacinas_Lote, $Data_Aplicacao) {
            return DB::update('UPDATE SISTEMAVACINA.VACINAS_ADMINISTRADAS
                                        SET Cidadao_Numero_SUS = ?,
                                            Vacinas_Lote = ?,
                                            Colaborador_CNES_UBS = ?,
                                            Colaborador_Matricula = ?,
                                            Data_Aplicacao = ?,
                                            Tipo_Vacina = ?
                                        WHERE Cidadao_Numero_SUS = ? AND
                                              Vacinas_Lote = ? AND
                                              Data_Aplicacao = ?
            ', [$data['Cidadao_Numero_SUS'],
                $data['Vacinas_Lote'],
                $data['Colaborador_CNES_UBS'],
                $data['Colaborador_Matricula'],
                $data['Data_Aplicacao'],
                $data['Tipo_Vacina'],
                $Cidadao_Numero_SUS,
                $Vacinas_Lote,
                $Data_Aplicacao
            ]);
        });

        return redirect()->route('index.vacinasAdministradas.index')->with('status', $status);
    }
    public function destroy(string $id)
    {
        //
    }
}
