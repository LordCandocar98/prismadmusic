@extends('voyager::auth.master')
@section('pre_css')
<style>
        body.login .login-container {
            position: absolute;
            z-index: 10;
            width: 100%;
            padding: 30px;
            top: 0;
            margin-top: 45px;
        }
</style>
@endsection
@section('content')
    <div class="login-container">

        <p>{{ __('voyager::login.signin_below') }}</p>

        <form action="{{ route('login') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group form-group-default" id="emailGroup">
                <label>{{ __('voyager::generic.email') }}</label>
                <div class="controls">
                    <input type="text" name="email" id="email" value="{{ old('email') }}"
                        placeholder="{{ __('voyager::generic.email') }}" class="form-control" required>
                </div>
            </div>

            <div class="form-group form-group-default" id="passwordGroup">
                <label>{{ __('voyager::generic.password') }}</label>
                <div class="controls">
                    <input type="password" name="password" placeholder="{{ __('voyager::generic.password') }}"
                        class="form-control" required>
                </div>
            </div>
            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.key') }}"></div>
            @if (Session::has('g-recaptcha-response'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                    {{ Session::get('g-recaptcha-response') }}
                </p>
            @endif
            <br />
            <div class="form-group" id="rememberMeGroup">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="checkbox" name="remember" id="remember" value="1"><label for="remember"
                                class="remember-me-text">{{ __('voyager::generic.remember_me') }}</label>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('password/reset') }}">Olvide mi contraseña.</a>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-block login-button">
                <span class="signingin hidden"><span class="voyager-refresh"></span>
                    {{ __('voyager::login.loggingin') }}...</span>
                <span class="signin">{{ __('voyager::generic.login') }}</span>
            </button>
        </form>
        <a class="btn btn-block" href="{{ url('/register') }}" role="button">Registrarme aquí</a>

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
        var btn = document.querySelector('button[type="submit"]');
        var form = document.forms[0];
        var email = document.querySelector('[name="email"]');
        var password = document.querySelector('[name="password"]');
        btn.addEventListener('click', function(ev) {
            if (form.checkValidity()) {
                btn.querySelector('.signingin').className = 'signingin';
                btn.querySelector('.signin').className = 'signin hidden';
            } else {
                ev.preventDefault();
            }
        });
        email.focus();
        document.getElementById('emailGroup').classList.add("focused");

        // Focus events for email and password fields
        email.addEventListener('focusin', function(e) {
            document.getElementById('emailGroup').classList.add("focused");
        });
        email.addEventListener('focusout', function(e) {
            document.getElementById('emailGroup').classList.remove("focused");
        });

        password.addEventListener('focusin', function(e) {
            document.getElementById('passwordGroup').classList.add("focused");
        });
        password.addEventListener('focusout', function(e) {
            document.getElementById('passwordGroup').classList.remove("focused");
        });
    </script>
@endsection