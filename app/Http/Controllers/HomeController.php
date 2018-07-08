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

    public function busca(Request $filtros)
    {

        $filtros->flash();

        $projetos = BuscaProjeto::aplica($filtros);

        switch ($filtros->input('action')) {
            case 'busca':
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

                break;
        
            case 'relatorio':

                return \PDF::loadView('projetos.busca.relatorio', compact('projetos','filtros'))
                    // ->setPaper('a4', 'landscape')
                    ->download('Relatório de projetos.pdf');
                
                break;
        }
       
    }

   

}
