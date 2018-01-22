<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoUsuarioUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipousuariousuario', function (Blueprint $table) {
		$table->increments('id');
                $table->integer('tipousuario_id')->unsigned();
                $table->integer('usuario_id')->unsigned();
                $table->unique(['usuario_id','tipousuario_id']);
                
                $table->foreign('tipousuario_id')->references('id')->on('tiposusuarios')->onDelete('cascade');
                $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
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
        Schema::dropIfExists('tipousuariousuario');
    }
}
