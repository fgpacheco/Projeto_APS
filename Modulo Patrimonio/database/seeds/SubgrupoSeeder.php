<?php

use Illuminate\Database\Seeder;

class SubgrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subgrupos')->insert(['descricao' => 'Notebook', 'grupo_id' => 2]);
        DB::table('subgrupos')->insert(['descricao' => 'Monitor', 'grupo_id' => 2]);
        DB::table('subgrupos')->insert(['descricao' => 'Teclado', 'grupo_id' => 2]);
        DB::table('subgrupos')->insert(['descricao' => 'Microcomputador', 'grupo_id' => 2]);
        DB::table('subgrupos')->insert(['descricao' => 'Cadeira', 'grupo_id' => 3]);
        DB::table('subgrupos')->insert(['descricao' => 'Armario', 'grupo_id' => 3]);
        DB::table('subgrupos')->insert(['descricao' => 'TV', 'grupo_id' => 1]);
        DB::table('subgrupos')->insert(['descricao' => 'Projetor', 'grupo_id' => 1]);
        DB::table('subgrupos')->insert(['descricao' => 'Som', 'grupo_id' => 1]);
    }
}
