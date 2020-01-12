<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="VRLib">
    <title>Home - VRLib</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">VRLib</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="{{ url('/')}}">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ url('aboutus')}}">About Us</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ url('contactus')}}">Contact Us</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ url('loginR')}}">Login</a></li>
                    @if(auth()->user() != null)
                        @if(auth()->user()->role == 'BasicAdmin')
                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{ url('/Basicindex')}}">Profile</a></li>
                        @else
                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{ url('/Adminindex')}}">Profile</a></li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


     <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="{{ url('/')}}">Home</a></li>
                        <li><a href="{{ url('registerR')}}">Sign up</a></li>
                        <li><a href="{{ url('loginR')}}">Sign in</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="{{ url('contactus')}}">Contact us</a></li>
                        <li><a href="{{ url('aboutus')}}">About us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2019 @HeshamFawzy</p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/script.min.js')}}"></script>
</body>

</html>