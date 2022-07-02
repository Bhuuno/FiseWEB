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
            $table->id();
            $table->unsignedBigInteger("user_id")->unsigned();
            $table->foreign("user_id")
                ->references("id")
                ->on("users");
            $table->string('nome');
            $table->string('image')->nullable();
            $table->string('rg',12);
            $table->string('cpf',14);
            $table->date('data_nascimento');
            $table->string('email');
            $table->string('celular','15');
            $table->string('estado_civil');
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
        Schema::dropIfExists('pessoas');
    }
};
