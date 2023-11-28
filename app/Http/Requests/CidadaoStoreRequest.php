<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CidadaoStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Numero_SUS' => 'required|numeric|digits:15',
            'CPF' => 'required|string|size:11',
            'Nome' => 'required|string|max:70',
            'Data_de_nascimento' => 'required|date',
            'Nome_da_mae' => 'required|string|max:70',
            'Sexo' => 'required|string',
            'Estado_civil' => 'required|string',
            'Escolaridade' => 'required|string',
            'Etnia' => 'required|string',
            'Possui_plano' => 'required|boolean',
            'Logradouro' => 'required|string|max:45',
            'Numero' => 'required|integer',
            'Cidade' => 'required|integer',
            'Estado' => 'required|integer',
            'Complemento' => 'required|string|max:45'
        ];
    }
}
