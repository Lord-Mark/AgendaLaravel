@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if(!$contacts->isEmpty())
            <h1>Lista de Contatos</h1>
            <div class="row">
                @foreach($contacts as $contact)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a class="text-decoration-none text-dark"
                                       href="{{route('contacts.show', ['contact' => $contact->id])}}">
                                        {{$contact->name}}
                                    </a>
                                </h5>
                                <p class="card-text"><strong>Telefone:</strong> {{ $contact->phone }}</p>
                                <p class="card-text"><strong>Endereço:</strong> {{ $contact->getFormattedAddress() }}
                                </p>
                                <div class="btn-group">
                                    <a href="{{ route('contacts.edit', ['contact' => $contact->id]) }}"
                                       class="btn btn-sm btn-outline-primary d-flex align-items-center">
                                        <box-icon name='edit-alt' color='#0275d8'></box-icon>
                                        Editar
                                    </a>
                                    <form method="POST"
                                          action="{{ route('contacts.destroy', ['contact' => $contact->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger d-flex align-items-center"
                                                onclick="return confirm('Tem certeza que deseja deletar este contato?')">
                                            <box-icon name='x' color='#d9534f'></box-icon>
                                            Remover
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $contacts->links() }}
            </div>
        @else
            <h1>Nenhum contato encontrado</h1>
        @endif
    </div>
@endsection
