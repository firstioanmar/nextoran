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
  <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  {{-- data table --}}

  {{-- <link rel="stylesheet" type="text/css" href="DataTables-1.10.18/css/dataTables.bootstrap4.css"/>
<link rel="stylesheet" type="text/css" href="Buttons-1.5.4/css/buttons.bootstrap4.css"/>
<link rel="stylesheet" type="text/css" href="FixedHeader-3.1.4/css/fixedHeader.bootstrap4.css"/>
<link rel="stylesheet" type="text/css" href="Responsive-2.2.2/css/responsive.bootstrap4.css"/>
<link rel="stylesheet" type="text/css" href="RowReorder-1.2.4/css/rowReorder.bootstrap4.css"/>
<link rel="stylesheet" type="text/css" href="Scroller-1.5.0/css/scroller.bootstrap4.css"/> --}}

  <style>

  .bg-nextoran{
    background: linear-gradient(to right,#333, #FF9933);
    background: -webkit-linear-gradient(left,#333, #FF9933);
    background: -o-linear-gradient(right,#333, #FF9933);
    background: -moz-linear-gradient(right,#333, #FF9933);
  }
    </style>
</head>
<body>
  <div id="app">
    <nav id="supernav" class="navbar navbar-dark sticky-top bg-nextoran flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">{{ config('app.name', 'Laravel') }}</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="/admin">
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/masakan">
                Masakan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/users">
                User
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                Laporan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/meja">
                Meja
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/level">
                Level
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/carousel">
                Carousel
              </a>
            </li>
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Change Color
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a id="warna1" class="dropdown-item" href="#"><img style="background: #FF6699" src="..." alt="" class="rounded-circle">Pink</a>
          <a id="warna2" class="dropdown-item" href="#">Ijo</a>
          <a id="warna3" class="dropdown-item" href="#">Biru</a>
        </li>
        </div>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
              </a>
            </li>
          </ul>
        </div>
      </nav>


      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          @yield('dashboard')
        </div>
      </main>

    </div>

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
  <script src="{{ asset('js/formbrowser.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#btnHideFooter').click(function () {
        $('#footer').slideToggle();
      })

      $('#btnHideMsg').click(function () {
        $('#msg').slideToggle();
      })

      $('#btnTambahMeja').click(function () {
        $('#tambahMeja').slideToggle();
      })

      $('#warna1').click(function () {
        $('#supernav').css('background','linear-gradient(to right,#333, #FF6699)');
        $('#supernav').css('background','-webkit-linear-gradient(left,#333, #FF6699)');
        $('#supernav').css('background','-o-linear-gradient(right,#333, #FF6699)');
        $('#supernav').css('background','-moz-linear-gradient(right,#333, #FF6699)');
      })

      $('#warna2').click(function () {
        $('#supernav').css('background','linear-gradient(to right,#333, #44FFAA)');
        $('#supernav').css('background','-webkit-linear-gradient(left,#333, #44FFAA)');
        $('#supernav').css('background','-o-linear-gradient(right,#333, #44FFAA)');
        $('#supernav').css('background','-moz-linear-gradient(right,#333, #44FFAA)');
      })

      $('#warna3').click(function () {
        $('#supernav').css('background','linear-gradient(to right,#333, #6699FF)');
        $('#supernav').css('background','-webkit-linear-gradient(left,#333, #6699FF)');
        $('#supernav').css('background','-o-linear-gradient(right,#333, #6699FF)');
        $('#supernav').css('background','-moz-linear-gradient(right,#333, #6699FF)');
      })

       bsCustomFileInput.init()

    });
  </script>

  {{-- <script type="text/javascript" src="JSZip-2.5.0/jszip.js"></script>
<script type="text/javascript" src="pdfmake-0.1.36/pdfmake.js"></script>
<script type="text/javascript" src="pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="DataTables-1.10.18/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="DataTables-1.10.18/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="Buttons-1.5.4/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="Buttons-1.5.4/js/buttons.bootstrap4.js"></script>
<script type="text/javascript" src="Buttons-1.5.4/js/buttons.flash.js"></script>
<script type="text/javascript" src="Buttons-1.5.4/js/buttons.html5.js"></script>
<script type="text/javascript" src="Buttons-1.5.4/js/buttons.print.js"></script>
<script type="text/javascript" src="FixedHeader-3.1.4/js/dataTables.fixedHeader.js"></script>
<script type="text/javascript" src="Responsive-2.2.2/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="RowReorder-1.2.4/js/dataTables.rowReorder.js"></script>
<script type="text/javascript" src="Scroller-1.5.0/js/dataTables.scroller.js"></script> --}}

</body>
</html>
