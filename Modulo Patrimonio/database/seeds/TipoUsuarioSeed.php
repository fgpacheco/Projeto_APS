<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use web\TipoUsuario;

class TipoUsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $administrador = TipoUsuario::create([
            'tipousuario' => 'Administrador', 
            'slug' => 'administrador',
            'permissions' => [
                'criar-global' => true,
                'editar-global' => true,
                'remover-global' => true,
                'visualizar-global' => true,
                'acessoRestrito-global' => true,
            ]
        
            
        ]);
        
        
        $operador = TipoUsuario::create([
            'tipousuario' => 'Operador', 
            'slug' => 'operador',
            'permissions' => [
                'criar-global' => true,
                'editar-global' => true,
                'remover-global' => true,
                'visualizar-global' => true,
                'acessoRestrito-global' => false,
            ],
        ]);
        
        $basico = TipoUsuario::create([
            'tipousuario' => 'Basico', 
            'slug' => 'basico',
            'permissions' => [
                'criar-global' => false,
                'editar-global' => false,
                'remover-global' => false,
                'visualizar-global' => true,
                'acessoRestrito-global' => false,
            ],
        ]);
        
    }
}
