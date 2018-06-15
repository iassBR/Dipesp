<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
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
            'nome.required'=>'Informe o nome do Aluno',
            'nome.min'=>'O nome do Aluno deve conter ao menos 4 caracteres',
            'nome.max'=>'O nome do Aluno deve conter no máximo 40 caracteres',
            'matricula.required'=>'Informe a matrícula do Aluno',
            'matricula.min'=>'A matrícula do Aluno deve conter ao menos 10 caracteres ',
            'matricula.max'=>'A matrícula do Aluno deve conter no máximo 16 caracteres',
            'curso_id.required'=>'Informe o Curso do Aluno',
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
            'nome'=>'required|min:4|max:40',
            'matricula'=>'required|unique:alunos,matricula|min:10|max:16',
            'curso_id'=>'required',
        ];
    }
}
