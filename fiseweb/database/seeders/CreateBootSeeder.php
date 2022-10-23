<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateBootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Bruno Cavalcante Pereira 
        
        DB::table('users')->insert([
            'name' => 'Bruno Cavalcante Pereira',
            'email' => 'bruno12cavalcante@hotmail.com',
            'role' => 'administrador',
            'password' => Hash::make('12345'),
        ]);

        
        DB::table('pessoas')->insert([
            'nome' => 'Bruno Cavalcante Pereira',
            'user_id' => 1,
            'rg' => '444675413',
            'cpf' => '45239781826',
            'data_nascimento' => '1995-06-05',
            'email' => 'bruno12cavalcante@hotmail.com',
            'celular' => '18996256503',
            'estado_civil' => 'casado',
            'endereco'=>'Elvira Macarine',
            'numero'=>'100',
            'cidade'=>'Presidente Prudente',
            'cep'=>'19064275',
            'image'=>null]
        );

        
        DB::table('prestadors')->insert([
            'user_id' => 1,
            'razao_social' => 'BrunoInfo',
            'cnpj' => '037781300001',
            'data_constituicao' => '2020-01-01',
            'email'=>'bruno12cavalcante@hotmail.com',
            'profissao'=>'Programador',
            'especialidade'=>'Programação WEB',
            'informacao'=>'xxxxx',
            'sobre'=>'xxxxx',
            'experiencia'=>'xxxxx',
            'celular'=>'18996256503',
            'telefone'=>'18996256503',
            'endereco'=>'Enoch Pereira De Souza',
            'numero'=> 315,
            'cidade'=>'Presidente Prudente - SP',
            'cep' => '19064275',
            'status' => 1,
            'image'=>null,

            // Redes Sociais
            'website'=>'',
            'github'=>'',
            'instagram'=>'',
            'twitter'=>'',
            'facebook'=>'',

            // SOFTSKILL
            'primeiroSoftskill'=>'teste',
            'segundoSoftskill'=>'teste',
            'terceiroSoftskill'=>'teste',
            'quartoSoftskill'=>'teste',
            'quintoSoftskill'=>'teste',
            'porcentagemPrimeiroSoftskill'=>'100',
            'porcentagemSegundoSoftskill'=>'80',
            'porcentagemTerceiroSoftskill'=>'90',
            'porcentagemQuartoSoftskill'=>'10',
            'porcentagemQuintoSoftskill'=>'50',

            // Habilidade
            'primeiroHabilidade'=>'teste',
            'segundoHabilidade'=>'10',
            'terceiroHabilidade'=>'teste',
            'quartoHabilidade'=>'teste',
            'quintoHabilidade'=>'teste',
            'porcentagemPrimeiroHabilidade'=>'100',
            'porcentagemSegundoHabilidade'=>'40',
            'porcentagemTerceiroHabilidade'=>'60',
            'porcentagemQuartoHabilidade'=>'10',
            'porcentagemQuintoHabilidade'=>'20',
        ]);
    }
}
