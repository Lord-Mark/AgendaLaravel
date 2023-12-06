<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */

    public function attributes(): array
    {

        return [
            'name' => 'nome',
            'phone' => 'telefone',
            'zip_code' => 'cep',
            'street' => 'rua',
            'st_number' => 'número',
            'complement' => 'complemento',
            'neighborhood' => 'bairro',
            'city' => 'cidade',
            'state' => 'estado',
            'note' => 'nota',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Se o id do contato está sendo passado, quer dizer que o contato já existe
        // e que o nome e o email já estão armazenados, assim eles se tornam opcionais neste request
        if ($this->route('contact')) {
            return [
                'name' => 'sometimes|min:3|max:25',
                'phone' => 'sometimes|numeric|digits:11',
                'email' => 'nullable|email:rfc,dns',
                'zip_code' => 'nullable|numeric|digits:8'
            ];
        }
        return [
            'name' => 'required|min:3|max:25',
            'phone' => 'required|numeric|digits:11',
            'email' => 'nullable|email:rfc,dns',
            'zip_code' => 'nullable|numeric|digits:8'
        ];
    }

    public function messages(): array
    {
        return [
            'min' => "O campo :attribute deve ter no mínimo :min caracteres",
            'max' => "O campo :attribute não pode ter mais de :max caracteres",
            'required' => "O campo :attribute é obrigatório",
            'email' => "Você deve fornecer um email válido",
            'digits' => "O campo :attribute deve ter exatamente :digits dígitos numéricos",
            'numeric' => "O campo :attribute não deve ter nenhum caractere não numérico"
        ];
    }
}
