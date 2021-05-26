<?php

namespace Tests\Unit;

use Athenas\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
	use RefreshDatabase;

	protected $category;

	public function setUp(): void
	{
		parent::setUp();
		$this->category = Category::factory()->create();
	}

    /** @test */
    public function possui_varias_pessoas_associadas()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->category->peoples);
    }

	/** @test */
    public function possui_um_caminho_definido()
    {
    	$this->assertEquals(config('athenas.path') . '/category/' . $this->category->id, $this->category->path());
	}
}