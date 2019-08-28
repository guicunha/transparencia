<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateRecursosHumanosTable.
 */
class CreateRecursosHumanosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recursos_humanos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('matricula');
            $table->string('nome');
            $table->string('cargo_inicial');
            $table->string('cargo_atual');
            $table->string('lotacao_inicial');
            $table->string('lotacao_atual');
            $table->json('remuneracao')->nullable();
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
		Schema::drop('recursos_humanos');
	}
}
