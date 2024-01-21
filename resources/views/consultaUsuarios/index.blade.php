@extends('layouts.master')

@section('addBreadcrumbs')
    <li class="active">
        <i class="voyager-treasure" aria-hidden="true"></i> Consulta Saldos Usuarios
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-treasure" aria-hidden="true"></i>
        Consulta Saldos Usuarios
    </h1>
@endsection
@section('content')
    <div class="col-md-12">  
        <div class="panel panel-bordered"> 
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="datatable" name="datatable" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Documento identidad</th>
                                <th>Nombre y apellido</th>
                                <th>Correo</th>
                                <th>Saldo Total</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('javascript')
<script src="{{ asset('js\jsConsultaUsuarios\scriptIndexConsultaUsuarios.js') }}"></script>
@endsection
