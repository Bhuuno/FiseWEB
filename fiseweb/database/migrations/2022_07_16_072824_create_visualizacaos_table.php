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
        Schema::create('visualizacaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("user_id")->unsigned();
            $table->foreign("user_id")
                ->references("id")
                ->on("users");
            $table->unsignedBigInteger("prestador_id")->unsigned();  
            $table->foreign("prestador_id")
                ->references("id")
                ->on("prestadors");
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visualizacaos');
    }
};
