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
            $table->text('informacao');
            $table->text('sobre');
            $table->text('experiencia');
            $table->string('celular','15');
            $table->string('telefone','15');
            $table->string('endereco');
            $table->integer('numero');
            $table->integer('status');
            $table->string('cidade');
            $table->string('cep',9);
            $table->string('image')->nullable();

            // Soft Skill
            $table->string('primeiroSoftskill')->nullable();
            $table->integer('porcentagemPrimeiroSoftskill')->nullable();
            $table->string('segundoSoftskill')->nullable();
            $table->integer('porcentagemSegundoSoftskill')->nullable();
            $table->string('terceiroSoftskill')->nullable();
            $table->integer('porcentagemTerceiroSoftskill')->nullable();
            $table->string('quartoSoftskill')->nullable();
            $table->integer('porcentagemQuartoSoftskill')->nullable();
            $table->string('quintoSoftskill')->nullable();
            $table->integer('porcentagemQuintoSoftskill')->nullable();

            //Habilidade
            $table->string('primeiroHabilidade')->nullable();
            $table->integer('porcentagemPrimeiroHabilidade')->nullable();
            $table->string('segundoHabilidade')->nullable();
            $table->integer('porcentagemSegundoHabilidade')->nullable();
            $table->string('terceiroHabilidade')->nullable();
            $table->integer('porcentagemTerceiroHabilidade')->nullable();
            $table->string('quartoHabilidade')->nullable();
            $table->integer('porcentagemQuartoHabilidade')->nullable();
            $table->string('quintoHabilidade')->nullable();
            $table->integer('porcentagemQuintoHabilidade')->nullable();

            // Redes Sociais
            $table->text('website')->nullable();
            $table->text('github')->nullable();
            $table->text('twitter')->nullable();
            $table->text('instagram')->nullable();
            $table->text('facebook')->nullable();
            
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
