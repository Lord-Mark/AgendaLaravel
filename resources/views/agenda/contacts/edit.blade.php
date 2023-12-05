@extends('layouts.app')
@extends('layouts.form')

@section('content')

    <form action="{{route('contacts.update', ['contact' => $contact->id])}}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Nome do contato</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="@if(old('name')) {{old('name')}} @else {{$contact->name}} @endif">
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label>Telefone</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                   value="@if(old('phone')) {{old('phone')}} @else {{$contact->phone}} @endif">
            @error('phone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="@if(old('email')) {{old('email')}} @else {{$contact->email}} @endif">
            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>CEP</label>
            <input type="text" name="zip_code" id="zip_code" class="form-control @error('zip_code') is-invalid @enderror"
                   value="@if(old('zip_code')) {{old('zip_code')}} @else {{$contact->zip_code}} @endif">
            @error('zip_code')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Rua</label>
            <input type="text" name="street" id="street" class="form-control @error('street') is-invalid @enderror"
                   value="@if(old('street')) {{old('street')}} @else {{$contact->street}} @endif">
            @error('street')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Número</label>
            <input type="text" name="st_number" id="st_number" class="form-control @error('st_number') is-invalid @enderror"
                   value="@if(old('st_number')) {{old('st_number')}} @else {{$contact->st_number}} @endif">
            @error('st_number')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Complemento</label>
            <input type="text" name="complement" id="complement" class="form-control @error('complement') is-invalid @enderror"
                   value="@if(old('complement')) {{old('complement')}} @else {{$contact->complement}} @endif">
            @error('complement')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Bairro</label>
            <input type="text" name="neighborhood" id="neighborhood" class="form-control @error('neighborhood') is-invalid @enderror"
                   value="@if(old('neighborhood')) {{old('neighborhood')}} @else {{$contact->neighborhood}} @endif">
            @error('neighborhood')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Cidade</label>
            <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror"
                   value="@if(old('city')) {{old('city')}} @else {{$contact->city}} @endif">
            @error('city')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Estado (UF)</label>
            <input type="text" name="state" id="state" class="form-control @error('state') is-invalid @enderror"
                   value="@if(old('state')) {{old('state')}} @else {{$contact->state}} @endif">
            @error('state')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Nota</label>
            <input type="text" name="note" class="form-control @error('note') is-invalid @enderror"
                   value="@if(old('note')) {{old('note')}} @else {{$contact->note}} @endif">
            @error('note')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label></label>
            <button type="submit" class="btn btn-success btn-lg form-control">Editar Contato</button>
        </div>
    </form>

@endsection
