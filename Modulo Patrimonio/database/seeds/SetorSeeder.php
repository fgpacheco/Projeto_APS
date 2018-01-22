<?php

use Illuminate\Database\Seeder;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i = 1; $i <= 20; $i++){
        DB::table('setors')->insert(['descricao' => 'Setor '.$i,
            'sala_id' => rand(1,20), 'curso_id' => rand(1,6), 'servidor_id' => rand(1,10)]);
    }}
}
