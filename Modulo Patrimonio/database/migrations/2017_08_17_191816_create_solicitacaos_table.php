<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitacaosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('solicitacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('setor_id')->unsigned();
            $table->string('nome');
            $table->string('matricula');
            $table->string('cargo');
            $table->string('sala');
            $table->string('predio');
            $table->string('ramal');
            $table->string('curso');
            $table->date('data');
            $table->text('descricao');
            $table->foreign('setor_id')->references('id')->on('setors')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('solicitacaos');
    }

}
