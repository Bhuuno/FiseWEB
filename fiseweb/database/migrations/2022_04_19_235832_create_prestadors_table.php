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
            $table->integer('pessoa_id')->usigned();
            $table->foreign('pessoas_id')->references('id')->on('pessoas');
            $table->string('cnpj',14);
            $table->string('profissao');            
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
