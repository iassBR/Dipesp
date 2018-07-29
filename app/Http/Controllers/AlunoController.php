<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use App\Models\Aluno;
use App\Models\Curso;
use View;
use Session;
use Illuminate\Support\Facades\Gate;
class AlunoController extends Controller
{
    
    public function index()
    {
        if(Gate::denies('lista-alunos')){
            abort(403,"Não autorizado!");
        }
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

   
    public function create()
    {   
        if(Gate::denies('criar-alunos')){
            abort(403,"Não autorizado!");
        }
        $cursos = Curso::all();
        return view('alunos.create',compact('cursos'));
    }

  
    public function store(AlunoRequest $request)
    {
        if(Gate::denies('criar-alunos')){
            abort(403,"Não autorizado!");
        }
        if($request->ajax()){
            $aluno = Aluno::create($request->All());                  
            return response()->json($aluno);
        }else{
            $aluno = Aluno::create($request->All()); 
            return redirect()->action('AlunoController@index')->with('success','Aluno '.$aluno->nome.' cadastrado com sucesso');
        }  
                      
    }

   
    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
        if(Gate::denies('editar-alunos')){
            abort(403,"Não autorizado!");
        }

        $cursos = Curso::all();
        $aluno = Aluno::find($id);
        return view('alunos.edit',compact('aluno','cursos'));
    }

   
    public function update(UpdateAlunoRequest $request, $id)
    {
        if(Gate::denies('editar-alunos')){
            abort(403,"Não autorizado!");
        }
        $aluno = Aluno::find($id);
        
        if($request->ajax()){
            
            $aluno->update($request->all());       
            return response()->json($aluno);
        }else{
            
            $aluno->update($request->all());
            return redirect()->action('AlunoController@index')->with('success','Aluno '.$aluno->nome.'  editado com sucesso'); 
        }
    }

   
    public function destroy($id)
    {
        if(Gate::denies('deletar-alunos')){
            abort(403,"Não autorizado!");
        }

        try{
            $aluno = Aluno::find($id);
            $nome = $aluno->nome;
            $aluno->delete();
            Session::flash('success', 'Aluno'.$nome.'deletado com sucesso');
            return View::make('__flash');
        }catch( \Exception $e){
            Session::flash('error', 'Erro ao deletar o aluno '.$nome.'! Verifique se o aluno não está cadastrado em um projeto');
            return View::make('__flash');
        }
        
    }
}
