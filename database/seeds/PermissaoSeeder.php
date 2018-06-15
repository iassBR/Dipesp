<?php

use Illuminate\Database\Seeder;
use App\Models\Permissao;
class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Permissao::firstOrCreate([
            'nome' => 'dashboard',
            'descricao' =>'dashboard admin'
        ]);
//==================== Usuarios ======================
        $usuarios1 = Permissao::firstOrCreate([
            'nome' =>'lista-usuarios',
            'descricao' =>'Acesso a lista de Usuários'
        ]);
       
        $usuarios2 = Permissao::firstOrCreate([
            'nome' =>'criar-usuarios',
            'descricao' =>'Permissão para adicionar Usuários'
        ]);
        $usuarios2 = Permissao::firstOrCreate([
            'nome' =>'editar-usuarios',
            'descricao' =>'Permissão para editar Usuários'
        ]);
        $usuarios3 = Permissao::firstOrCreate([
            'nome' =>'deletar-usuarios',
            'descricao' =>'Permissão para deletar Usuários'
        ]);  

//END ==================== Usuarios ====================== END

// ===================== Papéis ===========================
        $papeis1 = Permissao::firstOrCreate([
            'nome' =>'lista-papeis',
            'descricao' =>'Permissão para visualizar lista de Papéis'
        ]);
        $papeis2 = Permissao::firstOrCreate([
            'nome' =>'criar-papeis',
            'descricao' =>'Permissão para adicionar Papéis'
        ]);
        $papeis3 = Permissao::firstOrCreate([
            'nome' =>'editar-papeis',
            'descricao' =>'Permissão para editar Papéis'
        ]);
        
        $papeis4 = Permissao::firstOrCreate([
            'nome' =>'deletar-papeis',
            'descricao' =>'Permissão para deletar Papéis'
        ]);
//END ===================== Papéis ===========================END

// ======================== Orientadores ========================

        $orientador = Permissao::firstOrCreate([
            'nome' =>'lista-orientadores',
            'descricao' =>'Permissão para visualizar lista de Orientadores'
        ]);
        $orientador = Permissao::firstOrCreate([
            'nome' =>'criar-orientadores',
            'descricao' =>'Permissão para adicionar Orientadores'
        ]);
        $orientador = Permissao::firstOrCreate([
            'nome' =>'editar-orientadores',
            'descricao' =>'Permissão para editar Orientadores'
        ]);

        $orientador = Permissao::firstOrCreate([
            'nome' =>'deletar-orientadores',
            'descricao' =>'Permissão para deletar Orientadores'
        ]);

//END ======================== Orientadores ========================END

// ======================== Alunos ========================

        $aluno = Permissao::firstOrCreate([
            'nome' =>'lista-alunos',
            'descricao' =>'Permissão para visualizar lista de Alunos'
        ]);
        $aluno = Permissao::firstOrCreate([
            'nome' =>'criar-alunos',
            'descricao' =>'Permissão para adicionar Alunos'
        ]);
        $aluno = Permissao::firstOrCreate([
            'nome' =>'editar-alunos',
            'descricao' =>'Permissão para editar Alunos'
        ]);

        $aluno = Permissao::firstOrCreate([
            'nome' =>'deletar-alunos',
            'descricao' =>'Permissão para deletar Alunos'
        ]);

//END ======================== Alunos ========================END

// ======================== Cursos ========================

        $curso = Permissao::firstOrCreate([
            'nome' =>'lista-cursos',
            'descricao' =>'Permissão para visualizar lista de Cursos'
        ]);
        $curso = Permissao::firstOrCreate([
            'nome' =>'criar-cursos',
            'descricao' =>'Permissão para adicionar Cursos'
        ]);
        $curso = Permissao::firstOrCreate([
            'nome' =>'editar-cursos',
            'descricao' =>'Permissão para editar Cursos'
        ]);

        $curso = Permissao::firstOrCreate([
            'nome' =>'deletar-cursos',
            'descricao' =>'Permissão para deletar Cursos'
        ]);

//END ======================== Cursos ========================END

// ======================== Cursos ========================

        $projeto = Permissao::firstOrCreate([
            'nome' =>'lista-projetos',
            'descricao' =>'Permissão para visualizar lista de Projetos'
        ]);
        $projeto = Permissao::firstOrCreate([
            'nome' =>'criar-projetos',
            'descricao' =>'Permissão para adicionar Projetos'
        ]);
        $projeto = Permissao::firstOrCreate([
            'nome' =>'editar-projetos',
            'descricao' =>'Permissão para editar Projetos'
        ]);

        $projeto = Permissao::firstOrCreate([
            'nome' =>'deletar-projetos',
            'descricao' =>'Permissão para deletar Projetos'
        ]);

//END ======================== Cursos ========================END

        echo "Registros de Permissoes criados no sistema";
    }
}
