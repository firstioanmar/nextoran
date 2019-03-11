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
</head>
<body>

  <style media="screen">
      body {
        background: linear-gradient(to right,#333, #FF9933);
        background: -webkit-linear-gradient(left,#333, #FF9933);
        background: -o-linear-gradient(right,#333, #FF9933);
        background: -moz-linear-gradient(right,#333, #FF9933);
      }
      .kosong{
        margin-top: 120px;
      }
      .copyright {
        color: #fff;
      }
  </style>

    <div id="app">
        @yield('content')
        <div class="kosong"></div>
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
