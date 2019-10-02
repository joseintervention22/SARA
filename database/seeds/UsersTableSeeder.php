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
            'name' => 'Jose de Jesus Velasquez',
            'email' => 'editor@gmail.com',
            'username' => '9B503',
            'password' => bcrypt('9B503'),
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

        //usuarios de prueba
        DB::table('users')->insert([
            'name' => 'Roberto Nuricumbo Guerra',
            'email' => 'roberto.nuricumbo@cfe.mx',
            'username' => '9DU0Y ',
            'password' => bcrypt('9DU0Y'),
        ]);
        DB::table('users')->insert([
            'name' => 'Triana Enriquez',
            'email' => 'triana.enriquez@cfe.mx',
            'username' => '9B58R ',
            'password' => bcrypt('9B58R'),
        ]);
        DB::table('users')->insert([
            'name' => 'Magdalena Cueto',
            'email' => 'magdalena.cueto@cfe.mx',
            'username' => 'J885M',
            'password' => bcrypt('J885M'),
        ]);
        DB::table('users')->insert([
            'name' => 'Jose Ruiz',
            'email' => 'jose.ruiz@cfe.mx',
            'username' => '12345',
            'password' => bcrypt('12345'),
        ]);



                    
        $user = User::where('id',1)->first();
        $user2 = User::where('id',2)->first();
        $user3 = User::where('id',3)->first();
        $user4 = User::where('id',4)->first();
        $user5 = User::where('id',5)->first();
        $user6 = User::where('id',6)->first();
        $user7 = User::where('id',7)->first();
        $user8 = User::where('id',8)->first();
        $user9 = User::where('id',9)->first();




        $user->assignRole('administrator');
        $user2->assignRole('editor');
        $user3->assignRole('revisor');
        $user7->assignRole('revisor');
        $user4->assignRole('firma');
        $user6->assignRole('firma');
        $user5->assignRole('pago');
        $user8->assignRole('pago');
        $user9->assignRole('ofi_fin');



        
    }
}
