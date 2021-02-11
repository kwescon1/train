 <nav class="navbar navbar-light bg-transparent text-white justify-content-between mx-auto">
    <h1 class="head" style="font-size:2vw;"><b style="font-size:5vw">R</b>AILWAY 
        <b style="font-size:5vw">R</b>ESERVATION <b style="font-size:5vw">S</b>YSTEM</h1>

    @auth
        <a id="navbarDropdown" class="nav-link navbar-right" href="#" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <strong style="color:white">Welcome <i class="fa fa-welcome"></i> {{ Auth::user()->name }}</strong> 
        </a> 
    @endauth
</nav>

 <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarToggleExternalContent">
        <ul class="navbar-nav navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about">ABOUT US</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact">CONTACT US</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">REGISTER <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item" method="POST">
                @if (Auth::check())   
                
                <li class="nav-item">
                    <a class="nav-link" href="book">BOOK TICKET</a>
                </li>
                    <li class="nav-item">
                        <a class="btn btn-default" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('LOGOUT') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </li>
                    
                @else
                    <a href="{{ route('login') }}" class="btn btn-default">LOGIN</a>

                @endif       
            </li>
        </ul>
    </div>
</nav>