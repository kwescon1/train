<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')  RAILWAY RESERVATION SYSTEM</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('css/simple-sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    @stack('css')
</head>

<body>
    <div id="wrapper" class="toggled">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>
                <li class="active">
                    <a href="">Colleges</a>
                </li>
                <li>
                    <a href="">Halls</a>
                </li>
                <li>
                    <a href="">Levels</a>
                </li>
                <li>
                    <a href="">Members</a>
                </li>
                <li>
                    <a href="">Programmes</a>
                </li>
                <li>
                    <a href="">Regions</a>
                </li>
                <li>
                    <a href="">Residences</a>
                </li>
                <li>
                    <a href="">Wings</a>
                </li>
                <li>
                    <a href="">Zones</a>
                </li>
            </ul>
        </div><!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            {{-- beginning of navbar --}}
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
                <a class="nav-link" href="#menu-toggle" id="menu-toggle">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">(current)</span>
                </a>
                <a class="navbar-brand" href="#">
                    NUPS-G KNUST Member Database</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="">{{ __('Home') }}</a>
                        </li>
                        @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endauth
                    </ul>
                </div>
            </nav> {{-- end of navbar --}}

            <div class="container-fluid py-4 px-4">
                @include('partials._message')
                <div class="card master">
                    <div class="card-body">
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    @stack('scripts')
</body>

</html>