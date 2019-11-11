<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CFE SAR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href={{asset("bower_components/bootstrap/dist/css/bootstrap.min.css")}}>
 <!-- DataTables -->
 <link rel="stylesheet" href={{asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}>
<!-- Font Awesome -->
<link rel="stylesheet" href={{asset("bower_components/font-awesome/css/font-awesome.min.css")}}>
<!-- Ionicons -->
<link rel="stylesheet" href={{asset("bower_components/Ionicons/css/ionicons.min.css")}}>
<link rel="stylesheet" href={{asset("bower_components/select2/dist/css/select2.min.css")}}>
<!-- Theme style -->
<link rel="stylesheet" href={{asset("dist/css/AdminLTE.min.css")}}>
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href={{asset("dist/css/skins/_all-skins.css")}}>
<!-- Morris chart -->
<link rel="stylesheet" href={{asset("bower_components/morris.js/morris.css")}}>
<!-- jvectormap -->
<link rel="stylesheet" href={{asset("bower_components/jvectormap/jquery-jvectormap.css")}}>
<!-- Date Picker -->
<link rel="stylesheet" href={{asset("bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}>
<!-- Daterange picker -->
<link rel="stylesheet" href={{asset("bower_components/bootstrap-daterangepicker/daterangepicker.css")}}>
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href={{asset("plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>SB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CF</b>E</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          @hasrole('editor')
          <!-- Messages: style can be found in dropdown.less-->
          @include('fragments.messages')
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          @include('fragments.tasks')
          @endhasrole


          @hasrole('revisor')
          @include('fragments.notifications')
          @include('fragments.tasks2')

          @endhasrole
          
          @hasrole('firma')
          @include('fragments.firma.notifications')
          @include('fragments.firma.tasks')

          @endhasrole

          @hasrole('pago')
          @include('fragments.pago.notifications')
          @include('fragments.pago.tasks')
          @endhasrole
          @hasrole('ofi_fin')
          @include('fragments.finanzas.notifications')
          @endhasrole
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @if(Auth::user()->imagen)
                <img src="{{ route('user.avatar',['filename' => Auth::user()->imagen]) }}" class="user-image"/>

                  @endif

              <span class="hidden-xs">{{Auth()->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                  @if(Auth::user()->imagen)
                  <img src="{{ route('user.avatar',['filename' => Auth::user()->imagen]) }}" class="img-circle"/>
  
                    @endif

                <p>
                    {{Auth()->user()->name}}
                  <small>{{Auth()->user()->username}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
               
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                <a href="{{route('user.profile')}}" class="btn btn-success">Perfil</a>
                </div>
                <div class="pull-right">
                    <form method="POST" action="{{route('logout')}}">
                        {{csrf_field()}}
                        <button class="btn btn-danger">Salir</button>
                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            @if(Auth::user()->imagen)
            <img src="{{ route('user.avatar',['filename' => Auth::user()->imagen]) }}" class="img-circle"/>

              @endif   
        
        </div>
        <div class="pull-left info">
          <p>{{Auth()->user()->name}}</p>
        <i class="fa fa-circle text-success"></i> Online
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>

        <li class="treeview">
        <a href="{{route('home')}}">
            <i class="fa fa-dashboard "></i> <span>inicio</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
              <li><a href="{{route('home')}}"><i class="fa fa-circle-o"></i>Inicio</a></li>
              </ul>
            
         
        </li>
        @hasrole('administrator')
        <li class="treeview">
            <a href="#">
              <i class="fa fa-money"></i> <span>Usuarios</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{route('userslists')}}"><i class="fa fa-circle-o"></i>Lista</a></li>
            </ul>
          </li>
          <li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i> <span>Agencias</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <li><a href="{{route('agencia.index')}}"><i class="fa fa-circle-o"></i>Lista</a></li>
              </ul>
            </li>
        @endhasrole
        @can('ofi_finanza')
        <li class="treeview">
            <a href="#">
              <i class="fa fa-money"></i> <span>Oficina Finanzas</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{route('reembolso.finanza')}}"><i class="fa fa-circle-o"></i>Lista</a></li>
            </ul>
          </li>
          
        @endcan

        @can('crear_reembolso')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Reembolsos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{route('reembolso.create')}}"><i class="fa fa-circle-o"></i> Nuevo</a></li>
          </ul>
        </li>

        <li>
        <a href="{{route('reembolso.show')}}">
            <i class="fa fa-th"></i> <span>Mis Solicitudes</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">ver</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{route('reembolso.log')}}">
              <i class="fa fa-th"></i> <span>Registros</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">ver</small>
              </span>
            </a>
          </li>

        <li class="treeview">
            <a href="#">
              <i class="fa fa-balance-scale"></i> <span>Comprobacion de Fondo Fijo</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('arqueo.main')}}"><i class="fa fa-pencil"></i>Arqueo</a></li>
              <li><a href="{{route('integration.main')}}"><i class="fa fa-line-chart"></i>integracion del fondo</a></li>

            </ul>
          
          </li>
        @endcan


        @can('revisar_reembolso')
        <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Revisar Reembolsos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('reembolso.all')}}"><i class="fa fa-pencil"></i> Revision </a></li>
            </ul>
          </li>


          <li class="treeview">
              <a href="#">
                <i class="fa fa-industry"></i> <span>Revision de datos</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <li><a href="{{route('reembolso.reviewed')}}"><i class="fa fa-search"></i> Reembolsos ya revisados</a></li>
              </ul>
            </li>
            <li>
              <a href="{{route('reembolso.log')}}">
                  <i class="fa fa-th"></i> <span>Registros</span>
                  <span class="pull-right-container">
                    <small class="label pull-right bg-green">ver</small>
                  </span>
                </a>
              </li>
          @endcan

          @can('firmar_reembolso')

          <li class="treeview">
              <a href="#">
                <i class="fa fa-check"></i> <span>Revisa y firma Reembolso</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <li><a href="{{route('reembolso.lista.firma')}}"><i class="fa fa-pencil"></i> Revision </a></li>
              </ul>
              
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-sign-in"></i> <span>Estado de los ya firmados</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <li><a href="{{route('reembolso.firmados')}}"><i class="fa fa-pencil"></i>estados</a></li>
              </ul>
              
            </li>
            <li>
              <a href="{{route('reembolso.log')}}">
                  <i class="fa fa-th"></i> <span>Registros</span>
                  <span class="pull-right-container">
                    <small class="label pull-right bg-green">ver</small>
                  </span>
                </a>
              </li>
            
            @endcan

      @can('pagar_reembolso')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Administracion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{route('reembolso.lista.admin')}}"><i class="fa fa-circle-o"></i>ver reembolsos</a></li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>estados</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{route('reembolso.administrados')}}"><i class="fa fa-circle-o"></i>ver estado de reembolsos</a></li>
            
          </ul>
        </li>
        <li>
          <a href="{{route('reembolso.log')}}">
              <i class="fa fa-th"></i> <span>Registros</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">ver</small>
              </span>
            </a>
          </li>
      @endcan
     
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bienvenido(a)
        <small>{{Auth()->user()->name}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

      <!-- Small boxes (Stat box) -->
    @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">

    </div>
    <strong>ISIC</strong>
    Jose Ruiz Regalado
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar 
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
      
      -->
</div>

<!-- ./wrapper -->
<script src={{asset("bower_components/jquery/dist/jquery.min.js")}}></script>


<!-- jQuery UI 1.11.4 -->
<script src={{asset("bower_components/jquery-ui/jquery-ui.min.js")}}     ></script>
<script src={{asset("bower_components/select2/dist/js/select2.full.min.js")}}></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src={{asset("bower_components/bootstrap/dist/js/bootstrap.min.js")}}     ></script>
<!-- DataTables -->
<script src={{asset("bower_components/datatables.net/js/jquery.dataTables.min.js")}}></script>
<script src={{asset("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}></script>
<!-- Morris.js charts -->
<script src={{asset("bower_components/raphael/raphael.min.js")}}     ></script>
<!-- Sparkline -->
<script src={{asset("bower_components/jquery-sparkline/dist/jquery.sparkline.min.js")}}     ></script>
<!-- jvectormap -->
<script src={{asset("plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")}}     ></script>
<script src={{asset("plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}     ></script>
<!-- jQuery Knob Chart -->
<script src={{asset("bower_components/jquery-knob/dist/jquery.knob.min.js")}}     ></script>
<!-- daterangepicker -->
<script src={{asset("bower_components/bootstrap-daterangepicker/daterangepicker.js")}}     ></script>
<!-- datepicker -->
<script src={{asset("bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}     ></script>
<!-- Bootstrap WYSIHTML5 -->
<script src={{asset("plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}     ></script>
<!-- Slimscroll -->
<script src={{asset("bower_components/jquery-slimscroll/jquery.slimscroll.min.js")}}     ></script>
<!-- FastClick -->
<script src={{asset("bower_components/fastclick/lib/fastclick.js")}}     ></script>
<!-- AdminLTE App -->
<script src={{asset("dist/js/adminlte.min.js")}}     ></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->

@yield('script')
</body>
</html>
