<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Projeto;

class ProjetoRequest extends FormRequest
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
            'titulo' => 'required|string|max:255', // set unique only in store controller
            'ano_publicacao' => 'required',
            'project_file' => 'required|file|mimes:pdf', // set required only in store controller
            'aluno' => 'required|numeric',
            'orientador' => 'required|numeric',
            'area_pesquisa' => 'required|numeric',
            'project_file' => 'file|mimes:pdf',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Campo obrigatório.',
            'mimes' => 'Extensões de arquivos válidas: pdf.',
            'file' => 'Campo precisa ser um arquivo.',
            'titulo.unique' => 'O título já esta em uso por outro projeto',
            'aluno.numeric' => 'Campo inválido',
            'orientador.numeric' => 'Campo inválido',
            'area_pesquisa.numeric' => 'Campo inválido',

        ];
    }
}
