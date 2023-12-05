@extends('layouts.app')
@extends('layouts.form')

@section('content')

    <form action="{{route('contacts.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nome do contato</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{old('name')}}">
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label>Telefone</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                   value="{{old('phone')}}">
            @error('phone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{old('email')}}">
            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>CEP</label>
            <input type="text" name="zip_code" id="zip_code"
                   class="form-control @error('zip_code') is-invalid @enderror" value="{{old('zip_code')}}">
            @error('zip_code')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Rua</label>
            <input type="text" name="street" id="street" class="form-control @error('street') is-invalid @enderror"
                   value="{{old('street')}}">
            @error('street')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Número</label>
            <input type="text" name="st_number" id="st_number"
                   class="form-control @error('st_number') is-invalid @enderror" value="{{old('st_number')}}">
            @error('st_number')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Complemento</label>
            <input type="text" name="complement" id="complement"
                   class="form-control @error('complement') is-invalid @enderror" value="{{old('complement')}}">
            @error('complement')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Bairro</label>
            <input type="text" name="neighborhood" id="neighborhood"
                   class="form-control @error('neighborhood') is-invalid @enderror" value="{{old('neighborhood')}}">
            @error('neighborhood')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Cidade</label>
            <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror"
                   value="{{old('city')}}">
            @error('city')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Estado (UF)</label>
            <input type="text" name="state" id="state" class="form-control @error('state') is-invalid @enderror"
                   value="{{old('state')}}">
            @error('state')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Nota</label>
            <input type="text" name="note" class="form-control @error('note') is-invalid @enderror"
                   value="{{old('note')}}">
            @error('note')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label></label>
            <button type="submit" class="btn btn-success btn-lg form-control">Criar Contato</button>
        </div>
    </form>

@endsection
