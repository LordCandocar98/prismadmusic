@extends('site.master')

@section('contenido')
<section class="section section-lg bg-gray-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body" style="font-family: Arial, sans-serif;">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p class="card-text">{{ $post->excerpt }}</p>

                        <div>{!! $post->body !!}</div>

                        <p class="card-text"><small class="text-muted">Fecha actualización: {{ $post->updated_at }}</small></p>
                    </div>
                    <div class="card-footer" style="display: flex; justify-content: center;">
                        <a href="{{ route('post.index') }}" class="btn btn-secondary">Ver más noticias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Etiquetas SEO -->
@section('meta')
<meta name="description" content="{{ $post->meta_description }}">
<meta name="keywords" content="{{ $post->meta_keywords }}">
<title>{{ $post->seo_title ?? $post->title }}</title>
@endsection
@endsection
