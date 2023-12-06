{{-- resources/views/home.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="jumbotron text-center">
            <h1 class="display-4">Bem-vindo à sua Agenda de Contatos</h1>
            <p class="lead">Gerencie seus contatos de forma fácil e rápida.</p>
            <hr class="my-4">
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ route('contacts.index') }}" role="button">Ver Contatos</a>
                <a class="btn btn-success btn-lg" href="{{ route('contacts.create') }}" role="button">Adicionar Contato</a>
            </p>
        </div>
    </div>
@endsection
