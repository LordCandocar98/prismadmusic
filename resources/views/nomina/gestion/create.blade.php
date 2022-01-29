@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('nomina.index') }}"><i class="fa fa-university" aria-hidden="true"></i></i> Gestion de Nominas</a>
    </li>
    <li class="active">
        <a href="{{ route('nomina.create') }}"><i class="voyager-plus" aria-hidden="true"></i></i> Crear Nomina</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-plus" aria-hidden="true"></i>
        Crear Nomina
    </h1>
@endsection
@section('content')
@endsection