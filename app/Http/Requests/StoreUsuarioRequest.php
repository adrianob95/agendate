<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUsuarioRequest extends FormRequest
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
            'cpf' => ['nullable','unique:usuarios', 'numeric', 'digits:11','cpf' ],
            'rg' => ['nullable', 'unique:usuarios','numeric', 'digits:10', ],
            'titulo' => ['nullable', 'unique:usuarios','numeric', 'digits:12'],
            'endereco' => ['nullable', 'max:255', 'min:2'],
            'contato' => ['nullable', 'numeric','digits:11'],
            'email' => ['nullable', 'email'],
            'pai' => ['nullable', 'max:255', 'min:2'],
            'mae' => ['nullable', 'max:255', 'min:2'],
            'datanascimento'=> ['nullable', 'date', 'before:today'],
           
        ];
    }
}
