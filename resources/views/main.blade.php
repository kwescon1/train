<!doctype html>
<html lang="en">

    <head>
        @include('partials._head')
    </head>
    
    <style>
        body {
            
            background-color: #5b72e2;
        }
        .text-write{
            color:white;
        }
    </style>

    <body>
        
        <div class = "container">
            @include('partials._message')

            @yield('content')
       </div>
    </body>  

    @include('partials._javascript')

    @yield('scripts')
</html>