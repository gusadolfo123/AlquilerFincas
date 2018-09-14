<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/myStyles.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

        <nav class="navbar navbar-expand-lg navbar-dark bg-success centrar_texto">

            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 text-center">
                <a class="navbar-brand" href="#">{{ config('app.name', 'Alquiler Fincas') }}</a>
            </div>
            
            <button class="navbar-toggler col-sm-12 color_toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                @guest
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                    </li>
                </ul>   
                @else    
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('Admin.index') }}">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('farms.index') }}">Fincas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('departments.index') }}">Departamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tracks.index') }}">Vias</a>
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('seasons.index') }}">Temporadas</a>
                    </li>                 
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customers.index') }}">Clientes</a>
                    </li>                 
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                </ul>  
                @endguest
            </div>
        </nav>

        @if(session('info'))
            <div class="container mt-3">
                <div class="row-fluid">
                    <div class="alert alert-success alert-dismissible mb-0 fade show" role="alert">
                        {{ session('info') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div> 
            </div>
        @endif
        
        
        @if(count($errors))
            <div class="container mt-3">
                <div class="row-fluid">
                    <div class="alert alert-danger alert-dismissible mb-0 fade show" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div> 
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-1.12.4.js') }}"></script>     
    <!-- FlexSlider -->
    <script src="{{ asset('js/jquery.flexslider.js') }}"></script>  
    <script src="{{ asset('js/lightbox.js') }}"></script>  
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
  
    
    
    @yield('scripts')

</body>
</html>
