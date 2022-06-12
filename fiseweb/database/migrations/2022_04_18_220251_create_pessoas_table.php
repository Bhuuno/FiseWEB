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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');
                $table->string('nome');
                $table->string('rg',12);
                $table->string('cpf',14);
                $table->date('data_nascimento');
                $table->string('email');
                $table->string('telefone','15');
                $table->string('estado_civil');
                $table->string('endereco');
                $table->integer('numero');
                $table->string('cidade');
                $table->string('cep',9);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
};
