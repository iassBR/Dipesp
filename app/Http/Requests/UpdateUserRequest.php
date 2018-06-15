<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
class UpdateUserRequest extends FormRequest
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

    public function Messages(){
        return [
            'name.required'=>'Informe o nome do Usuário',
            'name.min'=>'O Campo nome deve Conter no mínimo 4 dígitos',
            'name.max'=>'O Campo nome deve Conter no máximo 50 dígitos',
            'email.required' => 'Informe o email',
            'email.unique' => 'Esse email já foi cadastrado',
            'email.min'=>'O Campo Email deve Conter no mínimo 10 dígitos',
            'email.max'=>'O Campo Email deve Conter até 50 dígitos',
            
            'password.min'=>'O Campo senha deve conter no mínimo 6 dígitos',
            'password.max'=>'O Campo senha deve conter até 15 dígitos',
            'password.confirmed' => 'As senhas devem ser iguais'
        ];
    }

   
    public function rules()
    {
        $usuario = User::findOrFail($this->get('usuario_id'));
        return [
            'name'=> 'required|min:4|max:50',
            'email'=>'required|unique:users,email,'.$usuario->id.',id|min:10|max:50|',  
            'password' => 'nullable|min:6|confirmed' 
        ];
    }
}
