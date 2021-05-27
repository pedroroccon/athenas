<?php

namespace Athenas\Seeders;

use Athenas\Models\Person;
use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{

    /**
     * Executa os seeders na base 
     * de dados.
     *
     * @return void
     */
    public function run()
    {
        // Carregando o arquivo CSV contendo 
        // os registros das pessoas.
        $csv = file(__DIR__ . '/csvs/people.csv');

        // Executamos o trim em cada elemento 
        // do array para remover espaços em branco 
        // e também a quebra de linha do CSV.
        $csv = array_map(function($value) {
            return trim($value);
        }, $csv);

        // Definimos a primeira linha do 
        // CSV como sendo o nosso header.
        $headers = explode(';', $csv[0]);

        // Usando o array_shift para remover 
        // o primeiro elemento do CSV (cabeçalho).
        array_shift($csv);

        // Para cada linha do CSV, vamos trabalhar 
        // a linha, aplicando as padronizações 
        // e adicionando na base de dados.
        foreach($csv as $row) {

            // Transformando a linha do CSV em um 
            // array.
            $array = explode(';', $row);

            // Combinando a linha do CSV com nosso cabeçalho, 
            // desta forma conseguimos deixar a inserção dos 
            // itens com uma leitura mais amigável.
            $array = array_combine($headers, $array);

            // Agora com todos os dados tratados, podemos inserir
            // as informações na base de dados.
            Person::firstOrCreate($array);
        }
    }
}