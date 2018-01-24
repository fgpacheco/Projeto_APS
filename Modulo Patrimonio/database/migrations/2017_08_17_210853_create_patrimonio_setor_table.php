<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimonioSetorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonio_setor', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dataAquisicao');
            $table->integer('patrimonio_id')->unsigned();
            $table->integer('setor_id')->unsigned();
            $table->foreign('patrimonio_id')->references('id')->on('patrimonios');
            $table->foreign('setor_id')->references('id')->on('setors');
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
        Schema::dropIfExists('patrimonio_setor');
    }
}
