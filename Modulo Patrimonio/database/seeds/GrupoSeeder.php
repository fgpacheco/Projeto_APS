<?php

use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupos')->insert(['descricao' => 'Eletronicos']);
        DB::table('grupos')->insert(['descricao' => 'Informatica']);
        DB::table('grupos')->insert(['descricao' => 'Móveis']);
      
    }
}
