<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrientadorRequest;
use App\Http\Requests\UpdateOrientadorRequest;
use App\Models\Orientador;
use Illuminate\Support\Facades\Gate;
use Validator;
use Session;
use View;
class OrientadorController extends Controller
{
    
    public function index()
    {
        if(Gate::denies('lista-orientadores')){
            abort(403,"Não autorizado!");
        }
        $orientadores = Orientador::all();
        return view('orientadores.index', compact('orientadores'));
    }

   
    public function create()
    {
        if(Gate::denies('criar-orientadores')){
            abort(403,"Não autorizado!");
        }
        return view('orientadores.create');
    }

    public function store(OrientadorRequest $request)
    {   
        if(Gate::denies('criar-orientadores')){
            abort(403,"Não autorizado!");
        }

        if($request->ajax()){
            $orientador = Orientador::create($request->All());                 
            return response()->json($orientador);
            
        }else{
            $orientador = Orientador::create($request->All());
            return redirect()->action('OrientadorController@index')->with('success','Orientador cadastrado com sucesso');
        }    
        
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        if(Gate::denies('editar-orientadores')){
            abort(403,"Não autorizado!");
        }

        $orientador = Orientador::find($id);
        return view('orientadores.edit',compact('orientador'));
    }

   
    public function update(UpdateOrientadorRequest $request, $id)
    {   
        if(Gate::denies('editar-orientadores')){
            abort(403,"Não autorizado!");
        }

        if($request->ajax()){
            $orientador = Orientador::find($request->id);
            $orientador->update($request->all());       
            return response()->json($orientador);
        }else{
            $orientador = Orientador::find($id);
            $orientador->update($request->all());
            return redirect()->action('OrientadorController@index')->with('success','Orientador editado com sucesso'); 
        }
       
    }

   
    public function destroy($id)
    {
        if(Gate::denies('deletar-orientadores')){
            abort(403,"Não autorizado!");
        }

        $orientador = Orientador::find($id);
        $orientador->delete();
        Session::flash('success', 'Orientador deletado com sucesso');
        return View::make('__flash');
        
    }
}
