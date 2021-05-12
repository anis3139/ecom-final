<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
 ============================================= -->

    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Montserrat:300,400,500,600,700|Merriweather:300,400,300i,400i&display=swap"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('client') }}/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('client') }}/style.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('client') }}/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('client') }}/css/swiper.css" type="text/css" />

    <!-- shop Demo Specific Stylesheet -->
    <link rel="stylesheet" href="{{ asset('client') }}/demos/shop/shop.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('client') }}/demos/shop/css/fonts.css" type="text/css" />
    <!-- / -->

    <link rel="stylesheet" href="{{ asset('client') }}/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('client') }}/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('client') }}/css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="{{ asset('client') }}/css/custom.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="{{ asset('client') }}/css/colors.php?color=000000" type="text/css" />

    <link rel="stylesheet" href="{{ asset('client') }}/css/style.css">

    @yield('css')

    <style>
        @media (max-width: 767.98px) {
            .custom-menu-my-account {
                display: block;
            }
        }
        @media (min-width: 767.98px) {
            .custom-menu-my-account {
                display: none;
            }
        }
        .favorite_posts{
            color: red;
        }
    </style>
   

    <!-- Document Title
 ============================================= -->
    <title>{{env('APP_NAME')}}</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
 ============================================= -->

    {{-- @include('client.component.OnLoadModal') --}}

    <!-- Login Modal -->
    @include('client.component.LoginModal')

    <!-- Top Bar
  ============================================= -->
    @include('client.component.Topbar')
    <!-- Header
  ============================================= -->
    @include('client.component.Header')

    @yield('content')

    @include('client.component.Footer')

    <!-- Go To Top
 ============================================= -->
    <div id="gotoTop" class="icon-line-arrow-up"></div>

    <!-- JavaScripts
 ============================================= -->
    <script src="{{ asset('client') }}/js/jquery.js"></script>
    <script src="{{ asset('client') }}/js/plugins.min.js"></script>

    <!-- Footer Scripts
 ============================================= -->
    <script src="{{ asset('client') }}/js/functions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- ADD-ONS JS FILES -->

    @include('client.component.toastr')

    @yield('script')


    <script>
        $(document).ready(function() {
            $('.color-choose input').on('click', function() {
                var headphonesColor = $(this).attr('data-image');
                $('.active').removeClass('active');
                $('.left-column img[data-image = ' + headphonesColor + ']').addClass('active');
                $(this).addClass('active');
            });
        });
    </script>



</body>

</html>