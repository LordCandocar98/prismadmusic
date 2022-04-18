@extends('voyager::auth.master')
@section('pre_css')
    <style>
        body,
        html,
        .form-control {
            color: #1e1f20 !important;
        }

        body.login .login-container {
            position: absolute;
            z-index: 10;
            width: 100%;
            padding: 30px;
            top: 0;
            margin-top: 45px;
        }

        .col-center {
            margin-bottom: 0 !important;
            text-align: center;
            justify-content: center;
            align-items: center;
            display: flex;
        }

    </style>
@endsection
@section('content')
    <div class="login-container">
        <p>Cambio de Contraseña</p>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group form-group-default">
                <label>{{ __('Confirmar Email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Confirmar Email">
            </div>
            <div class="form-group">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-center">
                            <button type="button" class="btn btn-block btn-info" onclick="window.location.href='{{ url('/login') }}';" role="button"><i class="fa fa-reply"
                                    aria-hidden="true"> volver</i></button>
                        </div>
                        <div class="col-md-6 col-center">
                            <button type="submit" class="btn btn-block btn-primary">
                                Enviar Correo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div style="clear:both"></div>

        @if (!$errors->isEmpty())
            <div class="alert alert-red">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
