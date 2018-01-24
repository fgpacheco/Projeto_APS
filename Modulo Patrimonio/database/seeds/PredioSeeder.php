<?php

use Illuminate\Database\Seeder;

class PredioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('predios')->insert(['descricao' => 'Professores']);
        DB::table('predios')->insert(['descricao' => 'Professores II']);
        DB::table('predios')->insert(['descricao' => 'Engenharia de Alimentos']);
        DB::table('predios')->insert(['descricao' => 'Pedagogia']);
        DB::table('predios')->insert(['descricao' => 'Letras']);
        DB::table('predios')->insert(['descricao' => 'Administrativo']);
        DB::table('predios')->insert(['descricao' => 'Hospital Veterinario']);
    }
}
