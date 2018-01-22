<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimoniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marca_id')->nullable()->unsigned();
            $table->integer('descarte_id')->nullable()->unsigned();
            $table->string('descricao');
            $table->integer('subgrupo_id')->unsigned();
            $table->string('valor');
            $table->integer('numeroempenho');
            $table->integer('numeropatrimonio');
            $table->integer('numeropregao')->nullable();
            $table->integer('numeropantigo')->nullable();
            $table->integer('numeronotafiscal');
            $table->date('dataaquisicao');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('descarte_id')->references('id')->on('descartes');
            $table->foreign('subgrupo_id')->references('id')->on('subgrupos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patrimonios');
    }
}
