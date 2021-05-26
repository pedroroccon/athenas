<?php

namespace Tests\Unit;

use Athenas\Providers\AthenasServiceProvider;
use Tests\TestCase;

class AthenasProviderTest extends TestCase
{

    /** @test */
    public function o_pacote_athenas_foi_carregado()
    {
        $this->assertEquals(class_exists(AthenasServiceProvider::class), true);
    }

}