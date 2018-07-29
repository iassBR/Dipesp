<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;
use App\Models\Curso;
use App\Models\Modalidade;
use Session;
use View;
use Illuminate\Support\Facades\Gate;
class CursoController extends Controller
{
   
    public function index(Request $request)
    {
        if(Gate::denies('lista-cursos')){
            abort(403,"Não autorizado!");
        }
        if($request->ajax()){
            $cursos = Curso::all();
            return response()->json($cursos);
        }else{
            $cursos = Curso::all();
            return view('cursos.index', compact('cursos'));
        }
        
    }

    public function create()
    {   
        if(Gate::denies('criar-cursos')){
            abort(403,"Não autorizado!");
        }
        $modalidades = Modalidade::all();
        return view('cursos.create', compact('modalidades'));
    }

  
    public function store(CursoRequest $request)
    {
        if(Gate::denies('criar-cursos')){
            abort(403,"Não autorizado!");
        }
        if($request->ajax()){
            $curso = Curso::create($request->All());                  
            return response()->json($curso);
        }else{
            $curso = Curso::create($request->All()); 
            return redirect()->action('CursoController@index')->with('success','Curso '.$curso->nome.' cadastrado com sucesso');
        }  
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        if(Gate::denies('editar-cursos')){
            abort(403,"Não autorizado!");
        }
        $curso =  Curso::find($id);
        $modalidades = Modalidade::all();
        return view('cursos.edit', compact('curso', 'modalidades'));
    }

   
    public function update(CursoRequest $request, $id)
    {
        if(Gate::denies('editar-cursos')){
            abort(403,"Não autorizado!");
        }
        if($request->ajax()){
            $curso = Curso::find($id);
            $curso->update($request->all());       
            return response()->json($aluno);
        }else{
            $curso = Curso::find($id);
            $curso->update($request->all());
            return redirect()->action('CursoController@index')->with('success','Curso '.$curso->nome.' editado com sucesso'); 
        }
    }

   
    public function destroy($id)
    {
        if(Gate::denies('deletar-cursos')){
            abort(403,"Não autorizado!");
        }
        $curso = Curso::find($id);
        $nome = $curso->nome;
        $curso->delete();
        Session::flash('success','Curso '.$nome.' deletado com sucesso');
        View::make('__flash');
    }
}
