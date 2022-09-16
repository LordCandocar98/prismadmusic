@extends('layouts.master')

@section('addBreadcrumbs')
    <li class="active">
        <i class="fa fa-bar-chart" aria-hidden="true"></i> Historico Colaboraciones
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-bar-chart" aria-hidden="true"></i>
        Historico Colaboraciones
    </h1>
@endsection
@section('content')
    <div class="col-md-12">  
        <div class="panel panel-bordered"> 
            <div class="panel-body">
                <fieldset>
                    <legend><i class="fa fa-smile-o" aria-hidden="true"></i> Información de Cliente</legend>
                    <div class="form-group  col-md-6 ">
                        <label for="idCliente">Cliente</label>
                        <select class="cliente col-md-12" name="idCliente" id="idCliente" disabled>
                            <option value="{{ $user->id }}" selected>
                                {{ $user->numero_identificacion . ' - ' . $user->nombre_completo }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group  col-md-6 ">
                        <label class="control-label" for="correo">Correo</label>
                        <input type="text" name="correo" id="correo" class="valor form-control" step="any" value="{{ $user->email }}" readonly/>
                    </div>
                </fieldset>
            </div>
        </section>
    </div>
    <div class="col-md-12">  
        <div class="panel panel-bordered"> 
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="tablaCanciones" name="tablaCanciones" class="dataTables_wrapper form-inline dt-bootstrap no-footer table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Título</th>
                                <th class="text-center">Año</th>
                                <th class="text-center">Fecha de salida</th>
                                <th class="text-center">Enlace</th>
                                <th class="text-center">Participación</th>
                                <th class="text-center">Accion</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js\jsHistoricoCancion\scriptIndexHistoricoCancion.js') }}"></script>
@endsection
