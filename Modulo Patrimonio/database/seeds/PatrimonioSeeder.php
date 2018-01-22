<?php
use Illuminate\Database\Seeder;
class PatrimonioSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $descricao = array("Monitor", "Mouse", "Desktop", "Teclado", "Impressora", "Estabilizador", "DataShow");
        $date = array("2017/08/01", "2017/08/10", "2017/07/01", "2017/06/12");
        for ($i = 1; $i <= 50; $i++) {
            DB::table('patrimonios')->insert(['descricao' => $descricao[rand(0, 6)],
                'valor' => rand(10, 1000),
                'numeropatrimonio' => '2017' . $i,
                'numeropantigo' => '2017' . $i . "42",
                'numeroempenho' => $i . "42",
                'numeropregao' => '4242',
                'numeronotafiscal' => "3333." . $i,
                'marca_id' => rand(1, 7),
                'dataaquisicao' => $date[rand(0, 3)],
                'subgrupo_id'=>rand(1,3)]);
        }
    }
}