<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('usuarios')->insert(['departamento_id' => 1,'apelido' => 'Zé', 'email' => 'jose@teste.com',
                                            'senha' => '123']);

    }
}
