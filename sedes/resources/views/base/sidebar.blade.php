<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ URL::to('logo.jpg') }}" style="width:50px" alt="Logo"></a>
            <a class="navbar-brand hidden" href="{{ route('home') }}"><img src="{{ URL::to('logo.jpg') }}" style="width:20px"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('home') }}"> <i class="menu-icon fa fa-dashboard"></i>Inicio </a>
                </li>
                <h3 class="menu-title">Menus</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-laptop"></i>Usuarios
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_usuarios') }}">Ver</a></li>
                        {{-- <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_usuarios') }}">Ver</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_usuarios') }}">Ver</a></li> --}}
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-laptop"></i>Permisos
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_permisos') }}">Ver</a></li>
                        {{-- <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_usuarios') }}">Ver</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_usuarios') }}">Ver</a></li> --}}
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-laptop"></i>Pacientes
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_pacientes') }}">Ver</a></li>
                        {{-- <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_usuarios') }}">Ver</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_usuarios') }}">Ver</a></li> --}}
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-laptop"></i>Cuaderno Medico
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('inicio_cuadernos') }}">Ver</a></li>
                        {{-- <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_usuarios') }}">Ver</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_usuarios') }}">Ver</a></li> --}}
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-laptop"></i>mordeduras
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_mordeduras') }}">Ver</a></li>
                        {{-- <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_usuarios') }}">Ver</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_usuarios') }}">Ver</a></li> --}}
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-laptop"></i>Certificados medicos
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_certificados') }}">Ver</a></li>
                        {{-- <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_usuarios') }}">Ver</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_usuarios') }}">Ver</a></li> --}}
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-laptop"></i>Examenes
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('indice_certificados') }}">Coproparasitológico</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="#">General de orina</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="#">Laboratorio clinico</a></li> 
                        <li><i class="fa fa-puzzle-piece"></i><a href="#">Especiales</a></li> 
                    </ul>
                </li>
                

                <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                        <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->