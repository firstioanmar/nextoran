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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pagination.css') }}" rel="stylesheet">

      <style>
        .bg-nextoran{
          background: linear-gradient(to right,#333, #FF9933);
          background: -webkit-linear-gradient(left,#333, #FF9933);
          background: -o-linear-gradient(right,#333, #FF9933);
          background: -moz-linear-gradient(right,#333, #FF9933);
          color: #fff;
        }
        .kosong{
          margin-top: 50px;
        }
      </style>
</head>
<body>
    <div id="app">
      <nav class="navbar navbar-expand-xl fixed-top bg-nextoran navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/menu') }}">Menu</a></li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">
                Order
              </a>
            </li>
          </ul>
        </div>
      </nav>

      {{-- content --}}
        @yield('content')

        <div class="kosong"></div>

                {{-- footer --}}
                <nav id="footer" class="navbar fixed-bottom navbar-dark bg-dark">
                    <div class="container">
                      {{--  Author : Firan
                      TM @firstioanmar_  --}}
                      <span class="text-light">
                        Copyright &copy; 2019 {{ config('app.name', 'Laravel') }}. All Right Reserved
                      </span>
                        <div class="text-right">
                          <button id="btnHideFooter" type="button" name="hide" class="btn btn-sm btn-outline-dark">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    </div>
                </nav>
            </div>



            <!-- Scripts -->
            <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
            <script src="{{ asset('js/popper.min.js') }}"></script>
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>

            <script type="text/javascript">
            $(document).ready(function(){
             $('#btnHideFooter').click(function () {
               $('#footer').slideToggle();
            })

           });
            </script>

</body>
</html>
