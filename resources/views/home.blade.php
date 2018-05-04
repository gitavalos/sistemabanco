@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido: {{Auth::user()->lastname}} {{Auth::user()->firstname}} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <div class="panel-heading">
                            Informacion de su cuenta
                        </div>
                        <table class="table table-striped task-table">
                            <thead>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nombres</td>
                                    <td>{{Auth::user()->firstname}}</td>
                                </tr>
                                <tr>
                                    <td>Apellidos</td>
                                    <td>{{Auth::user()->lastname}}</td>
                                </tr>
                                <tr>
                                    <td>Correo</td>
                                    <td>{{Auth::user()->email}}</td>
                                </tr>
                                <tr>
                                    <td>DPI</td>
                                    <td>{{Auth::user()->id}}</td>
                                </tr>
                                <tr>
                                    <td>No. de cuenta</td>
                                    <td>{{Auth::user()->countnumber}}</td>
                                </tr>                               
                            </tbody>
                        </table>
                    </div>             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
