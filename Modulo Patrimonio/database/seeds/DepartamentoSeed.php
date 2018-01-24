<?php

use Illuminate\Database\Seeder;

class DepartamentoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert(['departamento' => 'Escolaridade']);
        DB::table('departamentos')->insert(['departamento' => 'Matematica']);
        DB::table('departamentos')->insert(['departamento' => 'Administrativo']);
        DB::table('departamentos')->insert(['departamento' => 'Estatistica e Informatica']);
        DB::table('departamentos')->insert(['departamento' => 'Educação']);
    }
}
