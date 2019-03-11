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

      <style>
        .bg-nextoran{
          background: linear-gradient(to right,#333, #FF9933);
          background: -webkit-linear-gradient(left,#333, #FF9933);
          background: -o-linear-gradient(right,#333, #FF9933);
          background: -moz-linear-gradient(right,#333, #FF9933);
        }
        .kosong{
          margin-top: 80px;
        }
        .copyright {
          color: #fff;
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
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </li>
          @endif
          </ul>
        </div>
      </nav>
      <div class="kosong"></div>

      {{-- content --}}
        @yield('content')

                {{-- footer --}}
                <nav id="footer" class="navbar fixed-bottom navbar-dark bg-dark">
                    <div class="container">
                      {{--  Author : Firan
                      TM @firstioanmar_  --}}
                      <div class="copyright">
                        Copyright &copy; 2019 {{ config('app.name', 'Laravel') }}. All Right Reserved
                      </div>
                        <div class="text-right">
                          <button id="btnHideFooter" type="button" name="hide" class="btn btn-sm btn-outline-dark">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}"></script>
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
