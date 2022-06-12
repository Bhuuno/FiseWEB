<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestadors', function (Blueprint $table) {
            // $table->id();
            $table->increments('id');
            $table->timestamps();
            //$table->integer('pessoa_id')->usigned();
            //$table->foreign('pessoa_id')->references('id')->on('pessoa');
            $table->string('cnpj',14);
            $table->string('cartao');
            $table->string('conta');
            $table->string('profissao');
            $table->string('imagens');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestadors');
    }
};
