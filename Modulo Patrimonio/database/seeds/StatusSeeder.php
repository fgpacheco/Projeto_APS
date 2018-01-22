<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert(['descricao' => 'Disponível']);
        DB::table('statuses')->insert(['descricao' => 'Indisponível']);
        DB::table('statuses')->insert(['descricao' => 'Em manutenção']);
        DB::table('statuses')->insert(['descricao' => 'Descartado']);
    }
}
