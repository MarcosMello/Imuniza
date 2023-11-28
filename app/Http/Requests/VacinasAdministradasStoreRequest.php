<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacinasAdministradasStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Cidadao_Numero_SUS' => 'required|numeric|digits:15',
            'Vacinas_Lote' => 'required|string|size:6',
            'Colaborador_CNES_UBS' => 'required|string|size:7',
            'Colaborador_Matricula' => 'required|string|size:10',
            'Data_Aplicacao' => 'required|date',
            'Tipo_Vacina' => 'required|string|max:45'
        ];
    }
}
