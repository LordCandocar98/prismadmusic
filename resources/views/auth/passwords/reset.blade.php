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
        }

    </style>
@endsection
@section('content')
    <div class="login-container">
        <p>Restablecer Contraseña</p>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group form-group-default" id="emailGroup">
                <label>{{ __('Dirección E-Mail') }}</label>
                <div class="controls">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                        placeholder="{{ __('voyager::generic.email') }}" value="{{ $email ?? old('email') }}" required
                        autocomplete="email" autofocus>
                </div>
            </div>

            <div class="form-group form-group-default" id="passwordGroup">
                <label>{{ __('Password') }}</label>
                <div class="controls">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Password">
                </div>
            </div>

            <div class="form-group form-group-default" id="passwordGroup2">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <div class="controls">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Confirm Password">
                </div>
            </div>

            <div class="form-group">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-center">
                            <button type="button" class="btn btn-block btn-info"
                                onclick="window.location.href='{{ url('/login') }}';" role="button"><i
                                    class="fa fa-reply" aria-hidden="true"> Volver</i></button>
                        </div>
                        <div class="col-md-6 col-center">
                            <button type="submit" class="btn btn-block btn-primary">
                                {{ __('Restablecer Contraseña') }}
                        </div>
                        </button>
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
