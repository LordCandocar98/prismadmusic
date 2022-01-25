<nav class="navbar navbar-default navbar-fixed-top navbar-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="hamburger btn-link">
                <span class="hamburger-inner"></span>
            </button>
            @section('breadcrumbs')
                <ol class="breadcrumb hidden-xs">
                    <li class="active">
                        <i class="fa fa-id-card-o"></i> Completa tu registro</a>
                    </li>
                    @yield('addBreadcrumbs')
                </ol>
            @show
        </div>
        <ul class="nav navbar-nav @if (__('voyager::generic.is_rtl') == 'true') navbar-left @else navbar-right @endif">
            <li class="dropdown profile">
                <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                    aria-expanded="false"><img src="http://127.0.0.1:8000/storage/users/default.png"
                        class="profile-img"> <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-animated">
                    <li class="profile-img">
                        <img src="http://127.0.0.1:8000/storage/users/default.png" class="profile-img">
                        <div class="profile-body">
                            <h5>LordCandocar</h5>
                            <h6>candido.moreno@unillanos.edu.co</h6>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li class="class-full-of-rum">
                        <a href="http://127.0.0.1:8000/admin/profile">
                            <i class="voyager-person"></i>
                            Perfil
                        </a>
                    </li>
                    <li>
                        <a href="/" target="_blank">
                            <i class="voyager-home"></i>
                            Página de Inicio
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            <input type="hidden" name="_token" value="p3jldm5HVwhHCwEEoysuNeNSfELwaS4RV4uHtyXS">
                            <button type="submit" class="btn btn-danger btn-block">
                                <i class="voyager-power"></i>
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
