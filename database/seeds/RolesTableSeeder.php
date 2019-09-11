<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo('crear_reembolso','revisar_reembolso', 'firmar_reembolso', 'pagar_reembolso');
 
        $role = Role::create(['name' => 'editor']);
        $role->givePermissionTo('crear_reembolso');

        $role = Role::create(['name' => 'revisor']);
        $role->givePermissionTo('revisar_reembolso');

        $role = Role::create(['name' => 'firma']);
        $role->givePermissionTo('firmar_reembolso');

        $role = Role::create(['name' => 'pago']);
        $role->givePermissionTo('pagar_reembolso');
    }
}
