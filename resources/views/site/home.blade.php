@extends('site.master')

@section('contenido')
    <section class="section swiper-container swiper-slider swiper-slider-2" data-loop="false" data-autoplay="false"
        data-simulate-touch="false" data-slide-effect="fade">
        <div class="swiper-wrapper">
            <div class="swiper-slide context-dark" data-slide-bg="{{ asset('logo.jpg') }}">
                <div class="swiper-slide-caption">
                    <div class="container">
                        <div class="row justify-content-lg-left">
                            <div class="col-md-12 col-xl-10">
                                <h1 data-caption-animate="fadeInUp" data-caption-delay="100">Prismad Music - WEB</h1><a
                                    class="button button-lg button-primary" href="about.html" data-caption-animate="fadeInUp"
                                    data-caption-delay="450">Envíanos tu canción</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-meta">
            <ul class="links">
                <li><a class="icon icon-meta mdi mdi-facebook" href="https://web.facebook.com/PRISMADMUSIC"
                        target="_blank"></a></li>
                <li><a class="icon icon-meta mdi mdi-twitter" href="#" target="_blank"></a></li>
                <li><a class="icon icon-meta mdi mdi-instagram" href="https://www.instagram.com/prismadmusic/"
                        target="_blank"></a></li>
                <li><a class="icon icon-meta mdi mdi-facebook-messenger"
                        href="https://web.facebook.com/messages/t/231338047199947" target="_blank"></a></li>
                <!-- <li><a class="icon icon-meta mdi mdi-linkedin" href="#" target="_blank"></a></li>
          <li><a class="icon icon-meta mdi mdi-snapchat" href="#" target="_blank"></a></li> -->
            </ul>
        </div>
    </section>
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
            <p>Nuestro sello busca plenitud de información.<br class="d-none d-lg-block">Algunas noticias prismad
                management.</p>
            <div class="row row-30 row-offset-4 text-left">
                <div class="col-md-6 col-lg-4 wow fadeInRight">
                    <article class="post-boxed">
                        <div class="post-meta">
                            <div class="post-meta-item">
                                <div class="post-author"><span>by</span> <a href="#">Dennis Fernando</a>
                                </div>
                            </div>
                            {{-- <div class="post-meta-item">
            <div class="post-date">07:00am – 10:00am</div>
          </div> --}}
                        </div><a class="media-wrapper" href=""><img src="{{ asset('napster.jpg') }}" alt="" width="370"
                                height="272" /></a>
                        <div class="post-body">
                            <ul class="list-tags">
                                <li><a class="tag-1" href="">Nuevo</a>
                                </li>
                            </ul>
                            <h6 class="post-title"><a href="#">PRISMAD MUSIC Y NAPSTER</a></h6>
                            <p class="post-exeption">Prismad music Firma convenio con NAPSTER para dar visibilidad a los
                                artistas en mas de 7 playlist dentro de la compañia para COLOMBIA.</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInRight" data-wow-delay="0.1s">
                    <article class="post-boxed">
                        <div class="post-meta">
                            <div class="post-meta-item">
                                <div class="post-author"><span>by</span> <a href="#">Dennis Fernando</a>
                                </div>
                            </div>
                            {{-- <div class="post-meta-item">
            <div class="post-date">07:00am – 10:00am</div>
          </div> --}}
                        </div><a class="media-wrapper" href=""><img src="{{ asset('napster.jpg') }}" alt="" width="370"
                                height="272" /></a>
                        <div class="post-body">
                            <ul class="list-tags">
                                <li><a class="tag-1" href="">Nuevo</a>
                                </li>
                            </ul>
                            <h6 class="post-title"><a href="#">PRISMAD MUSIC Y NAPSTER</a></h6>
                            <p class="post-exeption">Prismad music Firma convenio con NAPSTER para dar visibilidad a los
                                artistas en mas de 7 playlist dentro de la compañia para COLOMBIA.</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInRight" data-wow-delay="0.2s">
                    <article class="post-boxed">
                        <div class="post-meta">
                            <div class="post-meta-item">
                                <div class="post-author"><span>by</span> <a href="#">Dennis Fernando</a>
                                </div>
                            </div>
                            {{-- <div class="post-meta-item">
            <div class="post-date">07:00am – 10:00am</div>
          </div> --}}
                        </div><a class="media-wrapper" href=""><img src="{{ asset('napster.jpg') }}" alt="" width="370"
                                height="272" /></a>
                        <div class="post-body">
                            <ul class="list-tags">
                                <li><a class="tag-1" href="">Nuevo</a>
                                </li>
                            </ul>
                            <h6 class="post-title"><a href="#">PRISMAD MUSIC Y NAPSTER</a></h6>
                            <p class="post-exeption">Prismad music Firma convenio con NAPSTER para dar visibilidad a los
                                artistas en mas de 7 playlist dentro de la compañia para COLOMBIA.</p>
                        </div>
                    </article>
                </div>
            </div>
            <div class="button-wrap-lg"><a class="button button-lg button-primary" href="#">Ver más noticias</a></div>
        </div>
    </section>
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
