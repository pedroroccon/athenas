@extends('athenas.layouts.app')
@section('title', 'Pessoas')
@section('content')

    <div class="bg-light">
        <div class="container-fluid border-top border-bottom py-4 mb-4">
            <h1 class="h3 d-block m-0">Pessoas</h1>
        </div>
    </div>

    <div class="container-fluid">
        <people-list>
    </div>
@endsection