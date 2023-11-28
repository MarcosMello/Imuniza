<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacinaStoreRequest;
use App\Http\Requests\VacinaUpdateRequest;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class VacinasController extends Controller
{
    public function index()
    {
        $vacinas = DB::select("SELECT * FROM SISTEMAVACINA.VACINAS");
        return view('index.vacinas.index', compact('vacinas'));
    }

    public function create()
    {
        return view('index.vacinas.crud');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VacinaStoreRequest $request)
    {
        $data = $request->validated();

        $status = DB::transaction(function () use ($data){
            return DB::insert('INSERT INTO SISTEMAVACINA.VACINAS
                                        VALUES (?, ?, ?, ?, ?)',
                [   $data['Lote'],
                    $data['Fabricante'],
                    $data['Nome_Vacina'],
                    $data['Validade'],
                    $data['Quantidade_Doses']
                ]
            );
        });

        return redirect()->route('index.vacinas.index')->with('status', $status);
    }

    /**
     * Display the specified resource.
     */
    public function show($Lote)
    {
        return DB::transaction(function () use ($Lote) {
            return DB::select('SELECT * FROM SISTEMAVACINA.VACINAS WHERE Lote = ?', [$Lote]);
        });
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Lote)
    {
        $vacina = DB::transaction(function () use ($Lote) {
            return DB::select('SELECT * FROM SISTEMAVACINA.VACINAS WHERE Lote = ?', [$Lote]);
        });

        if (empty($vacina)){
            return redirect()->route('index.vacina.index')->with('status', 0);
        }

        $vacina = $vacina[0];

        return view('index.vacinas.crud', compact('vacina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VacinaUpdateRequest $request, $Lote)
    {
        $data = $request->validated();

        $status = DB::transaction(function () use ($data, $Lote) {
            return DB::update('UPDATE SISTEMAVACINA.VACINAS
                                        SET Lote = ?,
                                            Fabricante = ?,
                                            Nome_Vacina = ?,
                                            Validade = ?,
                                            Quantidade_Doses = ?
                                        WHERE Lote = ?
            ', [$data['Lote'],
                $data['Fabricante'],
                $data['Nome_Vacina'],
                $data['Validade'],
                $data['Quantidade_Doses'],
                $Lote,
            ]);
        });

        return redirect()->route('index.vacinas.index')->with('status', $status);
    }

    public function destroy(string $id)
    {
        //
    }
}
