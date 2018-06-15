<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrientadorRequest extends FormRequest
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
        return[
            'nome.required'=>'Informe o nome do Orientador!',
            'nome.min'=>'O nome do Orientador deve conter ao menos 4 caracteres',
            'nome.max'=>'O nome do Orientador não pode ter mais de 50 caracteres',
            'matricula.required'=>'Informe a matrícula do Orientador',
            'matricula.max'=>'A matrícula do Orientador  não pode ter mais de 12 caracteres',
            'matricula.min'=>'A matrícula do Orientador deve conter ao menos 6 caracteres',
            'matricula.unique'=>'Essa matrícula já foi cadastrada'
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
            'nome'=>'required|min:4|max:50',
            'matricula'=>'required|unique:orientadores|min:6|max:12',
        ];
    }
}
