<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateDespesasTable.
 */
class CreateDespesasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('despesas', function(Blueprint $table)
        {
		    $table->bigIncrements('id');
		    $table->string('descricao_contabil');
		    $table->text('descricao_despesa');
		    $table->string('favorecido')->nullable();
		    $table->string('favorecido_documento')->nullable();
		    $table->integer('contrato_numero')->default(0);
		    $table->integer('numero_empenho')->default(0);
		    $table->integer('numero_baixa')->default(0);
		    $table->string('processo_administrativo')->nullable();
		    $table->integer('valor')->default(0);
		    $table->integer('valor_liquido')->default(0);
		    $table->string('tipo_documento')->default('Recibo');
            $table->string('funcionario');
            $table->string('funcionario_id');
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
		Schema::drop('despesas');
	}
}
