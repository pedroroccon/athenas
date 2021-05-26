<?php

namespace Tests\Unit;

use Athenas\Models\People;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PeopleTest extends TestCase
{
	use RefreshDatabase;

	protected $people;

	public function setUp(): void
	{
		parent::setUp();
		$this->people = People::factory()->create();
	}

	/** @test */
    public function possui_um_caminho_definido()
    {
    	$this->assertEquals(config('athenas.path') . '/people/' . $this->people->id, $this->people->path());
	}
}