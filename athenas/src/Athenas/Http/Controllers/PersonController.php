<?php

namespace Athenas\Http\Controllers;

use App\Http\Controllers\Controller;
use Athenas\Models\Person;
use Athenas\Http\Resources\PersonCollection;
use Athenas\Http\Resources\PersonResource;
use Athenas\Http\Requests\PersonRequest;

class PersonController extends Controller
{
    /**
     * Exibe uma lista de registros referentes 
     * ao recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Person::orderBy('id', 'desc');
        return new PersonCollection($categories->paginate());
    }

    /**
     * Exibe o formulário de criação do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Armazena o recurso criado.
     *
     * @param  \Athenas\Http\Requests\PersonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $request)
    {
        $person = (new Person)->fill($request->all());
        $person->save();

        return response()->json([
            'message' => 'Categoria ' . $person->name . ' cadastrada com sucesso!', 
            'resource' => new PersonResource($person)
        ], 201);
    }

    /**
     * Exibe o recurso.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return new PersonResource($person);
    }

    /**
     * Exibe o formulário de edição do recurso.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Edita o recurso especificado na base de dados.
     *
     * @param  \Athenas\Http\Requests\PersonRequest  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(PersonRequest $request, Person $person)
    {
        $person->fill($request->all());
        $person->update();

        return response()->json([
            'message' => 'Categoria ' . $person->name . ' alterada com sucesso!', 
            'resource' => new PersonResource($person)
        ], 200);
    }

    /**
     * Remove o recurso especificado
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $person->delete();

        return response()->json([
            'message' => 'Categoria ' . $person->name . ' removida com sucesso!', 
        ], 200);
    }
}
