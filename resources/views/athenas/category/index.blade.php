@extends('athenas.layouts.app')
@section('title', 'Categorias')
@section('content')

    <div class="bg-light">
        <div class="container-fluid border-top border-bottom py-4 mb-4">
            <h1 class="h3 d-block m-0">Categorias</h1>
        </div>
    </div>

    <div class="container-fluid">
        <categories-list>
    </div>
@endsection