<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UBSUpdateRequest extends FormRequest
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
            'CNES_UBS' => 'required|string|size:7',
            'Nome' => 'required|string|max:45',
            'Telefone' => 'required|string|max:11',
            'Logradouro' => 'required|string|max:45',
            'Numero' => 'required|integer',
            'Cidade' => 'required|integer',
            'Estado' => 'required|integer',
            'Complemento' => 'required|string|max:45'
        ];
    }
}
