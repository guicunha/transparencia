<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateDocumentosTable.
 */
class CreateDocumentosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documentos', function(Blueprint $table) {
		    $table->increments('id');
		    $table->string('hash');
		    $table->integer('ano');
		    $table->integer('numero');
		    $table->string('setor');
		    $table->string('categoria');
		    $table->string('tipo');
		    $table->string('nome_original');
		    $table->string('extensao');
		    $table->string('myme_type');
		    $table->string('titulo');
		    $table->text('descricao');
		    $table->integer('funcionario_id');
		    $table->string('funcionario');
		    $table->integer('contador_acessos');
		    $table->json('meta')->nullable();
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
		Schema::drop('documentos');
	}
}
