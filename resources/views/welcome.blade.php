{{-- resources/views/home.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="jumbotron text-center">
            <h1 class="display-4">Bem-vindo à Agenda de Contatos</h1>
            <p class="lead">Gerencie seus contatos de forma fácil e rápida.</p>
            <hr class="my-4">
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Entrar na sua conta</a>
                <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Registrar uma nova conta</a>
            </p>
        </div>
    </div>
@endsection
