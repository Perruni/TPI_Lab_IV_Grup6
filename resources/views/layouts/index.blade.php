<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestor de Eventos</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
  </head>

  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="{{ route('fullcalendar') }}"><img src="assets/images/logoeventosya.png" alt="logo" style="width: auto; height: auto;"/></a>
          <a class="sidebar-brand brand-logo-mini" href="{{ route('fullcalendar') }}"><img src="assets/images/logoeventosyamini.png" alt="logo"style="width: auto; height: auto;" /></a>
        </div>
        <ul class="nav">
          
          <li class="nav-item nav-category">
            <span class="nav-link">Navegacion</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/nuevoevento">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Crear evento</span>
            </a>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="/miseventos">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Mis Eventos</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/fullcalendar">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Calendario</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/mostrarEventos">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Eventos publicos</span>
            </a>
          </li>     
         
          <li class="nav-item menu-items">
            <a class="nav-link" href="/misinvitaciones">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Mis Invitaciones</span>
            </a>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logoeventosya.png" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>

              <!-- Barra de busqueda -->
              <form method="GET" action="{{ route('eventos.buscar') }}" class="d-flex mx-auto align-items-center" role="search" style="max-width: 500px; width: 100%;">
    <input class="form-control me-2" type="search" placeholder="Buscar por nombre" name="search" value="{{ request('search') }}" style="flex-grow: 1;">
    <button class="btn btn-outline-success" type="submit" style="width: auto; padding-left: 15px; padding-right: 15px;">Buscar</button>
</form>

            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" href="{{ route('cargar') }}">+ Crear nuevo evento</a>       
              <li class="nav-item dropdown border-left">
               
               
                <li class="nav-item dropdown border-left">
    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
        <i class="mdi mdi-bell"></i>
        <!-- Muestra la cantidad de notificaciones no leídas -->
        <span class="count bg-danger">{{ $notificaciones->count() }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
        <h6 class="p-3 mb-0">Notificaciones</h6>
        <div class="dropdown-divider"></div>
        
        <!-- Itera sobre cada notificación -->
        @foreach ($notificaciones as $notificacion)
            <a class="dropdown-item preview-item" href="{{ route('eventodetallado', $notificacion->evento_id) }}">
                <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-calendar text-success"></i>
                    </div>
                </div>
                <div class="preview-item-content">
                    <p class="preview-subject mb-1">{{ $notificacion->titulo }}</p>
                    <p class="text-muted ellipsis mb-0">{{ $notificacion->mensaje }}</p>
                    <!-- Botón para ir al evento -->
                    <span class="badge badge-primary mt-2">Ir al evento</span>
                </div>
            </a>
            <div class="dropdown-divider"></div>
        @endforeach

        <!-- Si no hay notificaciones -->
        @if ($notificaciones->isEmpty())
            <p class="p-3 mb-0 text-center">No tienes notificaciones nuevas</p>
        @else
            <p class="p-3 mb-0 text-center">Ver todas las notificaciones</p>
        @endif
    </div>
</li>
            <li class="nav-item dropdown">
            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                <div class="navbar-profile">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::check() ? Auth::user()->name : 'Invitado' }}</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
            </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                    <h6 class="p-3 mb-0">Perfil</h6>
                    <div class="dropdown-divider"></div>
                    
                    
                    <a href="{{ route('profile.edit') }}" class="dropdown-item preview-item" style="text-decoration: none; color: inherit;">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content d-flex align-items-center">
                            <p class="preview-subject mb-1">Ajustes</p>
                        </div>
                    </a>
                    
                    <div class="dropdown-divider"></div>
                    
                    <!-- Botón para Cerrar Sesión -->
                    <form method="POST" action="{{ route('logout') }}" class="dropdown-item preview-item" style="padding: 0; margin: 0;">
                        @csrf
                        <button type="submit" style="background: none; border: none; display: flex; align-items: center; width: 100%; text-align: left;">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-logout text-danger"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1" style="color: white;">Cerrar sesión</p>
                            </div>
                        </button>
                    </form>     
                </div>
            </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial ---------------------------------------------------------------CALENDARIO--->
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Eventos YA 2024</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_maps.google_api_key') }}&callback=initMap&libraries=places,marker"></script>

    <!-- End custom js for this page -->

  </body>
</html>