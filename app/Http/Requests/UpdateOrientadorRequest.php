<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Orientador;
class UpdateOrientadorRequest extends FormRequest
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
        return[
            'nome.required'=>'Informe o nome do Orientador!',
            'nome.min'=>'O nome deve conter ao menos 4 caracteres',
            'nome.max'=>'O nome não pode ter mais de 50 caracteres',
            'matricula.required'=>'Informe a matrícula do Orientador',
            'matricula.max'=>'A matrícula  não pode ter mais de 30 caracteres',
            'matricula.min'=>'A matrícula deve conter ao menos 4 caracteres',
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
        $orientador = Orientador::findOrFail($this->get('orientador_id'));
        return [
            'nome'=>'required|min:4|max:50',
            'matricula'=>'required|unique:orientadores,matricula,'.$orientador->id.',id|min:4|max:30',
        ];
    }
}
