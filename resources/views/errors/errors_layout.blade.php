<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" >
    @yield('styles')
</head>
<body>
<div class="container">
        <div class="row justify-content-center d-flex mt-5 mb-5">
            <div class="col-md-10 offset-md-1 card">
                        @yield('error-content')
            </div>
        </div>
    </div>

    
@yield('scripts')

</body>
</html>
