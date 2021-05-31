@extends('athenas.layouts.app')
@section('title', 'Introdução')
@section('content')

    <div class="bg-light">
        <div class="container-fluid border-top border-bottom py-4 mb-4">
            <h1 class="h3 d-block m-0">Introdução</h1>
        </div>
    </div>

    <div class="container">
        <p>A ideia deste projeto é ilustrar um CRUD (Create, Read, Update, Delete) básico, utilizando o VueJS para consumir uma API. O projeto foi separado em duas partes. Uma delas é responsável pelo backend da aplicação, e toda a gestão da API. A outra parte é responsável por obter as informações da API, e então exibir as informações para o cliente.</p>

        <p>A pasta <strong>/athenas</strong> localizada dentro da aplicação, é responsável por todas as regras de negócio relacionadas a API.</p>

        <p>Na pasta <strong>/resources</strong>, nós temos as regras de negócio relacionadas ao frontend.</p>
    </div>
@endsection