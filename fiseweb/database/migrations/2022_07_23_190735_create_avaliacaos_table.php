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
        Schema::create('avaliacaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("pessoa_id")->unsigned();
            $table->foreign("pessoa_id")
                ->references("id")
                ->on("pessoas");
            $table->unsignedBigInteger("prestador_id")->unsigned();  
            $table->foreign("prestador_id")
                ->references("id")
                ->on("prestadors");
            $table->text("comentario");
            $table->double("avaliacao");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacaos');
    }
};
