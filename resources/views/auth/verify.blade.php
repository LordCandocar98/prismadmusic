@extends('registro.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu dirección de Correo Electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Una solicitud de verificación ha sido enviada a tu dirección de correo electrónico.') }}
                        </div>
                    @endif

                    {{ __('Para continuar, por favor verifica tu correo por el link de activación.') }}
                    {{ __('Si no recibiste el email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Click aquí para re-enviar') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
