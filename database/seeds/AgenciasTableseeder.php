<?php

use Illuminate\Database\Seeder;

class AgenciasTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencias')->insert([
            'agencia' => 'JUCHITAN',
            'rff'     => 'ELENA OSORIO GALLEGOS',
            'fondo'   => '65000.00'
            
        ]);
        DB::table('agencias')->insert([
            'agencia' => 'TEHUANTEPEC',
            'rff'     => 'ALONSO MARTINEZ ALONSO',
            'fondo'   => '65000.00'

            
        ]); DB::table('agencias')->insert([
            'agencia' => 'ZANATEPEC',
            'rff'     => 'HALLYM ORELLA NAJERA',
            'fondo'   => '65000.00'

            
        ]); DB::table('agencias')->insert([
            'agencia' => 'MATIAS ROMERO',
            'rff'     => 'ZAYDEL LOPEZ CRUZ',
            'fondo'   => '65000.00'

            
        ]);
    }
}
