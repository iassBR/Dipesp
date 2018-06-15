<?php

use Illuminate\Database\Seeder;
use App\Models\Papel;
class PapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Papel::firstOrCreate([
            'nome' => 'Admin',
            'descricao' => 'Acesso total ao sistema'
        ]);

        $gerente = Papel::firstOrCreate([
            'nome' => 'Gerente',
            'descricao' => 'Responsável pelo departamento'
        ]);

        echo 'Papeis criados!!';
    }
}
