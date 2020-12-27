<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daily Shop | Home</title>

    <!-- Font awesome -->
    <link href="{{ asset('client/css')}}/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('client/css')}}/bootstrap.css" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{ asset('client/css')}}/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css')}}/jquery.simpleLens.css">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css')}}/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css')}}/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('client/css')}}/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="{{ asset('client/css')}}/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{ asset('client/css')}}/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{ asset('client/css')}}/style.css" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .aa-login-form input[type="email"], .aa-login-form input[type="number"]{
        border: 1px solid #ccc;
        font-size: 16px;
        height: 40px;
        margin-bottom: 15px;
        padding: 10px;
        width: 100%;
        }
    }
    </style>
    @yield('css')
  </head>
  <body>

@include('client.components.preloader')
@include('client.components.header')
@include('client.components.menu')

  @yield('content')


@include('client.components.newslatter')
@include('client.components.footer')
@include('client.components.loginModal')
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ asset('client/js')}}/bootstrap.js"></script>
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="{{ asset('client/js')}}/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{ asset('client/js')}}/jquery.smartmenus.bootstrap.js"></script>
  <!-- To Slider JS -->
  <script src="{{ asset('client/js')}}/sequence.js"></script>
  <script src="{{ asset('client/js')}}/sequence-theme.modern-slide-in.js"></script>
  <!-- Product view slider -->
  <script type="text/javascript" src="{{ asset('client/js')}}/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="{{ asset('client/js')}}/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{ asset('client/js')}}/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{ asset('client/js')}}/nouislider.js"></script>
  <!-- Custom js -->
  <script src="{{ asset('client/js')}}/custom.js"></script>
<!-- Cart JS -->
  <script type="text/javascript" src="{{ asset('client/js')}}/cart.js"></script>
  @yield('script')
  </body>
</html>
