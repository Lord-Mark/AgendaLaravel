{{-- resources/views/contacts/show.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>{{ __($contact->name) }}</b></div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="phone"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->phone }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->zip_code }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Rua') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->street }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="st_number"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Número') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->st_number }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="complement"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Complemento') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->complement }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="neighborhood"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Bairro') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->neighborhood }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->city }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->state }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="note" class="col-md-4 col-form-label text-md-right">{{ __('Nota') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->note }}</p>
                            </div>
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('contacts.edit', ['contact' => $contact->id]) }}"
                               class="btn btn-sm btn-outline-primary">Editar</a>
                            <form method="POST"
                                  action="{{ route('contacts.destroy', ['contact' => $contact->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Tem certeza que deseja deletar este contato?')">
                                    Deletar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
