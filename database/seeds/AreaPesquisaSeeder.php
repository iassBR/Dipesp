<?php

use Illuminate\Database\Seeder;
use App\Models\AreaPesquisa;

class AreaPesquisaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $descricaoAreasDePesquisa = [
        'Ciências Exatas e da Terra',
        'Ciências Biológicas',
        'Engenharias',
        'Ciências da Saúde',
        'Ciências Agrárias',
        'Ciências Sociais Aplicadas',
        'Ciências Humanas',
        'Linguística, Letras e Artes',
        'Outras',
    ];
    public function run()
    {
        foreach($this->descricaoAreasDePesquisa as $descricao)
        {
            AreaPesquisa::create(['descricao'=>$descricao]);
        }
    }
}
