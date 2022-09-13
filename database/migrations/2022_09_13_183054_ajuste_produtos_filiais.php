<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando a tabela filiais
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial',30);
            $table->timestamps();            
        });

        //criando a tabela produto_filiais
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('filial_id');
            $table->unsignedbigInteger('produto_id');
            $table->decimal('preco_venda', 8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();            
            
            //foreign key (constraints)
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');    
        });


        //removendo coluns preco_venda,estoque_minimo, estoque_maximo da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['preco_venda','estoque_minimo','estoque_maximo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->float('preco_venda',8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });

        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    }
}
