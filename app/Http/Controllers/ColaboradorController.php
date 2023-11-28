<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColaboradorStoreRequest;
use App\Http\Requests\ColaboradorUpdateRequest;
use Illuminate\Support\Facades\DB;

class ColaboradorController extends Controller
{
    public function index()
    {
        $colaboradores = DB::select("SELECT * FROM SISTEMAVACINA.COLABORADOR");
        return view('index.colaborador.index', compact('colaboradores'));
    }

    public function create()
    {
        return view('index.colaborador.crud');
    }

    public function store(ColaboradorStoreRequest $request){
        $data = $request->validated();

        $status = DB::transaction(function () use ($data){
            return DB::insert('INSERT INTO SISTEMAVACINA.COLABORADOR VALUES (?, ?, ?, ?, ?, ?)', [$data['UBS_CNES_UBS'], $data['Matricula'], $data['CPF'], $data['Nome'], $data['Data_Admissao'], $data['Cargo']]);
        });

        return redirect()->route('index.colaborador.index')->with('status', $status);
    }

    public function show($UBS_CNES_UBS, $Matricula)
    {
        return DB::transaction(function () use ($UBS_CNES_UBS, $Matricula) {
            return DB::select('SELECT * FROM SISTEMAVACINA.COLABORADOR WHERE UBS_CNES_UBS = ? AND Matricula = ?', [$UBS_CNES_UBS, $Matricula]);
        });
    }

    public function edit($UBS_CNES_UBS, $Matricula)
    {
        $colaborador = DB::transaction(function () use ($UBS_CNES_UBS, $Matricula) {
            return DB::select('SELECT * FROM SISTEMAVACINA.COLABORADOR WHERE UBS_CNES_UBS = ? AND Matricula = ?', [$UBS_CNES_UBS, $Matricula]);
        });

        if (empty($colaborador)){
            return redirect()->route('index.colaboradores.index')->with('status', 0);
        }

        $colaborador = $colaborador[0];

        return view('index.colaborador.crud', compact('colaborador'));
    }

    public function update(ColaboradorUpdateRequest $request, $UBS_CNES_UBS, $Matricula)
    {
        $data = $request->validated();

        $status = DB::transaction(function () use ($data, $UBS_CNES_UBS, $Matricula) {
            return DB::update('UPDATE SISTEMAVACINA.COLABORADOR
                                        SET CPF = ?, Nome = ?, Data_Admissao = ?, Cargo = ?
                                        WHERE UBS_CNES_UBS = ? AND Matricula = ?
            ', [$data['CPF'],
                $data['Nome'],
                $data['Data_Admissao'],
                $data['Cargo'],
                $UBS_CNES_UBS,
                $Matricula,
            ]);
        });

        return redirect()->route('index.colaboradores.index')->with('status', $status);
    }

    public function destroy(Colaborador $colaborador)
    {
        //
    }
}
