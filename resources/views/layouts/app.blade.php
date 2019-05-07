<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Emplug</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('assets/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('assets/dist/css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('assets/bower_components/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}<!--  <a href="#" class="alert-link">Alert Link</a> -->.
        </div>
    @endif
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Emplug Sms</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                   <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
                        <i class=""></i>  <i class="fa fa-"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <i class="fa f"></i>  <i class="fa "></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        
                                    
                                    <!--<div class="progress progress-striped active">
                                        <!--<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">-->
                                                               </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
               
                    <a href="">{{ auth()->user()->email }}</a>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        </li>
                        <li class="divider"></li>
                         <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                       <!-- <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>-->
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

           <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                           <!-- <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>-->
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <!-- <li> -->
                            <!-- <ul class="nav nav-second-level"> -->
                                <li>
                                    <a href="/message">Individual Sms</a>
                                </li>
                                <li>
                                    <a href="/groupsms"">Group Sms</a>
                                </li>
                                <li>
                                    <a href="/giftsms"">Gift Sms</a>
                                </li>
                                 <li>
                                    <a href="/purchase"">Purchase Sms</a>
                                </li>
                                <li>
                                    <a href="#"">Contact</a>
                                </li>



                            <!-- </ul> -->
                            <!-- /.nav-second-level -->
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>

    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('assets/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('assets/bower_components/raphael/raphael-min.js') }}"></script>
    <!-- <script src="{{ asset('assets/bower_components/morrisjs/morris.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/js/morris-data.js') }}"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('assets/dist/js/sb-admin-2.js') }}"></script>
@stack('scripts')
</body>

</html>
