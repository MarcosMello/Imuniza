<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColaboradorStoreRequest extends FormRequest
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
            'UBS_CNES_UBS' => 'required|string|size:7',
            'Matricula' => 'required|string|size:10',
            'CPF' => 'required|string|size:11',
            'Nome' => 'required|string|max:70',
            'Data_Admissao' => 'required|date',
            'Cargo' => 'required|string',
        ];
    }
}
