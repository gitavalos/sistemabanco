@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Transferencia de Saldo: </div>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif                

<div class="card-body">
    <form method="POST" action="{{ route('realizartransferencia') }}">
        @csrf
        <div class="form-group row">
            <label for="countnumber" class="col-sm-4 col-form-label text-md-right">{{ __('Numero de Cuenta') }}</label>
            <div class="col-md-6">
                <input id="countnumber" type="text" class="form-control{{ $errors->has('countnumber') ? ' is-invalid' : '' }}" name="countnumber" value="{{ old('countnumber') }}" required autofocus>
                @if ($errors->has('countnumber'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('countnumber') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="cantidad" class="col-sm-4 col-form-label text-md-right">{{ __('Cantidad') }}</label>
            <div class="col-md-6">
                <input id="cantidad" type="text" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" name="cantidad" value="{{ old('cantidad') }}" required autofocus>
                @if ($errors->has('cantidad'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('cantidad') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button id="transferencia" type="submit" class="btn btn-primary">
                    {{ __('Realizar Transferencia') }}
                </button>
            </div>
        </div>
    </form>
</div>


            </div>
        </div>
    </div>
</div>
@endsection
