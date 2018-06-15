<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PapelRequest;
use App\Http\Controllers\Controller;
use App\Models\Papel;
use App\Models\Permissao;
use Illuminate\Support\Facades\Gate;
use Session;
use View;
class PapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      if(Gate::denies('lista-papeis')){
        abort(403,"Não autorizado!");
      }

      $papeis = Papel::all();
      
      return view('admin.papel.index',compact('papeis'));
    }

    public function permissao($id)
    {
      if(Gate::denies('editar-papeis')){
        abort(403,"Não autorizado!");
      }

      $papel = Papel::find($id);
      $permissoes = Permissao::all();
    
      return view('admin.papel.permissao',compact('papel','permissoes'));
    }

    public function permissaoStore($papel_id ,$permissao_id)
    {
        if(Gate::denies('criar-papeis')){
          abort(403,"Não autorizado!");
        }
        $papel = Papel::find($papel_id);
        $permissao = Permissao::find($permissao_id);
        $papel->adicionaPermissao($permissao);

        Session::flash('success','Permissão adicionada com sucesso!');
        return View::make('__flash');
    }

    public function permissaoDestroy($papel_id,$permissao_id)
    {
      if(Gate::denies('deletar-papeis')){
        abort(403,"Não autorizado!");
      }

      $papel = Papel::find($papel_id);
      $permissao = Permissao::find($permissao_id);
      $papel->removePermissao($permissao);
      Session::flash('success','Permissão excluida com sucesso!');
      return View::make('__flash');

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(Gate::denies('criar-papeis')){
        abort(403,"Não autorizado!");
      }

      

      return view('admin.papel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PapelRequest $request)
    {

      if(Gate::denies('criar-papeis')){
        abort(403,"Não autorizado!");
      }

   
        Papel::create($request->all());

        return redirect()->route('papeis.index')->with('success','Papél criado com sucesso!');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if(Gate::denies('editar-papeis')){
        abort(403,"Não autorizado!");
      }
      if(Papel::find($id)->nome == "Admin"){
          return redirect()->route('papeis.index')->with('error','O Papel de Administrador não pode ser editado!');
      }

      $papel = Papel::find($id);

     

      return view('admin.papel.edit',compact('papel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if(Gate::denies('editar-papeis')){
        abort(403,"Não autorizado!");
      }

      if(Papel::find($id)->nome == "Admin"){
          return redirect()->route('papeis.index');
      }
      if($request['nome'] && $request['nome'] != "Admin"){
        Papel::find($id)->update($request->all());
      }

      return redirect()->route('papeis.index')->with('success','Papel editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(Gate::denies('deletar-papeis')){
        abort(403,"Não autorizado!");
      }

      if(Papel::find($id)->nome == "Admin"){
        Session::flash('error','O Papel de Administrador não pode ser deletado!');
        return View::make('__flash');
      }
      Papel::find($id)->delete();
      Session::flash('success', 'Papel deletado com sucesso!');
      return View::make('__flash');
    }
}
