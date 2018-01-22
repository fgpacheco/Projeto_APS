<?php

use Illuminate\Database\Seeder;

class ServidorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nome = array('Maria','Ana','Paula','Gabriela','Raquel','Carol');
    	  $cargo = array('Assistente','Supervisor','Estágiario','Gerente');
    for ($i = 1; $i <= 50; $i++){
        DB::table('servidors')->insert(['usuario_id' => 1,
        											 'nome' => $nome[rand(1,5)].' '.$nome[rand(1,5)],
        											 'cargo' => $cargo[rand(1,3)],
                                        'matricula' => '2017-'.$i]);
                                        
                                      
        }
    }
}
