<?php

namespace Athenas\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class SeedDatabase extends Command
{
    /**
     * Define o nome para o comando.
     *
     * @var string
     */
    protected $signature = 'athenas:seed';

    /**
     * Define a descrição do comando no console.
     *
     * @var string
     */
    protected $description = 'Executa os seeds na base de dados da aplicação';

    /**
     * Cria uma nova instância do comando.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Executa o comando no console.
     *
     * @return int
     */
    public function handle()
    {
        $this->newLine();
        $this->info('Seeding categories...');
        Artisan::call('db:seed', ['--class' => \Athenas\Seeders\CategoriesSeeder::class]);
        $this->info('Categories seeded!');

        $this->newLine();
        $this->info('Seeding people...');
        Artisan::call('db:seed', ['--class' => \Athenas\Seeders\PeopleSeeder::class]);
        $this->info('People seeded!');

        $this->newLine();
    }
}
