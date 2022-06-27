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
            $table->id();
            $table->unsignedBigInteger("user_id")->unsigned();
            $table->foreign("user_id")
                ->references("id")
                ->on("users");
            $table->string('razao_social');
            $table->string('cnpj',18);
            $table->date('data_constituicao');
            $table->string('email');
            $table->string('profissao');
            $table->string('especialidade');
            $table->string('informacao');
            $table->string('sobre');
            $table->string('experiencia');
            $table->string('celular','15');
            $table->string('telefone','10');
            $table->string('endereco');
            $table->integer('numero');
            $table->string('cidade');
            $table->string('cep',9);
            $table->timestamps();
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
