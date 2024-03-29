<!DOCTYPE html>
<html>
<head>
    <title>Laravel - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="{{ url('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ url('/main.css') }}">
    
    <!-- IonIcons -->
    <link rel="stylesheet" href="{{ url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <style type="text/css">
        @import url({{ url('https://fonts.googleapis.com/css?family=Raleway:300,400,600') }});
    </style>
    
</head>
<body>

    
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
   
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li> --}}
                @else
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li> --}}
                @endguest
            </ul>
  
        </div>
    </div>
</nav>
  
@if (session('success'))
<div class="alert alert-success successMessage" role="alert">
    {{ session('success') }}
</div>
@endif

@yield('content')

<script>
    setTimeout(function(){
      document.getElementsByClassName('successMessage')[0].remove();
    }, 3000);
</script>

<script src="{{url('/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{ url('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('/dist/js/adminlte.js') }}"></script>
<script src="{{ url('/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ url('/dist/js/demo.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ url('/dist/js/adminlte.min.js') }}"></script>
<script src="{{ url('/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

     
</body>
</html>