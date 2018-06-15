<?php

namespace App\BuscaProjeto;

use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Aluno;
use App\Models\Orientador;
use App\Models\AreaPesquisa;
use App\Models\Curso;

class BuscaProjeto
{
    public static function aplica(Request $filtros)
    {

        $query = (new Projeto)->newQuery();

        $data = $filtros->all();
        //  dd($data);

        if (($filtros->has('titulo')) && ($filtros->input('titulo') != null) ) {
            $query->where('titulo', 'ilike', '%'.$filtros->input('titulo').'%');
        }
      
        if (($filtros->has('aluno')) && ($filtros->input('aluno') != null) ) {
            $query->where('aluno_id', $filtros->input('aluno'));
        }

        if (($filtros->has('orientador')) && ($filtros->input('orientador') != null) ) {
            $query->where('orientador_id', $filtros->input('orientador'));
        }
        
        

        if (($filtros->has('area_pesquisa')) && ($filtros->input('area_pesquisa') != null) ) {
            $query->where('area_pesquisa_id', $filtros->input('area_pesquisa'));
        }

        if(($filtros->has('curso')) && ($filtros->input('curso') != null)){

            $alunos = (new Aluno)->newQuery();
            $alunos->where('curso_id', $filtros->input('curso'));
            // pega a collection com todos os alunos do curso desejado
            $alunos = $alunos->get();
            // verifica se há alunos na collection
            if($alunos->isNotEmpty()){
                //array para guardar os id's dos alunos
                $ids[] = '';
                //loop para guardar os id's na array
                foreach($alunos as $i => $aluno){
                    $ids[$i] = $aluno->id;
                }
                // pega todos os projetos que tenham os alunos do curso desejado
                $query->whereIn('aluno_id', $ids);
            }else{
                return redirect()->route('busca')->with('error','nenhum registro encontrado com o curso solicitado');
            }      
            
            
           
        }
        
        if( ( ($filtros->has('ano_inicio')) && ($filtros->input('ano_inicio') != null) )  && ( ($filtros->has('ano_fim')) && ($filtros->input('ano_fim') != null) ) ){
            
            $query->whereBetween('ano_publicacao', [$filtros->input('ano_inicio'), $filtros->input('ano_fim')])
            ->orWhereBetween('ano_publicacao', [$filtros->input('ano_fim'), $filtros->input('ano_inicio')])
            ->orderBy('ano_publicacao', 'desc');
        }else if (($filtros->has('ano_publicacao')) && ($filtros->input('ano_publicacao') != null) ) {
            $query->where('ano_publicacao', $filtros->input('ano_publicacao'));
        }

        
        // pega todos os projetos conforme os parametros
        $projetos = $query->get();    

        return $projetos;
       
    }


}
