<?php

use Illuminate\Database\Seeder;
use App\Models\Modalidade;

class ModalidadeSeeder extends Seeder
{
    private $modalidades = [
        'Técnico subsequente',
        'Médio técnico',
        'Superior',
    ];
  

    public function run()
    {
        foreach($this->modalidades as $tipo)
        {
            Modalidade::create(['tipo'=>$tipo]);
        }
    }
}
