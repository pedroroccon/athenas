<?php

namespace Athenas\Http\Controllers;

use App\Http\Controllers\Controller;
use Athenas\Models\Category;
use Athenas\Http\Resources\CategoryCollection;
use Athenas\Http\Resources\CategoryResource;
use Athenas\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Exibe uma lista de registros referentes 
     * ao recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc');
        return new CategoryCollection($categories->get());
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
     * @param  \Athenas\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = (new Category)->fill($request->all());
        $category->save();

        return response()->json([
            'message' => 'Categoria ' . $category->name . ' cadastrada com sucesso!', 
            'resource' => new CategoryResource($category)
        ], 201);
    }

    /**
     * Exibe o recurso.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Exibe o formulário de edição do recurso.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Edita o recurso especificado na base de dados.
     *
     * @param  \Athenas\Http\Requests\CategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->update();

        return response()->json([
            'message' => 'Categoria ' . $category->name . ' alterada com sucesso!', 
            'resource' => new CategoryResource($category)
        ], 200);
    }

    /**
     * Remove o recurso especificado
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'message' => 'Categoria ' . $category->name . ' removida com sucesso!', 
        ], 200);
    }
}
