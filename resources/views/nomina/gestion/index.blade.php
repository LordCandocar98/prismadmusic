@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('nomina.index') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Gestion de Nomina</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-university" aria-hidden="true"></i>
        Gestión de Nomina
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
                                <th class="text-center">Nombres y Apellidos</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Numero Telefonico</th>
                                <th class="text-center">Numero de cuenta</th>
                                <th class="text-center">Nombre Banco</th>
                                <th class="text-center">Tipo Cuenta</th>
                                <th class="text-center">Valor</th>
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
                                <td class="text-center">{{ $nomina->numero_cuenta }}</td>
                                <td class="text-center">{{ $nomina->nombre_banco }}</td>
                                <td class="text-center">{{ $nomina->tipo_cuenta }}</td>
                                <td class="text-center">USD {{ $nomina->valor }}</td>
                                <td class="text-center">
                                    @if ($nomina->desprendible == "")
                                    <a href="{{ url('nomina/'.$nomina->id) }}" title="Editar" class="btn btn-sm btn-primary pull-right edit">
                                        <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Cargar</span>
                                    </a>
                                    @else
                                    <a href="{{ url('storage/'.$nomina->desprendible) }}" title="Ver" target="_blank" class="btn btn-sm btn-warning pull-right view">
                                        <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Ver</span>
                                    </a>
                                    @endif
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
