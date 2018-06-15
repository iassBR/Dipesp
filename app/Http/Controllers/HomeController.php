<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BuscaProjeto\BuscaProjeto;
use App\Models\Projeto;
use App\Models\Aluno;
use App\Models\Orientador;
use App\Models\AreaPesquisa;
use App\Models\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   


    private static function carregaFiltro(){
        $orientadores = Orientador::all();        
        $alunos = Aluno::all();
        $areaPesquisas = AreaPesquisa::all();
        $cursos = Curso::all();

        $data = [
            'orientadores',
            'alunos',
            'areaPesquisas',
            'cursos'
        ];

        return compact($data);

    }
    public  function index()
    {

        $projetos = Projeto::all();
        $orientadores = Orientador::all();        
        $alunos = Aluno::all();
        $areaPesquisas = AreaPesquisa::all();
        $cursos = Curso::all();

        $data = [
            'orientadores',
            'alunos',
            'areaPesquisas',
            'cursos',
            'projetos'
        ];

        return view('home', compact($data));

    }

    public function busca(Request $filtros){
        
        $projetos = BuscaProjeto::aplica($filtros);

        $orientadores = Orientador::all();        
        $alunos = Aluno::all();
        $areaPesquisas = AreaPesquisa::all();
        $cursos = Curso::all();

        $data = [
            'orientadores',
            'alunos',
            'areaPesquisas',
            'cursos',
            'projetos'
        ];       
        
        return view('home', compact($data));

        
    }

    public function geraRelatorio(Request $filtros)
    {    
        $projetos = BuscaProjeto::aplica($filtros);
        // dd($projetos);
        return \PDF::loadView('projetos.busca.relatorio', compact('projetos'))
                    // ->setPaper('a4', 'landscape')
                    ->download('nome-arquivo-pdf-gerado.pdf');
    }

}
