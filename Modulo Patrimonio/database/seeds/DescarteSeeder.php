<?php

use Illuminate\Database\Seeder;

class DescarteSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('descartes')->insert(['motivo' => 'Obsoleto']);
        DB::table('descartes')->insert(['motivo' => 'Antieconômico']);
        DB::table('descartes')->insert(['motivo' => 'Quebrado (Inservível)']);
    }

}
