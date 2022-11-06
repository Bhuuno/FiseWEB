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
        Schema::create('perguntas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('pessoa_user_id');
            $table->integer('id_prestador');
            $table->integer('id_pergunta')->nullable();
            $table->integer('tipo');
            $table->integer('status');
            $table->text('pergunta')->nullable();
            $table->text('resposta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perguntas');
    }
};
