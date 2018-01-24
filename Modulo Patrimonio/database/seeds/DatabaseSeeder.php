<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        
        $this->call(MarcaSeeder::class);
        $this->call(DescarteSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(GrupoSeeder::class);
        $this->call(SubgrupoSeeder::class);
        $this->call(PatrimonioSeeder::class);
        $this->call(DepartamentoSeed::class);
        $this->call(TipoUsuarioSeed::class);
        $this->call(UsuarioSeed::class);
        $this->call(CursoSeeder::class);
        $this->call(PredioSeeder::class);
        $this->call(SalaSeeder::class);
        $this->call(ServidorSeeder::class);
        $this->call(SetorSeeder::class);

    }
}
