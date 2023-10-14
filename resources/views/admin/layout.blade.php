<!DOCTYPE html>
<html lang="vn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
        <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
        
        <!-- Bootstrap Core CSS -->
        <link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ url('/css/metisMenu.min.css') }}" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="{{ url('/css/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="{{ url('/css/dataTables/dataTables.responsive.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ url('/css/startmin.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ url('/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            a:hover {
                text-decoration: none;
            }
        </style>
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">Admin-0306201535</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="{{route('index')}}"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> Tài khoản <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            
                            <li>
                                <a href="#"><i class="fa fa-gear fa-fw"></i> Cài đặt</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
            </nav>

            <aside class="sidebar navbar-default" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{route('indexProducts')}}"><i class="fa fa-dashboard fa-fw"></i> Sản phẩm</a>
                        </li>
                        
                        <li>
                            <a href="{{route('indexCates')}}"><i class="fa fa-table fa-fw"></i> Loại sản phẩm</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </aside>
            <!-- /.sidebar -->
            @yield('content')
            

        </div>
        <!-- /#wrapper -->
        
        <!-- jQuery -->
        <script src="{{ url('/js/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ url('/js/bootstrap.min.js') }}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ url('/js/metisMenu.min.js') }}"></script>

        <!-- DataTables JavaScript -->
        <script src="{{ url('/js/dataTables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('/js/dataTables/dataTables.bootstrap.min.js') }}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ url('/js/startmin.js') }}"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            @if(session('success'))
                Swal.fire({
                    title: 'Thành công!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif
        </script>
        
        
   </body>

</html>