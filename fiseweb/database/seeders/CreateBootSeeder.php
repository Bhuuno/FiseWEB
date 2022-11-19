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
            'role' => 'prestador',
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

        //Lucas Issamu Sakugawa 

        DB::table('users')->insert([
            'name' => 'Lucas Issamu Sakugawa',
            'email' => 'lucas@hotmail.com',
            'role' => 'prestador',
            'password' => Hash::make('12345'),
        ]);

        
        DB::table('pessoas')->insert([
            'nome' => 'Lucas Issamu Sakugawa',
            'user_id' => 2,
            'rg' => '444675414',
            'cpf' => '45239781827',
            'data_nascimento' => '1997-06-05',
            'email' => 'lucas.fatec@hotmail.com',
            'celular' => '18996256514',
            'estado_civil' => 'solteiro',
            'endereco'=>'Rua Mairipora',
            'numero'=>'508',
            'cidade'=>'Presidente Prudente',
            'cep'=>'19064275',
            'image'=>null]
        );

        DB::table('prestadors')->insert([
            'user_id' => 2,
            'razao_social' => 'LucaoInfo',
            'cnpj' => '026781300001',
            'data_constituicao' => '2020-01-01',
            'email'=>'lucas.fatec@hotmail.com',
            'profissao'=>'Programador',
            'especialidade'=>'Programação WEB',
            'informacao'=>'xxxxx',
            'sobre'=>'xxxxx',
            'experiencia'=>'xxxxx',
            'celular'=>'18996256504',
            'telefone'=>'18996256504',
            'endereco'=>'Rua Mairipora',
            'numero'=> 31,
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
            'porcentagemPrimeiroSoftskill'=>'50',
            'porcentagemSegundoSoftskill'=>'50',
            'porcentagemTerceiroSoftskill'=>'50',
            'porcentagemQuartoSoftskill'=>'50',
            'porcentagemQuintoSoftskill'=>'50',

            // Habilidade
            'primeiroHabilidade'=>'teste',
            'segundoHabilidade'=>'10',
            'terceiroHabilidade'=>'teste',
            'quartoHabilidade'=>'teste',
            'quintoHabilidade'=>'teste',
            'porcentagemPrimeiroHabilidade'=>'50',
            'porcentagemSegundoHabilidade'=>'50',
            'porcentagemTerceiroHabilidade'=>'50',
            'porcentagemQuartoHabilidade'=>'50',
            'porcentagemQuintoHabilidade'=>'50',
        ]);


        //MATHEUS BOTE
        
        DB::table('users')->insert([
            'name' => 'Matheus Bote',
            'email' => 'matheusbote@hotmail.com',
            'role' => 'prestador',
            'password' => Hash::make('12345'),
        ]);

        
        DB::table('pessoas')->insert([
            'nome' => 'Matheus Bote',
            'user_id' => 3,
            'rg' => '561790383',
            'cpf' => '45817532875',
            'data_nascimento' => '2001-08-19',
            'email' => 'matheusbote@hotmail.com',
            'celular' => '18936189638',
            'estado_civil' => 'casado',
            'endereco'=>'Eliseu Alvares',
            'numero'=>'494',
            'cidade'=>'Presidente Prudente',
            'cep'=>'19063690',
            'image'=>null]
        );

        
        DB::table('prestadors')->insert([
            'user_id' => 3,
            'razao_social'=> '61654615',
            'cnpj' => '026781300001',
            'data_constituicao' => '2020-01-01',
            'email'=>'matheusbotehotmail.com',
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
