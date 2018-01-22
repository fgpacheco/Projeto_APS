<?php

namespace web\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServidorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:100',
            'cargo' => 'required|max:50',
            'matricula' => 'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O :attribute  não pode ficar vazio.',
            'cargo.required' => 'O :attribute não pode ficar vazio.',
            'matricula.required' => 'A :attribute não pode ficar vazia.',
        ];
    }
}
