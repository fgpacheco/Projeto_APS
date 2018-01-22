<?php

namespace web\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatrimonioRequest extends FormRequest
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
            'descricao' => 'required|max:100',
            'valor' => 'required|max:20',
            'numeroempenho' => 'required|max:20',
            'numeronotafiscal' => 'required|max:100',
            'numeropatrimonio' => 'required|max:50',
            'dataaquisicao' => 'required|max:10'
        ];
    }
    
    public function messages()
    {
        return [
            'descricao.required' => 'O :attribute  não pode ficar vazio.',
            'valor.required' => 'O :attribute não pode ficar vazio.',
            'numeroempenho.required' => 'A :attribute não pode ficar vazio.',
            'numeronotafiscal.required' => 'A :attribute não pode ficar vazio.',
            'numeropatrimonio.required' => 'A :attribute não pode ficar vazio.',
            'dataaquisicao.required' => 'A :attribute não pode ficar vazio.',
        ];
    }
}
