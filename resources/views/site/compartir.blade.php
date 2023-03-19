@extends('site.master')
<style>
    span.form-validation {
        font-size: 11px;
    }

    .alert-success, .alert-success h4 {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        padding: .75rem 1.25rem;
    }

</style>
@section('contenido')

@include('site.section.banner1')

    <!-- Join Our Team-->
    <section class="section section-lg custom-image-section">
        <div class="container relative-container">
            @include('partials.message')
            @include('partials.error')
            <div class="row row-30 row-md-60 justify-content-between">
                <div class="col-md-6">
                    <h2>Envíanos tu canción</h2>
                    <div class="heading-6">Desde prismad music buscamos relacionarnos de la mejor forma con la música,
                        por ello es posible que nos hagas una muestra de tu perfil de música con tus datos artísticos, así
                        nos comunicaremos contigo lo más pronto posible.
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <form class="rd-form" method="post" action="/compartir-musica">
                        {{ csrf_field() }}
                        <div class="form-wrap border {{ $errors->has('nombre_artista') ? 'has-error' : '' }}">
                            <input class="form-input" type="text" name="nombre_artista" id="nombre_artista"
                                value="{{ old('nombre_artista') }}">
                            @if ($errors->has('nombre_artista'))
                                <span class="form-validation">{{ $errors->first('nombre_artista') }}</span>
                            @endif
                            <label class="form-label rd-input-label" for="nombre_artista">Nombre artistico</label>
                        </div>
                        <div class="form-wrap border {{ $errors->has('link_spotify') ? 'has-error' : '' }}">
                            <input class="form-input" type="text" name="link_spotify" id="link_spotify"
                            value="{{ old('link_spotify') }}">
                            @if ($errors->has('link_spotify'))
                                <span class="form-validation">{{ $errors->first('link_spotify') }}</span>
                            @endif
                            <label class="form-label rd-input-label" for="link_spotify">Link Spotify</label>
                        </div>
                        <div class="form-wrap border {{ $errors->has('num_celular') ? 'has-error' : '' }}">
                            <input class="form-input" type="number" name="num_celular" id="num_celular"
                            value="{{ old('num_celular') }}">
                            @if ($errors->has('num_celular'))
                                <span class="form-validation">{{ $errors->first('num_celular') }}</span>
                            @endif
                            <label class="form-label rd-input-label" for="num_celular">Número de télefono o celular</label>
                        </div>
                        <div class="form-wrap border {{ $errors->has('email') ? 'has-error' : '' }}">
                            <input class="form-input form-control-has-validation" id="email" type="email" name="email"
                            value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="form-validation">{{ $errors->first('email') }}</span>
                            @endif
                            <label class="form-label rd-input-label" for="email">Correo electronico</label>
                        </div>
                        <div class="form-wrap border {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                            <label class="form-label rd-input-label" for="descripcion">Describa brevemente sus
                                expectativas</label>
                            <textarea class="form-input form-control-has-validation form-control-last-child"
                                id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
                            @if ($errors->has('descripcion'))
                                <span class="form-validation">{{ $errors->first('descripcion') }}</span>
                            @endif
                        </div>
                        <button class="button button-primary" type="submit">Enviar canción</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
