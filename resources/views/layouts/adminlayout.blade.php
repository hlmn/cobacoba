<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi | MAUT</title>
<!--     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css"> -->
    
  
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{url('/admindist/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/admindist/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{url('/admindist/css/jquery-ui.css')}}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script src="https://use.fontawesome.com/a50b71a92d.js"></script> -->

    <link rel="stylesheet" href="{{url('/admindist/plugins/datatables/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('/admindist/plugins/datatables/dataTables.bootstrap.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/admindist/plugins/fullcalendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{url('/admindist/plugins/fullcalendar/fullcalendar.print.css')}}" media="print">


    <link rel="stylesheet" href="{{url('/admindist/dist/css/AdminLTE.min.css')}}">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('/admindist/dist/css/skins/_all-skins.min.css')}}">
    {{-- <link rel="stylesheet" href="{{url('/admindist/dist/css/sweetalert.css')}}"> --}}
    <link href="https://cdn.jsdelivr.net/sweetalert2/5.3.8/sweetalert2.css" rel="stylesheet"/>

    
      @yield('gaya')
    
  </head>
  <body class="skin-blue sidebar-mini" style="height: auto; min-height: 100%;">
    <!-- Site wrapper -->
    <div class="wrapper" style="height: auto; min-height: 100%;">

      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <span class="logo-mini"><b>MMT</b></span>
          <span class="logo-lg"><b>MM</b>T</span>
        </a>

      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        @if(!Auth::check())
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                {{-- <a href="{{route('login')}}" class="dropdown-toggle" > --}}
                  {{-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> --}}
                  <span class="hidden-xs">Login</span>
                </a>
              </li>
            </ul>
          </div>
        @endif
      </nav>

      </header>

      <!-- =============================================== -->

      <aside class="main-sidebar">
        <section class="sidebar" style="height: auto;">
          @if(Auth::check())
            <div class="user-panel">
              <div class="pull-left image">
                <img href="#" src="{{url('/admindist/dist/img/default-avatar.png')}}" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                @if(Auth::user()->role =='dosen')
                  <p><a>{{Auth::user()->dosen->nama}}</a></p>
                @elseif(Auth::user()->role =='mahasiswa')
                  <p><a>{{Auth::user()->mahasiswa->nama}}</a></p>
                @else 
                  <p><a>{{Auth::user()->name}}</a></p>
                @endif
                

                <a ><i class="fa fa-circle text-success"></i> Online</a>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"></i> Logout</a>
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </div>
            </div>
          @else

          @endif

          <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header">PILIHAN MENU</li>
            
            <li class="" id="aktifjadwal">
              <a href=""><i class="fa fa-calendar"></i> <span>Jadwal</span></a>
            </li>
            
            
          </ul>
        </section>
      </aside>

    <div class="content-wrapper">
      <section class="content">
        @yield('content')
      </section>
    </div>

    <footer class="main-footer">
      <strong>Copyright &copy; 2017 <a href="/">MMT</a>.</strong> All rights reserved.
    </footer>

  </div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

<script src="{{url('/admindist/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="{{url('/admindist/plugins/jQueryUI/jquery-ui.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('/admindist/js/moment.js')}}"></script>
<script src="{{url('/admindist/bootstrap/js/bootstrap.js')}}"></script>

<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.0/js/responsive.bootstrap.min.js"></script>
<script src="{{url('/admindist/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<script src="{{url('/admindist/js/bootstrap-datetimepicker.min.js')}}"></script>
  
<!-- SlimScroll -->
<script src="{{url('/admindist/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('/admindist/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('/admindist/dist/js/app.min.js')}}"></script>
<script src="{{url('/admindist/plugins/fullcalendar/fullcalendar.min.js')}}" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.2/socket.io.js"></script>
<!-- AdminLTE for demo purposes -->

  
<script src="{{url('/admindist/dist/js/demo.js')}}"></script>
{{-- <script src="{{url('/admindist/dist/js/sweetalert.min.js')}}"></script> --}}
<script src="https://cdn.jsdelivr.net/sweetalert2/5.3.8/sweetalert2.js"></script>
{{-- <script type="text/javascript">
  $(function () {
    $('#aktif{{$active}}').toggleClass('active');
  });
  $(function () {
    $('#anak{{$page_title}}').toggleClass('active');
  });
</script> --}}
  @yield('js')
</body>
</html>
