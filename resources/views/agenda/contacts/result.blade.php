@extends('layouts.app')

@section('content')
    @if($contacts)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>
                        <a class="text-decoration-none text-dark"
                           href="{{route('contacts.show', ['contact' => $contact->id])}}">
                            {{$contact->name}}
                        </a>
                    </td>
                    <td>
                        {{$contact->phone}}
                    </td>
                    <td>
                        {{$contact->street}} {{$contact->st_number}} {{$contact->city}} {{$contact->state}}
                    </td>
                    <td>
                        {{$contact->email}}
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('contacts.edit', ['contact' => $contact->id])}}"
                               class="btn btn-sm btn-primary">Editar</a>
                            <form method="POST" action="{{ route('contacts.destroy', ['contact' => $contact->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Tem certeza que deseja deletar este produto?')">Deletar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
