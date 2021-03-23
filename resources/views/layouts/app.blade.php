<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nabu</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/select2.min.js') }}" defer ></script>
    <script src="{{ asset('js/clipboard.min.js') }}" defer ></script>
    
    <script src="{{ asset('js/plugins/piexif.js') }}" defer></script>
    <script src="{{ asset('js/plugins/sortable.js') }}" defer></script>
    <script src="{{ asset('js/fileinput.js') }}" defer></script>
    <script src="{{ asset('js/locales/es.js') }}" defer></script>
    <script src="{{ asset('themes/fas/theme.js') }}" defer></script>
    <script src="{{ asset('themes/explorer-fas/theme.js') }}" defer></script>
    <script src="{{ asset('dist/js/adminlte.js') }}" defer></script>
    @stack('scripts')

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset ('plugins/fontawesome-free/css/all.min.css')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="manifest" href="{{ asset ('manifest-31313.json')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="/icon/favicon-32x32-dunplab-manifest-31313.png">

    <!-- Styles -->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/select2-bootstrap4.min.css') }}"  rel="stylesheet">
    <link href="{{ asset('css/fileinput.css') }}"  media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>

    

    {{-- Ionicons --}}
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
               {{--  <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form> --}}

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-comments"></i>
                            <span class="badge badge-danger navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="{{asset('dist/img/user1-128x128.jpg')}}" alt="User Avatar"
                                        class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-right text-sm text-danger"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">Call me whenever you can...</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="{{asset('dist/img/user8-128x128.jpg')}}" alt="User Avatar"
                                        class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            John Pierce
                                            <span class="float-right text-sm text-muted"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">I got your message bro</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="{{asset('dist/img/user3-128x128.jpg')}}" alt="User Avatar"
                                        class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-right text-sm text-warning"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">The subject goes here</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li> --}}
                    <!-- Notifications Dropdown Menu -->
                    <a class="dropdown-item" href="{{ route('usuarios.edit',Auth::user()->id) }}">
                            Editar Usuario
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                    </a>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="brand-link">
                    <img src=" {{ asset('/icon/apple-icon-60x60-dunplab-manifest-31313.png') }} " alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">Nabu</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="info">
                            <a href="#" class="d-block">
                                @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                @else
                                <div class="image">
                                    <img src="{{ asset('imagenes/'. (is_null(Auth::user()->imagen) ? 'default.jpg' : Auth::user()->imagen)  ) }} " class="img-circle elevation-2" alt="User Image">
                                </div>
                                {{ Auth::user()->name }}
                               {{--  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a> --}}

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                @endguest
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">

                            <li class="nav-item">
                                <a href="/" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Inicio</p>
                                </a>
                            </li>
                            
                            @can('administrador')
                            <li class="nav-item">
                                <a href="{{ url('usuarios')}}"
                                    class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Usuarios
                                        <?php $users_count = DB::table('users')->count(); ?>
                                        <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>
                                    </p>
                                </a>
                            </li>
                            @endcan

                            @can('administrador')
                            <li class="nav-item">
                                <a href="{{ url('roles')}}"
                                    class="{{ Request::path() === 'roles' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-lock-open"></i>
                                    <p>
                                        Roles
                                    </p>
                                </a>
                            </li>
                            @endcan

                            @can('administrador')
                            <li class="nav-item">
                                <a href="{{ url('codes')}}"
                                    class="{{ Request::path() === 'codes' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-barcode"></i>
                                    <p>
                                        Generar Códigos
                                    </p>
                                </a>
                            </li>
                            @endcan

                            
                            @if(Auth::user()->tieneRole()[0] =="administrador"  || Auth::user()->tieneRole()[0] == "gps")
                               
                            <li class="nav-item">
                                <a href="{{ url('gps')}}" class="{{ Request::path() === 'gps' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-globe"></i>
                                    <p>
                                        Gps
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                      <a href="{{url('gps/inicio')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inicio</p>
                                      </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                      <a href="{{url('gps/ubicacion')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Obtener Ubicación</p>
                                      </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                      <a href="{{url('gps/apagarveh')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Apagar Vehiculo</p>
                                      </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                      <a href="{{url('gps/pass')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Cambio de Contraseña</p>
                                      </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                      <a href="{{url('gps/tels')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agregar Télefonos</p>
                                      </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                      <a href="{{url('gps/sleep')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Modo Sleep</p>
                                      </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                      <a href="{{url('gps/zona')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Cambio de zona Horaria</p>
                                      </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                      <a href="{{url('gps/gprs')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Modo GPRS</p>
                                      </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                      <a href="{{url('gps/operador')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agregar Operador</p>
                                      </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                      <a href="{{url('gps/servidor')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agregar Servidor</p>
                                      </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                      <a href="{{url('gps/reportes')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tipo de Reportes</p>
                                      </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                      <a href="{{url('gps/reinicio')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Renicio</p>
                                      </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                      <a href="{{url('gps/geocerca')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Activar Geocerca</p>
                                      </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                      <a href="{{url('gps/config_geocerca')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Configurar Geocerca</p>
                                      </a>
                                    </li>
                                </ul>
                            </li>
                            @endif

                            @if(Auth::user()->tieneRole()[0] =="administrador" || Auth::user()->tieneRole()[0] == "bikes")  
                            <li class="nav-item">
                                <a href="{{ url('bikes.index')}}" class="{{ Request::path() === 'bikes' ? 'nav-link active' : 'nav-link' }}">
                                  <i class="nav-icon fas fa-bicycle"></i>
                                  <p>
                                    Bicicletas
                                    <i class="fas fa-angle-left right"></i>
                                  </p>
                                </a>
                                <ul class="nav nav-treeview" >
                                  <li class="nav-item">
                                    <a href="{{url('bikes')}}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Datos Bicicleta</p>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                            @endif
                         
                            
                            @can('administrador')
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Notas<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('notas/todas')}}"
                                            class="{{ Request::path() === 'notas/todas' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Todas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('notas/favoritas')}}"
                                            class="{{ Request::path() === 'notas/favoritas' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Favoritas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('notas/archivadas')}}"
                                            class="{{ Request::path() === 'notas/archivadas' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Archivadas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endcan

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <!-- NO QUITAR -->
                <strong>Nabu
                    <div class="float-right d-none d-sm-inline-block">
                        <b>Version</b> 1.0
                    </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
    </div>
</body>

</html>
