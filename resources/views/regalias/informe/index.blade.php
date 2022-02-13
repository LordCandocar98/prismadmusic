@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('informeRegalias.index') }}"><i class="voyager-wallet" aria-hidden="true"></i> Informe de Regalias</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-wallet" aria-hidden="true"></i>
        Informa de Regalias
    </h1>
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
                                <td class="text-center">{{ $regalia->valor }}</td>
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
