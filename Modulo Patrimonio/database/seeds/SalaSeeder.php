<?php

use Illuminate\Database\Seeder;

class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 10; $i <= 70; $i++){
        DB::table('salas')->insert(['descricao' => 'Sala'.$i,
            'ramal' => '55'.$i, 'predio_id' => ($i/10)]);
        }
    
    }
}
