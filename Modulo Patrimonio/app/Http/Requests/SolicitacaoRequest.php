<?php

namespace web\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitacaoRequest extends FormRequest
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
              //'data'=>'required|max:10',
        ];
        
        
    }
    
    public function messages()
    {
        return [
            //'matricula.required' => 'O campo :attribute não pode ficar vazio.',
        ];
    }
    
    
}
