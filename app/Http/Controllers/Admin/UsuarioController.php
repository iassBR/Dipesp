<?php

namespace App\Http\Controllers\Admin;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Papel;
use Illuminate\Support\Facades\Gate;
use View;
use Session;
class UsuarioController extends Controller
{

    protected function validarUsuario($request){
        $validator = Validator::make($request->all(),
            ['name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
       
        ]);
        return $validator;
    }

    public function index()
    {
        if(Gate::denies('lista-usuarios')){
            abort(403,"Não autorizado!");
          }
        $usuarios = User::all();
        $papeis = Papel::all();            
        return view('admin.usuarios.index',compact('usuarios','papeis'));
    }

   
    public function create()
    {
        if(Gate::denies('criar-usuarios')){
            abort(403,"Não autorizado!");
        }

        $papeis= Papel::all();
        return view('admin.usuarios.create', compact('papeis'));

    }

   
    public function store(UserRequest $request)
    {
        if(Gate::denies('criar-usuarios')){
            abort(403,"Não autorizado!");
        }
        

        $data = $request->all(); 
        
        $user = User::create(
        [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
                    
        ]);

        return redirect()->route('usuarios.index')->with('success','Usuário cadastrado com sucesso!');
       
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        if(Gate::denies('editar-usuarios')){
            abort(403,"Não autorizado!");
          }
        $usuario = User::find($id);
        $userLoged = Auth::user();
        
        //admin pode editar seu nome desde que seja ele mesmo logado
        if(($usuario->name  == $userLoged->name) && ($userLoged->eAdmin())){
            return view('admin.usuarios.edit',compact('usuario'));
        }else if($userLoged->eAdmin()){
            //admin editando user qualquer
            return view('admin.usuarios.edit',compact('usuario'));
        }else{
            //outra pessoa tentando editar
            return redirect()->route('usuarios.index');
        }
          
    }

    
    public function update(UpdateUserRequest $request, $id)
    {
        if(Gate::denies('editar-usuarios')){
            abort(403,"Não autorizado!");
        }

        $data = $request->all();
        $user = User::find($id);

        if(isset($data['password']) && $data['password'] != ''){
            //se tiver digitado alguma senha
            $data['password'] = bcrypt($data['password']);
        }else{
            //caso não tenha alterado a senha
            unset($data['password']);
        }
          
        $user->update($data);

        return redirect()->route('usuarios.index')->with('success','Usuário editado com sucesso!');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if(Gate::denies('deletar-usuarios')){
            abort(403,"Não autorizado!");            
        }
          $user = User::find($id);

          if($user->eAdmin()){
              Session::flash('error','Você não pode deletar o administrador!');
              return View::make('__flash');
          }else{
            $user->delete();

            Session::flash('success', 'Usuário deletado com sucesso!');
            return View::make('__flash');
          }
         
              
    }
    public function remover($id){
        if(Gate::denies('usuario-delete')){
            abort(403,"Não autorizado!");   
        }

        $user = User::find($id);

        if($user->name  == "Admin"){
            return redirect()->route('usuarios.index');
        }

        $user = User::find($id);
        return view('admin.usuarios.remove',compact('user'));
      
    }

    public function papel($id)
    {
        if(Gate::denies('editar-papeis')){
        abort(403,"Não autorizado!");
        }

        $usuario = User::find($id);
        $papel = Papel::all();
        
        return view('admin.usuarios.papel',compact('usuario','papel'));
    }

   public function papelStore($user_id, $papel_id)
   {
       if(Gate::denies('editar-papeis')){
         abort(403,"Não autorizado!");
       }
        
       $usuario = User::find($user_id);
       //$dados = $request->all();
       $papel = Papel::find($papel_id);
       if($papel->nome == "Admin"){
        Session::flash('error','Você não pode ceder o papel ADMIN para outros usuários');
        return View::make('__flash');
       }
       $usuario->adicionaPapel($papel);
       Session::flash('success','Papel adicionado com sucesso!');
       return View::make('__flash');
   }

   public function papelDestroy($user_id, $papel_id){
        if(Gate::denies('deletar-papeis')){
            abort(403,"Não autorizado!");
        }

        if(Papel::find($papel_id)->nome == "Admin"){
            Session::flash('error','Você não pode deletar o papel ADMIN ');
            return View::make('__flash');
        }
        $usuario = User::find($user_id);
        $papel = Papel::find($papel_id);
        $usuario->removePapel($papel);
        Session::flash('success','Papel deletado com sucesso!');
        return View::make('__flash');

   }

}
