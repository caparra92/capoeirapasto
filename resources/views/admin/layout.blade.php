<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Panel de administración</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/adminlte/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/adminlte/plugins/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="/adminlte/css/skins/skin-green.min.css">
  <link rel="stylesheet" href="/css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="{{url('/capoeira.svg')}}" alt="CapoeiraPasto" width="50px" height="25px"></span>
      <!-- logo for regular state and mobile devices -->
      
      <span class="logo-lg"><img src="{{url('/capoeira.svg')}}" alt="CapoeiraPasto" width="45px" height="22px"><b>Capoeira </b>Pasto</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          @role('admin')
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-dollar"></i>
              <span class="label label-danger">{{$Npendientes}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes {{$Npendientes}} usuarios con pagos pendientes</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="{{url('/img/'.auth()->user()->path)}}" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Ver pagos pendientes
                        <small><i class="fa fa-dollar"></i>{{$Npendientes}}</small>
                      </h4>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="{{url('admin/pagos/user')}}">Ir a pagos</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->
          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-comments"></i>
              <span class="label label-warning">{{$Nposts}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Posts publicados</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-paste text-aqua"></i> Tienes {{$Nposts}} post publicados
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="{{url('/admin/posts')}}">Ver posts</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-users"></i>
              <span class="label label-success">{{$Nusers}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Usuarios registrados</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="{{url('/admin/users')}}">
                      <i class="fa fa-users text-aqua"></i> Tienes {{$Nusers}} usuarios registrados
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">Ver todo</a>
              </li>
            </ul>
          </li>
          @endrole
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{url('/img/'.auth()->user()->path)}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ auth()->user()->nombre }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{url('/img/'.auth()->user()->path)}}" class="img-circle" alt="User Image">

                <p>
                  {{ auth()->user()->nombre }} - {{auth()->user()->roles[0]->display_name}}
                  <small>Miembro desde {{ auth()->user()->created_at->format('M d Y')  }}</small>
                </p>
              </li>
              <!-- Menu Body -->
             <!--  <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div> -->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('/admin/users/profile/'.auth()->user()->id)}}" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat" 
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          Cerrar sesión
                  </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('/img/'.auth()->user()->path)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->nombre }}&nbsp{{ auth()->user()->apellido }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">CAPOEIRA PASTO</li>
        <!-- Optionally, you can add icons to the links -->
        @role('admin')
        <li class="treeview">
          <a href="#"><i class="fa fa-rss-square"></i> <span>BLOG</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
            <a href="#"><i class="fa fa-tags"></i> <span>CATEGORIAS</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('/admin/categories')}}">VER CATEGORIAS</a></li>
              <li><a href="{{url('/admin/categories/new')}}">CREAR CATEGORIA</a></li>
            </ul>
            </li>
            <li class="treeview">
            <a href="#"><i class="fa fa-paste"></i> <span>POSTS</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('/admin/posts')}}">VER POSTS</a></li>
              <li><a href="{{url('/admin/posts/new')}}">CREAR POST</a></li>
            </ul>
          </li>
          </ul>
        </li>
        @endrole
        <li class="treeview">
          <a href="#"><i class="fa fa-user"></i> <span>USUARIOS</span>
          <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
          @role('admin')
            <li><a href="{{url('/admin/users')}}">VER USUARIOS</a></li>
            <li><a href="{{url('/admin/users')}}">ROLES Y PERMISOS</a></li>
            <li><a href="{{url('/admin/users/new')}}">AGREGAR USUARIO</a></li>
          @endrole
            <li><a href="{{url('/admin/users/profile/'.auth()->user()->id)}}">MI PERFIL</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-dollar"></i> <span>PAGOS</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
          @role('admin')
            <li><a href="{{url('/admin/pagos')}}">PRODUCTOS Y SERVICIOS</a></li>
            <li><a href="{{url('/admin/pagos/new')}}">AGREGAR SERVICIO</a></li>
            <li><a href="{{url('/admin/pagos/user')}}">PAGOS USUARIOS</a></li>
          @endrole
            <li><a href="{{url('/admin/pagos/profile/'.auth()->user()->id)}}">MIS PAGOS</a></li>
          </ul>
        </li>
          @role('admin')
        <li class="treeview">
          <a href="#"><i class="fa fa-bank"></i> <span>CAJAS</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/cajas')}}">CAJAS</a></li>
            <li><a href="{{url('/admin/cajas/new')}}">AGREGAR CAJA</a></li>
          </ul>
        </li>
          @endrole
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel de administración
        <small>Sistema de pagos y usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i>Sitio web</a></li>
        <li class="active">Here</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content container-fluid">

    @include('flash::message')
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Camilo Andrés Parra</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{url('/adminlte/plugins/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('/adminlte/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('/adminlte/js/adminlte.min.js')}}"></script>

<script src="{{url('/js/main.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script>
  jQuery('div.alert').delay(2500).fadeOut(500);
</script>
</body>
</html>