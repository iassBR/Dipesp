<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PapelRequest extends FormRequest
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

    public function messages(){
        return [
            'nome.required' => 'Informe o nome do Papel',
            'nome.min' => 'O nome do papel deve conter ao menos 3 caractéres',
            'nome.max' => 'O nome do papel deve conter no máximo 20 caractéres',
            'descricao.min' => 'O nome da descrição deve conter ao menos 3 caractéres',
            'descricao.max' => 'O nome da descrição deve conter no máximo 30 caractéres',
        ];
    }

    public function rules()
    {
        return [
            'nome' => 'required|min:3|max:20',
            'descricao' => 'nullable|min:3|max:30'
        ];
    }
}
