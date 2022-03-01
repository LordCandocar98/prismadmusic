<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">

<head>
    <title>Prismad Music</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:100,300,300i,400,700,900">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('onwave/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('onwave/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('onwave/css/style.css') }}" id="main-styles-link">
    <link rel="icon" href="{{ asset('logo_prismad.png') }}" type="image/x-icon">
    <!-- Hola soy candido -->
</head>

<body>
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
        </div>
    </div>
    <div class="page">
        <header class="section page-header">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-creative" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
                    data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed"
                    data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static"
                    data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static"
                    data-lg-stick-up-offset="20px" data-xl-stick-up-offset="20px" data-xxl-stick-up-offset="20px"
                    data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">
                            <!-- RD Navbar Panel-->
                            <div class="rd-navbar-panel">
                                <!-- RD Navbar Toggle-->
                                <button class="rd-navbar-toggle"
                                    data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                <!-- RD Navbar Brand-->
                                <div class="rd-navbar-brand"><a class="brand" href="{{ url('/') }}"><img
                                            src="{{ asset('logo_prismad.png') }}" class="rounded mx-auto d-block" alt=""
                                            width="80" height="22" /></a>
                                </div>
                            </div>
                            <div class="rd-navbar-main-element">
                                <div class="rd-navbar-nav-wrap">
                                    <!-- RD Navbar Nav-->
                                    <ul class="rd-navbar-nav">
                                        <li class="rd-nav-item {{ request()->routeIs('home') ? 'active' : '' }}"><a
                                                class="rd-nav-link" href="{{ url('/') }}">Home</a>
                                        </li>
                                        <li class="rd-nav-item {{ request()->routeIs('nosotros') ? 'active' : '' }}">
                                            <a class="rd-nav-link" href="{{ url('/nosotros') }}">Quienes somos</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link"
                                                href="{{ url('/login') }}">Login</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link"
                                                href="{{ url('/compartir-musica') }}">Envíanos tu canción</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- RD Navbar Search-->
                                <div class="rd-navbar-search">
                                    <button class="rd-navbar-search-toggle rd-navbar-fixed-element-1"
                                        data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                                    <form class="rd-search" action="#" method="GET">
                                        <div class="form-wrap">
                                            <label class="form-label" for="rd-navbar-search-form-input">Search</label>
                                            <input class="rd-navbar-search-form-input form-input"
                                                id="rd-navbar-search-form-input" type="text" name="s"
                                                autocomplete="off">
                                            <div class="rd-search-results-live" id="rd-search-results-live"></div>
                                        </div>
                                        <button class="rd-search-form-submit mdi mdi-magnify" type="submit"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        @yield('contenido')

        <footer class="section footer-2">
            <div class="container">
                <div class="row row-40">
                    <div class="col-md-6 col-lg-3"></div>
                    <div class="col-md-6 col-lg-3"><a class="footer-logo" href="{{ url('/') }}"><img
                                src="{{ asset('logo_prismad.png') }}" class="rounded mx-auto d-block" alt="" width="120"
                                height="auto" /></a>
                        <p>Sello discográfico.
                            Editora digital, gestión de playlist y manejo digital para artistas y productos
                            empresariales.</p>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white title">Información de contacto</h5>
                        <ul class="contact-box">
                            <li>
                                <div class="unit unit-horizontal unit-spacing-xxs">
                                    <div class="unit-left"><span class="icon mdi mdi-map-marker accent-icon"></span>
                                    </div>
                                    <div class="unit-body"><a href="#">Cll 76#12-86 oficina 204, <br
                                                class="veil reveal-lg-inline">Bogotá, Bogotá DC</a></div>
                                </div>
                            </li>
                            <li>
                                <div class="unit unit-horizontal unit-spacing-xxs">
                                    <div class="unit-left"><span class="icon mdi mdi-phone accent-icon"></span>
                                    </div>
                                    <div class="unit-body">
                                        <ul class="list-phones">
                                            <li><a href="tel:#">300 357 7830</a></li>
                                            <li><a href="tel:#">304 578 9392</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="unit unit-horizontal unit-spacing-xxs">
                                    <div class="unit-left"><span class="icon mdi mdi-email-outline accent-icon"></span>
                                    </div>
                                    <div class="unit-body"><a href="mailto:#">prismadmusic@gmail.com</a></div>
                                </div>
                            </li>
                        </ul>
                        <div class="group-md group-middle social-items">
                            <a class="icon icon-md novi-icon mdi mdi-facebook" href="https://web.facebook.com/PRISMADMUSIC" target="_blank"></a>
                            <a class="icon icon-md novi-icon mdi mdi-instagram" href="https://www.instagram.com/prismadmusic/" target="_blank"></a>
                            <a class="icon icon-md novi-icon mdi mdi-facebook-messenger" href="https://web.facebook.com/messages/t/231338047199947" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3"></div>
                    {{-- <div class="col-md-6 col-lg-3">
                        <h5 class="title">Galería</h5>
                        <ul class="instafeed instagram-gallery" data-lightgallery="group">
                            <li><a class="instagram-item" data-lightgallery="item"
                                    href="images/insta-gallery-1-1200x800-original.jpg"><img
                                        src="{{ asset('onwave/images/insta-gallery-1-72x72.jpg') }}" alt=""
                    width="72" height="72" /></a>
                    </li>
                    <li><a class="instagram-item" data-lightgallery="item"
                            href="images/insta-gallery-2-1200x800-original.jpg"><img
                                src="{{ asset('onwave/images/insta-gallery-2-72x72.jpg') }}" alt="" width="72"
                                height="72" /></a>
                    </li>
                    <li><a class="instagram-item" data-lightgallery="item"
                            href="images/insta-gallery-3-1200x800-original.jpg"><img
                                src="{{ asset('onwave/images/insta-gallery-3-72x72.jpg') }}" alt="" width="72"
                                height="72" /></a>
                    </li>
                    <li><a class="instagram-item" data-lightgallery="item"
                            href="images/insta-gallery-4-1200x800-original.jpg"><img
                                src="{{ asset('onwave/images/insta-gallery-4-72x72.jpg') }}" alt="" width="72"
                                height="72" /></a>
                    </li>
                    <li><a class="instagram-item" data-lightgallery="item"
                            href="images/insta-gallery-5-1200x800-original.jpg"><img
                                src="{{ asset('onwave/images/insta-gallery-5-72x72.jpg') }}" alt="" width="72"
                                height="72" /></a>
                    </li>
                    <li><a class="instagram-item" data-lightgallery="item"
                            href="images/insta-gallery-6-1200x800-original.jpg"><img
                                src="{{ asset('onwave/images/insta-gallery-6-72x72.jpg') }}" alt="" width="72"
                                height="72" /></a>
                    </li>
                    </ul>
                </div> --}}
                {{-- <div class="col-md-6 col-lg-3">
                        <h5 class="text-white title">Boletín informátivo</h5>
                        <p>Manténgase al día con nuestras noticias y actualizaciones siempre próximas.
                            Ingrese su correo electrónico y suscríbase.</p>
                        <!-- RD Mailform-->
                        <form class="rd-form form-sm rd-mailform" data-form-output="form-output-global"
                            data-form-type="contact" method="post" action="bat/rd-mailform.php">
                            <div class="form-wrap">
                                <input class="form-input" id="newsletter-email" type="email" name="email"
                                    data-constraints="@Email @Required">
                                <label class="form-label" for="newsletter-email">Ingrese su correo</label>
                            </div>
                            <button class="button button-primary" type="submit">Suscribirse</button>
                        </form>
                    </div> --}}
            </div>
            <!-- Rights-->
            <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span>
                <span>Prismad Music</span>. Todos los derechos reservados
            </p>
    </div>
    </footer>
    </div>

    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="{{ asset('onwave/js/core.min.js') }}"></script>
    <script src="{{ asset('onwave/js/script.js') }}"></script>
</body>

</html>
