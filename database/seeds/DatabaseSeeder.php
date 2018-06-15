<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                AreaPesquisaSeeder::class,
                ModalidadeSeeder::class,
                PapelSeeder::class,
                PermissaoSeeder::class,
                UserTableSeeder::class,
                UserPapel::class,
                PapelPermissaoSeeder::class
            ]
        ); 

    }
}
