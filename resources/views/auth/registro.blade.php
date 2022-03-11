@extends('voyager::auth.master')
@section('pre_css')
<style>
    body.login .login-container {
        position: absolute;
        z-index: 50;
        width: 100%;
        padding: 30px;
        top: 0;
        margin-top: 50px;
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
    <p>Registro de usuario</p>
    <form action="{{ route('register') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group form-group-default" id="nameGroup">
            <label>Nombre de usuario</label>
            <div class="controls">
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre de usuario"
                    class="form-control">
            </div>
        </div>
        <div class="form-group form-group-default" id="emailGroup">
            <label>Correo Electrónico</label>
            <div class="controls">
                <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Correo Electrónico"
                    class="form-control">
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-around">
                <div class="form-group form-group-default col-md-6" id="passwordGroup">
                    <div class="controls">
                        <label>Contraseña</label>
                        <input type="password" name="password" placeholder="Contraseña" class="form-control">
                    </div>
                </div>
                <div class="form-group form-group-default col-md-6" id="passwordGroup">
                    <div class="controls">
                        <label>Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña"
                            class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="g-recaptcha col-center" data-sitekey="{{ config('services.recaptcha.key') }}"></div>
        @if (Session::has('g-recaptcha-response'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
            {{ Session::get('g-recaptcha-response') }}
        </p>
        @endif
        <br />
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-center">
                    <button type="submit" class="btn btn-block login-button">
                        <span class="signin">Registrarme</span>
                    </button>
                </div>
                <div class="col-md-6 col-center">
                    <a class="btn btn-block" href="{{ url('/login') }}" role="button">¿Ya tienes cuenta?</a>
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
</div> <!-- .login-container -->
@endsection

@section('post_js')

<script>

</script>
@endsection
