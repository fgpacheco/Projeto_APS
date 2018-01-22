<?php
use Illuminate\Database\Seeder;

class UsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = \web\Usuario::create([
            'name' => 'SuperAdministrador', 
            'email' => 'admin@admin.com',
            'password' => bcrypt('[admin]'), 
            'departamento_id' => '1'
        
        ]);
        
        $usuario->tiposUsuarios()->attach('1');

    }
}
