@extends('layouts.master')

@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('gestionClientes') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Gestion de
            Clientes</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
        Gestion de Clientes
    </h1>
    <a href="#" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>Crear</span>
    </a>
    <a class="btn btn-danger" id="borradoMasivo" name="borradoMasivo"><i class="voyager-trash"></i> <span>Borrado
            masivo</span></a>
@endsection
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-10 col-md-offset-1">
                <div class="table-responsive">
                    <table id="dataTableClientes" name="dataTableClientes" class="display" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr role="row">
                                <th>N°</th>
                                <th>Nombres y Apellidos</th>
                                <th>Correo</th>
                                <th>Avatar</th>
                                <th>Estado del registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $usuario)
                                <tr role="row">
                                    <td></td>
                                    <td>{{ $usuario->nombre . ' ' . $usuario->apellido }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td><img src="{{ asset('storage/' . $usuario->avatar) }}" style="width:100px"></td>
                                    <td><span
                                            class="label label-primary">{{ $usuario->registro_confirmed == 0 ? 'Incompleto' : 'Completado' }}</span>
                                    </td>
                                    <td>
                                        <a href="javascript:;" title="Borrar"
                                            class="btn btn-sm btn-danger pull-right delete" data-id="18" id="delete-18">
                                            <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Borrar</span>
                                        </a>
                                        <a href="http://127.0.0.1:8000/admin/users/14/edit" title="Editar"
                                            class="btn btn-sm btn-primary pull-right edit">
                                            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Editar</span>
                                        </a>
                                        <a href="http://127.0.0.1:8000/admin/users/14" title="Ver"
                                            class="btn btn-sm btn-warning pull-right view">
                                            <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Ver</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr role="row">
                                <th></th>
                                <th>Nombres y Apellidos</th>
                                <th>Correo</th>
                                <th>Avatar</th>
                                <th>Estado del registro</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/jsGestionClientes/scriptIndexGestionClientes.js') }}"></script>C:\laragon\www\prismad_music\public\js\jsGestionClientes
@endsection
