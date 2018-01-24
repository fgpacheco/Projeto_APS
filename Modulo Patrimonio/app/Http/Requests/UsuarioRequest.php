<?php

namespace web\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
                'apelido' => 'required|max:100',
                'email' => 'required|max:255',
                'senha' => 'required|max:255',
        ];
    }

     public function messages()
    {
      return [
                'apelido.required' => 'O :attribute  não pode ficar vazio.', 
                'email.required' => 'O :attribute  não pode ficar vazio.',
                'senha.required' => 'O :attribute  não pode ficar vazio.'

      ];
    }
}
