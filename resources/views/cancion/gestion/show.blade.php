@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('cancion.index') }}"><i class="fa fa-music" aria-hidden="true"></i> Vista general de canción</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-music" aria-hidden="true"></i>
        Vista general de canción
    </h1>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">

            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/jsRegalias/gestion/scriptIndex.js') }}"></script>
@endsection
