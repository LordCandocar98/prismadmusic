@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('nomina.index') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Gestion de Regalias</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-university" aria-hidden="true"></i>
        Gestion de Nomina
    </h1>
    <a href="{{ route('nomina.create') }}" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>Crear</span>
    </a>
    <a class="btn btn-danger" id="borradoMasivo" name="borradoMasivo"><i class="voyager-trash"></i> <span>Borrado masivo</span></a>
@endsection
@section('content')
    <div class="col-md-12">  
        <div class="panel panel-bordered"> 
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="dataTableNomina" name="dataTableNomina" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">N°</th>
                                <th class="text-center">Nombres y Apellidos</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Numero Telefonico</th>
                                <th class="text-center">Nombre Artistico</th>

                                <th class="text-center">Acciones</th> 
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($nominas as $nomina)
                        <tr role="row">
                                <td class="text-center"></td>
                                <td class="text-center">{{ $nomina->nombre.' '.$nomina->apellido }}</td>
                                <td class="text-center">{{ $nomina->email }}</td>
                                <td class="text-center">{{ $nomina->telefono }}</td>
                                <td class="text-center">{{ $nomina->nombre_artistico }}</td>
                                <td class="text-center">
                                    <a href="javascript:;" title="Borrar" class="btn btn-sm btn-danger pull-right delete" data-id="18" id="delete-18">
                                        <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Borrar</span>
                                    </a>
                                    <a href="{{ url('nomina/'.$nomina->id) }}" title="Editar" class="btn btn-sm btn-primary pull-right edit">
                                        <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Cargar</span>
                                    </a>
                                    <a href="{{ url('Storage/'.$nomina->desprendible) }}" title="Ver" target="_blank" class="btn btn-sm btn-warning pull-right view">
                                        <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Ver</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/jsNomina/gestion/scriptIndex.js') }}"></script>
@endsection
