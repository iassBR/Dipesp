<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
    public function messages()
    {
        return [
            'nome.required'=>'Informe o nome do Curso',
            'nome.min'=>'O nome do Curso deve conter ao menos 4 caracteres',
            'nome.max'=>'O nome do Curso deve conter no máximo 60 caracteres',
            'modalidade_id.required'=>'Informe a Modalidade do Curso',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'=>'required|min:4|max:60',
            'modalidade_id'=>'required',
        ];
    }
}
