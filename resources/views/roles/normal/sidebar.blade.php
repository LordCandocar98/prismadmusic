<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    <div class="logo-icon-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if ($admin_logo_img == '')
                            <img src="{{ asset('assets/images/logo-icon-light.png') }}" alt="Logo Icon">
                        @else
                            <img src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                        @endif
                    </div>{{-- <div class="title">{{Voyager::setting('admin.title', 'VOYAGER')}}</div> --}}
                    <div class="title">{{ Voyager::setting('admin.title', 'Prismad Music') }}</div>
                </a>
            </div><!-- .navbar-header -->

            <div class="panel widget center bgimage"
                style="background-image:url({{ Voyager::image(Voyager::setting('admin.bg_image'), asset('assets/images/bg.jpg')) }}); background-size: cover; background-position: 0px;">
                <div class="dimmer"></div>
                <div class="panel-content">
                    <img src="{{ $user_avatar }}" class="avatar" alt="{{ Auth::user()->name }} avatar">
                    <h4>{{ ucwords(Auth::user()->name) }}</h4>
                    <p>{{ Auth::user()->email }}</p>

                    <a href="{{ route('voyager.profile') }}"
                        class="btn btn-primary">{{ __('voyager::generic.profile') }}</a>
                    <div style="clear:both"></div>
                </div>
            </div>

        </div>
        <div id="adminmenu">
            <ul class="nav navbar-nav">
                <li class=""><a target="_self" href="">
                        <span class="icon voyager-home"></span>
                        <span class="title">Visión general</span></a>
                    <!---->
                </li>
                <li class=""><a target="_self" href="">
                        <span class="icon voyager-dollar"></span>
                        <span class="title">Reporte de pagos</span></a>
                    <!---->
                </li>
                <li class="{{ route('clientes.index') }}"><a target="_self" href="">
                        <span class="icon voyager-people"></span>
                        <span class="title">Gestión de colaboraciones</span></a>
                    <!---->
                </li>
                <li class=""><a target="_self" href="">
                        <span class="icon voyager-news"></span>
                        <span class="title">Gestión de repertorio</span></a>
                    <!---->
                </li>
            </ul>
        </div>
    </nav>
</div>
