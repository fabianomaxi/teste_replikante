<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function(Blueprint $table) {

            $table->bigIncrements('id_produtos');
            $table->string('nome');
            $table->float('preco', 8, 2);
            
            $table->integer('id_tipo_produtos');

            //$table->foreign('id_tipo_produtos')->references('id_tipo_produtos')->on('tipo_produtos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produtos');
    }
}
