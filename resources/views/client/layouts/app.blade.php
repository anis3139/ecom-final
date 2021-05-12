<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Stylesheets  -->

    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Montserrat:300,400,500,600,700|Merriweather:300,400,300i,400i&display=swap"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('client') }}/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('client') }}/css/colors.php?color=000000" type="text/css" />
    <link rel="stylesheet" href="{{ asset('client') }}/css/style.css">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
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

        .favorite_posts {
            color: red;
        }

    </style>


    <!-- Document Title
 ============================================= -->
    <title>{{ env('APP_NAME') }}</title>

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

    <!-- JavaScripts -->
    <script src="{{ asset('client') }}/js/plugins.min.js"></script>
    <script src="asset('js/app.js')"></script>
    <!-- JavaScripts -->
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
