<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'crear_reembolso']);
      	Permission::create(['name' => 'revisar_reembolso']);
     	Permission::create(['name' => 'firmar_reembolso']);
     	Permission::create(['name' => 'pagar_reembolso']);

    }
}
