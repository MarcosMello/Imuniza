<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacinaStoreRequest extends FormRequest
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
            'Lote' => 'required|string|size:6',
            'Fabricante' => 'required|string|max:45',
            'Nome_Vacina' => 'required|string|max:70',
            'Validade' => 'required|date',
            'Quantidade_Doses' => 'required|integer'
        ];
    }
}
