<?php

namespace Tests\Feature;

use Athenas\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Contracts\Pagination\Paginator;
use Tests\TestCase;

class CategoryApiTest extends TestCase
{
    use RefreshDatabase;

    protected $category;

    public function setUp(): void
    {
        parent::setUp();
        $this->category = Category::factory()->create();
    }

    /** @test */
    public function podemos_listar_varias_categorias()
    {
        $this->get(route('athenas.category.index'))
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => $this->category->name,
            ]);
    }
    
    /** @test */
    public function podemos_visualizar_uma_unica_categoria()
    {
        $this->get(route('athenas.category.show', ['category' => $this->category->id]))
            ->assertStatus(200)
            ->assertJsonPath('data.id', $this->category->id);
    }

    /** @test */
    public function podemos_criar_uma_categoria()
    {
        $this->withoutExceptionHandling();

        $params = Category::factory()->make()->toArray();

        $this->post(route('athenas.category.store'), $params)
            ->assertStatus(201)
            ->assertJsonPath('resource.name', $params['name']);

        $this->assertDatabaseHas('categories', $params);
    }

    /** @test */
    public function podemos_editar_uma_categoria()
    {
        $this->withoutExceptionHandling();

        $params = Category::factory()->make()->toArray([
            'name' => 'Updated category'
        ]);
        
        $this->put(route('athenas.category.update', ['category' => $this->category->id]), $params)
            ->assertStatus(200)
            ->assertJsonPath('resource.name', $params['name']);
        
        $this->assertDatabaseHas('categories', array_merge(['id' => $this->category->id], $params));
    }

    /** @test */
    public function podemos_remover_uma_categoria()
    {
        $this->delete(route('athenas.category.destroy', ['category' => $this->category->id]))
            ->assertStatus(200);
    
        $this->assertDatabaseMissing('categories', ['id' => $this->category->id]);
    }
}