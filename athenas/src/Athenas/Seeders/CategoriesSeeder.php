<?php

namespace Athenas\Seeders;

use Athenas\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{

    /**
     * Executa os seeders na base 
     * de dados.
     *
     * @return void
     */
    public function run()
    {
        
        // Definindo as categorias e 
        // seus respectivos códigos 
        // como sendo seus índices.
        $categories = [
            1 => 'Admin', 
            2 => 'Gerente', 
            3 => 'Normal'
        ];

        foreach($categories as $index => $category) {

            // First or create previne que o registro 
            // não seja inserido duplicadamente na base 
            // de dados.
            Category::firstOrCreate([
                'code' => $index, 
                'name' => $category
            ]);
        }
    }
}