<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Post;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crear 4 usuarios
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin12',
            'password' => bcrypt('admin123'),
        ]);
        DB::table('users')->insert([
            'name' => 'editor',
            'email' => 'editor@gmail.com',
            'username' => 'editor1',
            'password' => bcrypt('editor123'),
        ]);
        DB::table('users')->insert([
            'name' => 'revisor',
            'email' => 'revisor@gmail.com',
            'username' => 'revisor',
            'password' => bcrypt('revisor123'),
        ]);
        DB::table('users')->insert([
            'name' => 'firma',
            'email' => 'firma@gmail.com',
            'username' => 'firma12',
            'password' => bcrypt('firma123'),
        ]);
        DB::table('users')->insert([
            'name' => 'pago',
            'email' => 'pago@gmail.com',
            'username' => 'pago123',
            'password' => bcrypt('pago123'),
        ]);
                    
        $user = User::where('id',1)->first();
        $user2 = User::where('id',2)->first();
        $user3 = User::where('id',3)->first();
        $user4 = User::where('id',4)->first();
        $user5 = User::where('id',5)->first();


        $user->assignRole('administrator');
        $user2->assignRole('editor');
        $user3->assignRole('revisor');
        $user4->assignRole('firma');
        $user5->assignRole('pago');

        
    }
}
