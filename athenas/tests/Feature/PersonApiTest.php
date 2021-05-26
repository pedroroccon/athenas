<?php

namespace Tests\Feature;

use Athenas\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Contracts\Pagination\Paginator;
use Tests\TestCase;

class PersonApiTest extends TestCase
{
    use RefreshDatabase;

    protected $person;

    public function setUp(): void
    {
        parent::setUp();
        $this->person = Person::factory()->create();
    }

    /** @test */
    public function podemos_listar_varias_pessoas()
    {
        $this->withoutExceptionHandling();

        $this->get(route('athenas.person.index'))
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => $this->person->name,
            ]);
    }
    
    /** @test */
    public function podemos_visualizar_uma_unica_pessoa()
    {
        $this->withoutExceptionHandling();
        
        $this->get(route('athenas.person.show', ['person' => $this->person->id]))
            ->assertStatus(200)
            ->assertJsonPath('data.id', $this->person->id);
    }

    /** @test */
    public function podemos_criar_uma_pessoa()
    {
        $this->withoutExceptionHandling();

        $params = Person::factory()->make()->toArray();

        $this->post(route('athenas.person.store'), $params)
            ->assertStatus(201)
            ->assertJsonPath('resource.name', $params['name']);

        $this->assertDatabaseHas('people', $params);
    }

    /** @test */
    public function podemos_editar_uma_pessoa()
    {
        $this->withoutExceptionHandling();

        $params = Person::factory()->make()->toArray([
            'name' => 'Updated person'
        ]);
        
        $this->put(route('athenas.person.update', ['person' => $this->person->id]), $params)
            ->assertStatus(200)
            ->assertJsonPath('resource.name', $params['name']);
        
        $this->assertDatabaseHas('people', array_merge(['id' => $this->person->id], $params));
    }

    /** @test */
    public function podemos_remover_uma_pessoa()
    {
        $this->delete(route('athenas.person.destroy', ['person' => $this->person->id]))
            ->assertStatus(200);
    
        $this->assertDatabaseMissing('people', ['id' => $this->person->id]);
    }
}