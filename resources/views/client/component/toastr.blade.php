@if (Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}", "Success", {
            closeButton: true,
            progressBar: true,
        })

    </script>
@endif
@if (Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}", "Error",{
            closeButton: true,
            progressBar: true,
        })

    </script>
@endif
@if (Session::has('warning'))
    <script>
        toastr.warning("{{ Session::get('warning') }}", "Warning",{
            closeButton: true,
            progressBar: true,
        })

    </script>
@endif
@if (Session::has('info'))
    <script>
        toastr.info("{{ Session::get('info') }}", "Info",{
            closeButton: true,
            progressBar: true,
        })

    </script>
@endif
