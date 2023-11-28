<?php

namespace App\Http\Controllers;

use App\Http\Requests\CidadaoStoreRequest;
use App\Http\Requests\CidadaoUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CidadaoController extends Controller
{
    public function index()
    {
        $cidadaos = DB::select("SELECT * FROM SISTEMAVACINA.CIDADAO");
        return view('index.cidadao.index', compact('cidadaos'));
    }

    public function create()
    {
        return view('index.cidadao.crud');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CidadaoStoreRequest $request)
    {
        $data = $request->validated();

        $status = DB::transaction(function () use ($data){
            return DB::insert('INSERT INTO SISTEMAVACINA.CIDADAO
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
                                        [   $data['Numero_SUS'],
                                            $data['CPF'],
                                            $data['Nome'],
                                            $data['Data_de_nascimento'],
                                            $data['Nome_da_mae'],
                                            $data['Sexo'],
                                            $data['Estado_civil'],
                                            $data['Escolaridade'],
                                            $data['Etnia'],
                                            (boolean)$data['Possui_plano'],
                                            $data['Logradouro'],
                                            $data['Numero'],
                                            $data['Cidade'],
                                            $data['Estado'],
                                            $data['Complemento']
                                        ]
            );
        });

        return redirect()->route('index.cidadao.index')->with('status', $status);
    }

    /**
     * Display the specified resource.
     */
    public function show($Numero_SUS)
    {
        return DB::transaction(function () use ($Numero_SUS) {
            return DB::select('SELECT * FROM SISTEMAVACINA.CIDADAO WHERE NUMERO_SUS = ?', [$Numero_SUS]);
        });
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Numero_SUS)
    {
        $cidadao = DB::transaction(function () use ($Numero_SUS) {
            return DB::select('SELECT * FROM SISTEMAVACINA.CIDADAO WHERE Numero_SUS = ?', [$Numero_SUS]);
        });

        if (empty($cidadao)){
            return redirect()->route('index.cidadao.index')->with('status', 0);
        }

        $cidadao = $cidadao[0];

        return view('index.cidadao.crud', compact('cidadao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CidadaoUpdateRequest $request, $Numero_SUS)
    {
        $data = $request->validated();

        $status = DB::transaction(function () use ($data, $Numero_SUS) {
            return DB::update('UPDATE SISTEMAVACINA.CIDADAO
                                        SET Numero_SUS = ?,
                                            CPF = ?,
                                            Nome = ?,
                                            Data_de_nascimento = ?,
                                            Nome_da_mae = ?,
                                            Sexo = ?,
                                            Estado_civil = ?,
                                            Escolaridade = ?,
                                            Etnia = ?,
                                            Possui_plano = ?,
                                            Logradouro = ?,
                                            Numero = ?,
                                            Cidade = ?,
                                            Estado = ?,
                                            Complemento = ?
                                        WHERE Numero_SUS = ?
            ', [$data['Numero_SUS'],
                $data['CPF'],
                $data['Nome'],
                $data['Data_de_nascimento'],
                $data['Nome_da_mae'],
                $data['Sexo'],
                $data['Estado_civil'],
                $data['Escolaridade'],
                $data['Etnia'],
                (boolean)$data['Possui_plano'],
                $data['Logradouro'],
                $data['Numero'],
                $data['Cidade'],
                $data['Estado'],
                $data['Complemento'],
                $Numero_SUS,
            ]);
        });

        return redirect()->route('index.cidadao.index')->with('status', $status);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
