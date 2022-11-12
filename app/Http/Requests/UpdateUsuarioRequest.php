<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'max:255', 'min:2'],
            'cpf' => ['nullable', Rule::unique('usuarios')->ignore($this->usuario), 'numeric', 'digits:11', 'cpf'],
            'rg' => ['nullable', Rule::unique('usuarios')->ignore($this->usuario), 'numeric', 'digits:10'],
            'titulo' => ['nullable', Rule::unique('usuarios')->ignore($this->usuario), 'numeric', 'digits:12'],
            'sus' => ['nullable', Rule::unique('usuarios')->ignore($this->usuario), 'numeric', 'digits:15', 'cns'],
            'endereco' => ['nullable', 'max:255', 'min:2'],
            'contato' => ['nullable', 'numeric', 'digits:11' ],
            'email' => ['nullable', 'email'],
            'pai' => ['nullable', 'max:255', 'min:2'],
            'mae' => ['nullable', 'max:255', 'min:2'],
            'datanascimento' => ['nullable', 'date', 'before:today'],

        ];
    }
}
