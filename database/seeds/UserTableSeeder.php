<?php

use Illuminate\Database\Seeder;
use App\Models\User;



class UserTableSeeder extends Seeder
{
    
    public function run()
    {
        if (User::count() == 0) {
           
            User::create([
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password')              
                            
            ]);

            echo "Admin criado com sucesso!";
        }
    }
}
