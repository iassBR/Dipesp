<?php

namespace App\Http\Controllers;
use App\Models\Projeto;
use App\Models\Aluno;
use App\Models\Orientador;
use App\Models\AreaPesquisa;
use App\Models\Arquivo;
use App\Http\Requests\ProjetoRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Validator;
use Session;
use View;

use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    public function index()
    {
        if(Gate::denies('lista-projetos')){
            abort(403,"Não autorizado!");
        }
        $projetos = Projeto::with(['orientador', 'arquivo', 'aluno', 'area_pesquisa'])->get();
        return view('projetos.index', compact('projetos'));
    }

    public function create()
    {
        if(Gate::denies('criar-projetos')){
            abort(403,"Não autorizado!");
        }
        $orientadores = Orientador::all();        
        $alunos = Aluno::all();
        $areaPesquisas = AreaPesquisa::all();

        $data = [
            'orientadores',
            'alunos',
            'areaPesquisas',

        ];

        return view('projetos.create', compact($data));
    }

    public function store(ProjetoRequest $request)
    {
        if(Gate::denies('criar-projetos')){
            abort(403,"Não autorizado!");
        }
        $messages = [
            'required' => 'Campo obrigatório.',
            'titulo.unique' => 'O título já esta em uso por outro projeto',
        ];

        $validator = Validator::make($request->all(), [
            'project_file' => 'required',
            'titulo' => 'unique:projetos',
        ], $messages);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        try {
            \DB::beginTransaction();
                $data = $request->All();
                $data['area_pesquisa_id'] = $data['area_pesquisa'];
                $data['orientador_id'] = $data['orientador'];
                $data['aluno_id'] = $data['aluno'];

                $arquivo = $this->saveOrUpdateArchive($request);

                $projeto = new Projeto($data);
                $projeto->arquivo()->associate($arquivo);
                $projeto->save();
            \DB::commit();

            return redirect()->action('ProjetoController@index')->with('success','Projeto salvo com sucesso');
        } catch (Exception $e) {

                $arquivo->destroyFileFromServe();
                $arquivo->delete();
            \DB::rollback();
            
            return redirect()->route('projetos.index')
                            ->withErrors('error.delete', 'Erro ao deletar arquivo');
        }
    }
    
    public function show(Projeto $projeto)
    {
        return 'not yet implemented';
    }

    public function edit(Projeto $projeto)
    {
        if(Gate::denies('editar-projetos')){
            abort(403,"Não autorizado!");
        }
        $orientadores = Orientador::all();        
        $alunos = Aluno::all();
        $areaPesquisas = AreaPesquisa::all();

        $previous = url()->previous();
        //dd($previous);

        $data = [
            'orientadores',
            'alunos',
            'areaPesquisas',
            'projeto',
            'previous'
        ];


        return view('projetos.edit', compact($data));
    }

    public function update(Projeto $projeto, ProjetoRequest $request)
    {
        if(Gate::denies('lista-projetos')){
            abort(403,"Não autorizado!");
        }
        $data = $request->All();
        $data['area_pesquisa_id'] = $data['area_pesquisa'];
        $data['orientador_id'] = $data['orientador'];
        $data['aluno_id'] = $data['aluno'];

        
      
        if($this->saveOrUpdateArchive($request, $projeto->arquivo()->first()) !== null) {
            $projeto->update($data);
            $url = url('home');
            if($request->input('previous') == $url){
                return redirect()->action('HomeController@index')->with('success','Projeto editado com sucesso');
            }else{
                return redirect()->action('ProjetoController@index')->with('success','Projeto editado com sucesso');
            }
            
        } else {
            return redirect()->back()->withInput();
        }

    }
    
    public function destroy(Projeto $projeto, Request $request)
    {
        if(Gate::denies('deletar-projetos')){
            abort(403,"Não autorizado!");
        }
        try {
            $projeto->delete();

            $url = url('home');
            if($request->input('previous') == $url){
                return redirect()->action('HomeController@index')->with('success','Projeto deletado com sucesso');
            }else{
                return redirect()->action('ProjetoController@index')->with('success','Projeto deletado com sucesso');
            }
        } catch (\Exception $e) {
            return redirect()->action('ProjetoController@index')->with(['error',  'message' => $e->getMessage()]);
        }
    }

    public function saveOrUpdateArchive($request, Arquivo $arquivo = null)
    {
        if(!$request->hasFile('project_file')) { return $arquivo; } // não atualiza arquivo

        $uploaded_file = $request->file('project_file')->isValid()? $request->file('project_file'): null;
        
        if($uploaded_file === null) { return; }
        
        if($arquivo === null) { 
            $arquivo = new Arquivo(); 
            $arquivo->descricao = $request->titulo;

            if ($arquivo->saveFileOnServer($uploaded_file, $request->titulo)) {
                $arquivo->save();
                return $arquivo;
            }
        } else {
            $arquivo->descricao = $request->titulo;
            if ($arquivo->updateFileOnServer($uploaded_file)) {
                $arquivo->update();
                return $arquivo;
            }
        }
        return null;
    }

    public function displayFile(Arquivo $arquivo)
    {        
        $contents =  Storage::get($arquivo->path);

        return response()->make($contents, 200, [
            'Content-Type' => $arquivo->mime,
            'Content-Disposition' => 'inline;',
        ]);
    }

    public function remove(Projeto $projeto)
    {
        $previous = url()->previous();
        $data = [
            'projeto',
            'previous'
        ];

        return view('projetos.remove', compact($data));
    }
    
}