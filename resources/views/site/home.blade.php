@extends('site.master')

@section('contenido')

@include('site.section.banner1')
@include('site.section.banner2')
@include('site.section.banner3')
<!--Player-->
{{-- <section class="section section-xs bg-primary-gradient wave-pattern">
        <div class="container">
            <div class="shell">
                <div class="range range-xs-center">
                    <div class="col-lg-12">
                        <div class="jp-player-init">
                            <div class="jp-jplayer"></div>
                            <div class="jp-audio jp-audio-7" role="application" aria-label="media player">
                                <ul class="jp-player-list">
                                    <li class="jp-player-list-item" data-jp-title="The Stark Palace - "
                                        data-jp-artist="CroMagnon Man"
                                        data-jp-mp3="http://www.jplayer.org/audio/mp3/TSP-01-Cro_magnon_man.mp3"></li>
                                </ul>
                                <div class="jp-interface">
                                    <div class="jp-button jp-playpaus-button">
                                        <button class="jp-btn jp-play" role="button" tabindex="7">play</button>
                                    </div>
                                    <div class="jp-time-rail">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div class="jp-play-bar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jp-button jp-volume-button">
                                        <button class="jp-btn jp-mute" role="button" tabindex="7">max volume</button>
                                    </div>
                                    <div class="jp-volume-bar">
                                        <div class="jp-volume-bar-value"></div>
                                    </div>
                                </div>
                                <div class="jp-playlist">
                                    <div class="playlist-in">
                                        <ul>
                                            <li> </li>
                                        </ul>
                                        <div class="jp-current-time"></div>
                                        <div class="jp-no-solution"><span>Update Required</span> To play the media you will
                                            need to either update your browser to a recent version or update your<a
                                                href="http://get.adobe.com/flashplayer/" target="_blank"> Flash plugin</a>.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
<!--	Schedule of Radio Shows-->
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

        <div class="button-wrap-lg"><a class="button button-lg button-primary" href="{{ route('post.index') }}">Ver más noticias</a></div>
    </div>
</section>

@include('site.section.banner4')

<!-- Call to action-->
<section class="section section-xs bg-primary-gradient">
    <div class="container">
        <div class="box-cta">
            <div class="box-cta-inner">
                <h3>Escucha nuestras Playlist</h3>
            </div>
            <div class="box-cta-inner"><a class="button button-md button-white" href="">Escucha en linea</a></div>
        </div>
    </div>
</section>

@endsection
