<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Maderas Ecke</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Datatable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
  @yield("style")
  <!-- Select2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /></head>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" /></head>

  <!--style>
      .sidebar-dark-info{
        background: #138496 !important;
      }
      .navbar-info {
        background: #138496 !important;
      }
 </style-->
 <style>
      .sidebar-dark-blue{
        background: rgb(116, 29, 29) !important;
      }
      .navbar-blue {
        background: rgb(116, 29, 29) !important;
      }
      /* Este es para los elementos en general */
    .navbar-light .navbar-nav .nav-link {
    color: #ffffff !important;
    }
    /*  Este es para el elemento activo lo puedes omitir si asi deseas */
    .navbar-light .navbar-nav .active>.nav-link  {
    color: red !important;
    }
 </style>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-blue navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    </div>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/logout" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                    </a>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-blue elevation-4">
            
            <a href="/home" class="brand-link">
                <img src="{{ asset('imagenes/logo/logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><b>Maderas Ecke</b></span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    {{-- imagen perfil --}}
                    <!--div class="image">
                        @if(Auth::user()->foto == null)
                            <img src="{{ asset('imagenes/perfil/default.png')}}" class="img-circle elevation-2" alt="User Image">
                        @else
                            <img src="{{ asset('imagenes/perfil/'.Auth::user()->foto)}}" class="img-circle elevation-2" alt="User Image">
                        @endif
                    </div-->
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        {{-- @can('listar movimientos') --}}
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-dollar-sign"></i>
                                    <p>Movimientos</p>
                                </a>
                            </li>
                        {{-- @endcan --}}

                        <li class="nav-item">
                            <a href="{{route("productos.index")}}" class="nav-link">
                                <i class="fas fa-cubes nav-icon"></i>
                                <p>
                                    Productos
                                </p>
                            </a>
                        </li>
                
                        {{-- @can('listar usuarios') --}}
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="fas fa-id-card nav-icon text-warning"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        {{-- @endcan --}}
                        {{-- @role('Administrador') --}}
                        <li class="nav-header">SISTEMA</li>
                        <li class="nav-item">
                            <a href="{{ route('audits.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-eye"></i>
                                <p>Auditoria</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('configuracion.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>Configuracion <span class="badge badge-info right"></span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>Estadística</p>
                            </a>
                        </li>
                        {{-- @endrole --}}
                        <li class="nav-header">AYUDA Y SOPORTE</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-book"></i>
                                <p>Documentación</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>


        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            @yield('titulo')
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @yield('navegacion')
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- en esta sección va el contenido -->
            <section class="content">
                <div class="container-fluid">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                             <!-- el card en cuestión dentro de cada yield estara el body y footer del card -->
                                @yield('content')

                        </div>

                </div>
            </section>
        </div>


    <footer class="main-footer">
        <strong>Copyright &copy; 2020
            <a href="#">Matko</a>
        </strong>
            Todos los derechos reservados.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>

    <aside class="control-sidebar control-sidebar-dark">

    </aside>

    <!--MercadoPago-->
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
              
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js')}}"></script>
    <!-- Datatable & jQuery-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
    <!-- Select2-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- google chart -->
    <script src="{{ asset('js/loader.js')}}"></script>

    <!-- mascaras -->
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>

    @stack('scripts')
    @yield("scripts")
</body>
</html>
