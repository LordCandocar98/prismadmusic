@extends('site.master')

@section('contenido')
<section class="section section-lg bg-gray-100">
    <div class="container text-center">
        <h2>Noticias Prismad editorial digital</h2>

        <div class="row row-30 row-offset-4 text-left">
            @foreach($posts as $post)
            <div class="col-md-6 col-lg-4 wow fadeInRight" data-wow-delay="{{ $loop->iteration * 0.1 }}s">
                <article class="post-boxed" style="height: 100%;">
                    <div class="post-meta">
                        <div class="post-meta-item">
                            <div class="post-author"><span>by</span> <span style="font-weight: bold";>{{ $post->author ?? 'Prismad Music' }}</span></div>
                        </div>
                    </div>
                    <a class="media-wrapper" href="{{ route('post.show', $post->slug) }}"><img src="{{ asset('storage/' . $post->image) }}" alt="" width="370" height="272" /></a>
                    <div class="post-body">
                        <h6 class="post-title"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h6>
                        <p class="post-exeption">{{ Str::limit($post->excerpt, 200) }}</p>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
        <div class="pagination justify-content-center mt-5">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection
