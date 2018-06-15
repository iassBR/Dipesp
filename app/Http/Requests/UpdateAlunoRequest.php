<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Aluno;
class UpdateAlunoRequest extends FormRequest
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
            'matricula.min'=>'A matrícula do Aluno deve conter ao menos 8 caracteres ',
            'matricula.max'=>'A matrícula do Aluno deve conter no máximo 30 caracteres',
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
        $aluno = Aluno::find($this->get('aluno_id')); 
         
        return [
            'nome'=>'required|min:4|max:40',
            'matricula'=>'required|unique:alunos,matricula,'.$aluno->id.',id|min:8|max:30',
            'curso_id'=>'required',
        ];
    }
}
