<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissaoTipoUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissaotipousuario', function (Blueprint $table) {
		$table->increments('id');
                $table->integer('tipousuario_id')->unsigned();
                $table->integer('permissao_id')->unsigned();
                $table->foreign('tipousuario_id')->references('id')->on('tiposusuarios');
                $table->foreign('permissao_id')->references('id')->on('permissoes');
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
        Schema::dropIfExists('permissaotipousuario');
    }
}
