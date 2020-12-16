<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/sidenav.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/datatables-select.min.css') }}" rel="stylesheet">
    <style>
        .topbar {
            margin-top: -24px !important;
        }
    </style>
    @yield('css');
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="fix-header fix-sidebar">

    @include('admin.Layouts.menu')




    @yield('content')



    </div>
    </div>
    <script type="text/javascript" src="{{ asset('admin/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/jquery.slimscroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/sidebarmenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/sticky-kit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/custom.min-2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/datatables-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/axios.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/custom.js') }}"></script>


    @yield('script')

</body>

</html>