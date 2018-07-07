<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('webicon/cropped.png') }}" type="image/gif" sizes="16x16">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@if(Auth::check()) @yield('title', Route::currentRouteName()) @else @yield('title', __('titles.welcome')) @endif</title>
     @if (Auth::check())
              <link href="{{ asset('css/app.css') }}" rel="stylesheet">
              <link href="{{ asset('css/all.css') }}" rel="stylesheet">   
              <style type="text/css">

                html {
              overflow-x: hidden;
            }
            @font-face {
                   font-family: 'ChunkFiveRegular';
                   src: url('Chunkfive-webfont.eot');
                   src: url('Chunkfive-webfont.eot?#iefix') format('embedded-opentype'),
                   url('Chunkfive-webfont.woff') format('woff'),
                   url('Chunkfive-webfont.ttf') format('truetype'),
                   url('Chunkfive-webfont.svg#ChunkFiveRegular') format('svg');
                   font-weight: normal;
                   font-style: normal;
            }
            .allback {
              background: linear-gradient( 135deg, rgba(60, 8, 118, 0.8) 0%, rgba(250, 0, 118, 0.8) 100%);
            }
          .mafont {
            color: linear-gradient( 135deg, rgba(60, 8, 118, 0.8) 0%, rgba(250, 0, 118, 0.8) 100%);
          }
    </style>
    @elseif (Auth::guest())    
     <link rel="stylesheet" type="text/css" href="loginV1/vendor/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="loginV1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="loginV1/fonts/iconic/css/material-design-iconic-font.min.css">
       <link rel="stylesheet" type="text/css" href="loginV1/vendor/animate/animate.css">
      <link rel="stylesheet" type="text/css" href="loginV1/vendor/css-hamburgers/hamburgers.min.css">
      <link rel="stylesheet" type="text/css" href="loginV1/vendor/animsition/css/animsition.min.css">
      <link rel="stylesheet" type="text/css" href="loginV1/vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="loginV1/vendor/daterangepicker/daterangepicker.css">
       <link rel="stylesheet" type="text/css" href="loginV1/css/util.css">
      <link rel="stylesheet" type="text/css" href="loginV1/css/main.css">
    @endif   
</head>
<body class="hold-transition skin-blue sidebar-mini allback" style="height: auto; min-height: 100%;">
    <div id="app">
        <div class="wrapper">
   
     @if (Auth::guest())  
      @include('auth.innerlogin')
    @elseif (Auth::check())
    <header class="main-header">
       <a href="/" class="logo">    
       <span class="logo-mini"><b>H</b>S</span>
        <span class="logo-lg"><b>Healthso</b></span>
       </a>
     <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" id="togglemenu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
       <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('dist/img/avatar.png')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
      <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
          </li>
        </ul>
      </div>
        </nav>
      </header>
    @yield('content')
     @include("aside.aside")
     @include("confirm.confirm")
     <div  class="specialmodal"></div>
      @endif
    </div>
    </div>
    
       @push('scripts')    
          <script src="{{ asset('js/app.js') }}"></script>         
              <script src="{{ asset('js/all.js') }}"></script>   
             <script>
            $(document).ready(function () {
                populateCountries("nationality", "city");     
                $('.sidebar-menu').tree();
                $('.selectpicker').selectpicker();
               })
              
          </script>
      @endpush
     @if (Auth::check())
      @stack('scripts')
    @else
          <script src="loginV1/vendor/jquery/jquery-3.2.1.min.js"></script>
          <script src="loginV1/vendor/animsition/js/animsition.min.js"></script>
          <script src="loginV1/vendor/bootstrap/js/popper.js"></script>
          <script src="loginV1/vendor/bootstrap/js/bootstrap.min.js"></script>
          <script src="loginV1/vendor/select2/select2.min.js"></script>
          <script src="loginV1/vendor/daterangepicker/moment.min.js"></script>
          <script src="loginV1/vendor/daterangepicker/daterangepicker.js"></script>
          <script src="loginV1/vendor/countdowntime/countdowntime.js"></script>
          <script src="loginV1/js/main.js"></script>
    @endif
</body>
</html>



