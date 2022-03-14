@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('informeNomina.index') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Informe de Nomina</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-university" aria-hidden="true"></i>
        Informe de Nomina
    </h1>
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
                                <th class="text-center">Fecha Informe</th>
                                <th class="text-center">Banco</th>
                                <th class="text-center">Numero de cuenta Bancaria</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Acciones</th> 
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($nominas as $nomina)
                        <tr role="row">
                                <td class="text-center"></td>
                                <td class="text-center">{{ $nomina->fecha_informe }}</td>
                                <td class="text-center">{{ $nomina->nombre_banco}}</td>
                                <td class="text-center">{{ $nomina->numero_cuenta_bancaria }}</td>
                                <td class="text-center">{{ $nomina->valor }}</td>
                                <td class="text-center">
                                    <a href="{{ url('storage/'.$nomina->desprendible) }}" title="Ver" target="_blank" class="btn btn-sm btn-warning pull-right view">
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
