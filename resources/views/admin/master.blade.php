<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    {{--Select2 --}}

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{url('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{url('plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <script src="plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('dashboard.index')}}" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
       {{-- <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>--}}

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <ul>
                        <li>
                            <h3 class="dropdown-item-title">
                                {{\Illuminate\Support\Facades\Auth::user()->name}}
                            </h3>
                        </li>
                        @if(Auth::user()->user_type == 'admin')
                         <li><a href="{{route('change-password')}}">Change Password</a></li>
                        @endif

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('dashboard.index')}}" class="brand-link">
            <img src="https://ajk.gov.pk/logo/college_logo.jpg" alt="Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">JAC GoAJK </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            {{--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>--}}

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open {{ request()->is('/dashboard') ? 'active' : '' }}">
                        <a href="{{route('dashboard.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    @if(Auth::user()->user_type != 'admin' && count(Auth::user()->appliedStudent)==0)
                    <li class="nav-item has-treeview">
                        <a href="/personalInfo"  class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Personal Information
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="/qualification" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Qualification
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="/entrytest" class="nav-link ">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                MCAT Score
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="/documents" class="nav-link ">
                            <i class="nav-icon fas fa-pager"></i>
                            <p>
                                Documents
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{route('profile' , Auth::user()->id)}}" class="nav-link ">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                User Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="/challan" class="nav-link ">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Challan Form
                            </p>
                        </a>
                    </li>
                    @elseif(Auth::user()->user_type != 'admin' && count(Auth::user()->appliedStudent)>0)
                        <li class="nav-item has-treeview">
                            <a href="{{route('profile' , Auth::user()->id)}}" class="nav-link ">
                                <i class="nav-icon fas fa-user-check"></i>
                                <p>
                                    User Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/challan" class="nav-link ">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Challan Form
                                </p>
                            </a>
                        </li>
                    @elseif(Auth::user()->user_type == 'admin')
                        <li class="nav-item has-treeview {{ request()->is('/colleges') ? 'active' : '' }}">
                            <a href="/colleges" class="nav-link ">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                    Manage Institutions
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview {{ request()->is('/admissions') ? 'active' : '' }}">
                            <a href="{{route('admissions.index')}}" class="nav-link ">
                                <i class="nav-icon fas fa-school"></i>
                                <p>
                                    Manage Admissions
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview {{ request()->is('allStudents') ? 'active' : '' }}">
                            <a href="{{route('allStudents')}}" class="nav-link ">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Manage Students
                                </p>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item has-treeview ">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                <i class="nav-icon fas fa-sign-out-alt"></i>LogOut
                            </a>
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
        @yield('content')



    <!-- Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; AJK Information Technology Board</strong>
        All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="dist/js/pages/dashboard.js"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js" type="text/javascript"></script>

</body>
</html>
