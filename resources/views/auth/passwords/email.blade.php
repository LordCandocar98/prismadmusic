@extends('voyager::auth.master')
@section('pre_css')
<style>
        body.login .login-container {
            position: absolute;
            z-index: 10;
            width: 100%;
            padding: 30px;
            top: 0;
            margin-top: 70px;
        }
</style>
@endsection
@section('content')
<div class="login-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cambio de Contraseña</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group" id="resetPassword">
                            <div class="container">
                                <div class="row">
                                    <div class="form-group form-group-default col-md-12">
                                        <label for="email" class="col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback alert alert-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="envioResetPassword">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-block" href={{ url("/login") }} role="button"><i class="fa fa-reply" aria-hidden="true"> volver</i></a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            Enviar Correo
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection