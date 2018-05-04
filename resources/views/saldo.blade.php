@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Consulta de Saldo: </div>
                <div class="card-body">
                    <div class="panel-body">
                        <div class="title m-b-md">
                        Su saldo en su cuenta es de :
                        </div>
                        <div class="panel-heading">
                            Q {{Auth::user()->balance}}
                        </div>                        
                    </div>             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
