<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ env('APPLICATION_NAME') ?? 'Ecommerce' }} || @yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/sidenav.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/datatables.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('admin/css/bootstrap-colorpicker.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('admin/css/datatables-select.min.css') }}" rel="stylesheet">
    <link rel="icon" href="@if ($setting) {{ $setting->logo }} @endif"
        type="image/gif" sizes="16x16">

    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @yield('css');
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .ck-editor__editable {
            min-height: 200px;
            width: 100%;
        }

        .ck.ck-reset.ck-editor.ck-rounded-corners {
            width: 100%;
        }

        .topbar {
            background: #ffffff;
            position: relative;
            z-index: 50;
            top: -26px;
        }

    </style>
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
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-colorpicker.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script type="text/javascript" src="{{ asset('admin/js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/editor/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/editor/ckfinder/ckfinder.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        var host = window.document.location.host;
        var hostArr = host.split(':');
        let SiteUrl;
        if(hostArr[0]=='127.0.0.1' ){
            SiteUrl = window.location.protocol + '//' + window.document.location.host;
        }{
            SiteUrl = window.location.protocol + '//' + window.document.location.host+'/public';
        }

        var MyEditor;

        document.querySelectorAll('.ckeditor').forEach(e => {
            ClassicEditor
                .create(e, {
                    ckfinder: {
                        // Upload the images to the server using the CKFinder QuickUpload command.

                        uploadUrl: SiteUrl +
                            '/admin/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json'
                    }
                })
                .then(editor => {
                    window.editor = editor;
                    MyEditor = window.editor;
                    editor.model.document.on('change:data', () => {
                        e.value = editor.getData();

                    });
                })
                .catch(error => {
                    console.error(error);
                })
        })
    </script>


    @yield('script')

</body>

</html>
