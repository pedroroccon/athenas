<?php

namespace Tests\Unit;

use Athenas\Models\Category;
use Athenas\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PersonTest extends TestCase
{
	use RefreshDatabase;

	protected $person;

	public function setUp(): void
	{
		parent::setUp();
		$this->person = Person::factory()->create();
	}

	/** @test */
    public function possui_um_caminho_definido()
    {
    	$this->assertEquals(config('athenas.path') . '/person/' . $this->person->id, $this->person->path());
	}

    /** @test */
	public function pertence_a_uma_categoria()
	{
		$this->assertInstanceOf(Category::class, $this->person->category);
	}
}