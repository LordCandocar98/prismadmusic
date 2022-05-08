@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('regalias.index') }}"><i class="voyager-wallet" aria-hidden="true"></i> Gestion de Regalias</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-wallet" aria-hidden="true"></i>
        Gestion de Regalias
    </h1>
    <a href="{{ route('regalias.create') }}" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>Crear</span>
    </a>
    <a class="btn btn-danger" id="borradoMasivo" name="borradoMasivo"><i class="voyager-trash"></i> <span>Borrado masivo</span></a>
@endsection
@section('content')
    <div class="col-md-12">  
        <div class="panel panel-bordered"> 
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="dataTableRegalias" name="dataTableRegalias" class="dataTables_wrapper form-inline dt-bootstrap no-footer" cellspacing="0" width="100%">
                        <thead>
                            <tr role="row">
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class="text-center" COLSPAN=2>Trimestre</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th class="dt-not-orderable">
                                    <input type="checkbox" class="select_all">
                                </th>
                                <th class="text-center">Nombres y Apellidos</th>
                                <th class="text-center">N° Identificacion</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Inicio</th>
                                <th class="text-center">Final</th>
                                <th class="text-center">Pago</th>
                                <th class="text-center">Acciones</th> 
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($regalias as $regalia)
                            <tr role="row">
                                <td>
                                    <input type="checkbox" name="row_id[]" class="checkRegalia"
                                        id="checkbox_{{ $regalia->id }}" value="{{ $regalia->id }}">
                                </td>
                                <td class="text-center">{{ $regalia->nombre.' '.$regalia->apellido }}</td>
                                <td class="text-center">{{ $regalia->numero_identificacion }}</td>
                                <td class="text-center">USD {{ $regalia->valor }}</td>
                                <td class="text-center">{{ $regalia->fecha_informe_inicio }}</td>
                                <td class="text-center">{{ $regalia->fecha_informe_final }}</td>
                                <td class="text-center">
                                    {!! 
                                        $regalia->nomina_id != null?
                                            '<button type="button" class="btn btn-success">Pagado</button>':
                                            '<button type="button" class="btn btn-dark">Pendiente</button>' 
                                    !!}
                                </td>
                                <td class="text-center">
                                    <a href="javascript:;" title="Borrar" class="btn btn-sm btn-danger pull-right delete" data-id="18" id="delete-18">
                                        <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Borrar</span>
                                    </a>
                                    <a href="{{ url('regalias/'.$regalia->id) }}" title="Editar" class="btn btn-sm btn-primary pull-right edit">
                                        <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Editar</span>
                                    </a>
                                    <a href="{{ url('storage/'.$regalia->informe) }}" title="Ver" target="_blank" class="btn btn-sm btn-warning pull-right view">
                                        <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Ver</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  

@endsection

@section('javascript')
    <script src="{{ asset('js/jsRegalias/gestion/scriptIndex.js') }}"></script>
@endsection
