<?php

/**
 * Arquivo responsável pelo gerenciamento 
 * das rotas dedicadas a API dos recursos.
 *
 */

Route::prefix(config('athenas.path'))->middleware('web')->name('athenas.')->group(function() {
    Route::apiResource('api/category', 'Athenas\Http\Controllers\CategoryController');
    Route::apiResource('api/person', 'Athenas\Http\Controllers\PersonController');
});