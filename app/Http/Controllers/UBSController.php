<?php

namespace App\Http\Controllers;

use App\Http\Requests\UBSStoreRequest;
use App\Http\Requests\UBSUpdateRequest;
use Illuminate\Support\Facades\DB;

class UBSController extends Controller
{
    public function index()
    {
        $ubs = DB::select("SELECT * FROM SISTEMAVACINA.UBS");
        return view('index.ubs.index', compact('ubs'));
    }

    public function create()
    {
        return view('index.ubs.crud');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UBSStoreRequest $request)
    {
        $data = $request->validated();

        $status = DB::transaction(function () use ($data){
            return DB::insert('INSERT INTO SISTEMAVACINA.UBS
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)',
                [   $data['CNES_UBS'],
                    $data['Nome'],
                    $data['Telefone'],
                    $data['Logradouro'],
                    $data['Numero'],
                    $data['Cidade'],
                    $data['Estado'],
                    $data['Complemento']
                ]
            );
        });

        return redirect()->route('index.ubs.index')->with('status', $status);
    }

    /**
     * Display the specified resource.
     */
    public function show($CNES_UBS)
    {
        return DB::transaction(function () use ($CNES_UBS) {
            return DB::select('SELECT * FROM SISTEMAVACINA.UBS WHERE CNES_UBS = ?', [$CNES_UBS]);
        });
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($CNES_UBS)
    {
        $ubs = DB::transaction(function () use ($CNES_UBS) {
            return DB::select('SELECT * FROM SISTEMAVACINA.UBS WHERE CNES_UBS = ?', [$CNES_UBS]);
        });

        if (empty($ubs)){
            return redirect()->route('index.ubs.index')->with('status', 0);
        }

        $ubs = $ubs[0];

        return view('index.ubs.crud', compact('ubs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UBSUpdateRequest $request, $CNES_UBS)
    {
        $data = $request->validated();

        $status = DB::transaction(function () use ($data, $CNES_UBS) {
            return DB::update('UPDATE SISTEMAVACINA.UBS
                                        SET CNES_UBS = ?,
                                            Nome = ?,
                                            Telefone = ?,
                                            Logradouro = ?,
                                            Numero = ?,
                                            Cidade = ?,
                                            Estado = ?,
                                            Complemento = ?
                                        WHERE CNES_UBS = ?
            ', [$data['CNES_UBS'],
                $data['Nome'],
                $data['Telefone'],
                $data['Logradouro'],
                $data['Numero'],
                $data['Cidade'],
                $data['Estado'],
                $data['Complemento'],
                $CNES_UBS,
            ]);
        });

        return redirect()->route('index.ubs.index')->with('status', $status);
    }
    public function destroy(string $id)
    {
        //
    }
}
