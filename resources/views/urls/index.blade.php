@extends('layouts.app')

@section('title', 'Dashboard - Acortador de URLs')

@section('content')

    @include('partials.alerts') 

    <div class="container">
        <h1>Acortador de URLs</h1>
            @include('partials.create-form')
        <h1>Buscar URL por código corto</h1>
            @include('partials.search-form')
    </div>

    @include('partials.table')
    <div class="pagination">
        {{ $urls->links() }}
    </div>
 
@endsection
