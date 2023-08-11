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
                            <th class="text-center">Nº</th>
                            <th class="text-center">Nombres y Apellidos</th>
                            <th class="text-center">N° Identificacion</th>
                            <th class="text-center">Valor</th>
                            <th class="text-center">Inicio</th>
                            <th class="text-center">Final</th>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">Tipo saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($regalias as $it => $regalia)
                        <tr role="row">
                            <td class="text-center">{{ $it + 1 }}</td>
                            <td class="text-center">{{ $regalia->nombre . ' ' . $regalia->apellido }}</td>
                            <td class="text-center">{{ $regalia->numero_identificacion }}</td>
                            <td class="text-center">USD {{ $regalia->valor }}</td>
                            <td class="text-center">{{ $regalia->fecha_informe_inicio }}</td>
                            <td class="text-center">{{ $regalia->fecha_informe_final }}</td>
                            <td class="text-center">
                                @if( $regalia->tipo == null)
                                @if($regalia->informe != '[]')
                                <a href="{{ url('storage/' . $regalia->informe) }}" download="{{ $regalia->informe }}" title="Ver" target="_blank" class="btn btn-sm btn-warning pull-right view">
                                    <i class="fa fa-download"></i> <span class="hidden-xs hidden-sm">Descargar</span>
                                </a>
                                @endif
                                @endif
                            </td>
                            <td class="text-center">
                                @if($regalia->nomina_id != null)
                                @else
                                {!!
                                $regalia->tipo == null?
                                '<button type="button" class="btn btn-info">Saldo</button>':
                                '<button type="button" class="btn btn-info">Sobrante</button>'
                                !!}
                                @endif
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
