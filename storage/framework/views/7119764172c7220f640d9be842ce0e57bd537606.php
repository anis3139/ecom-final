<?php if(Session::has('success')): ?>
    <script>
        toastr.success("<?php echo e(Session::get('success')); ?>", "Success", {
            closeButton: true,
            progressBar: true,
        })

    </script>
<?php endif; ?>
<?php if(Session::has('error')): ?>
    <script>
        toastr.error("<?php echo e(Session::get('error')); ?>", "Error",{
            closeButton: true,
            progressBar: true,
        })

    </script>
<?php endif; ?>
<?php if(Session::has('warning')): ?>
    <script>
        toastr.warning("<?php echo e(Session::get('warning')); ?>", "Warning",{
            closeButton: true,
            progressBar: true,
        })

    </script>
<?php endif; ?>
<?php if(Session::has('info')): ?>
    <script>
        toastr.info("<?php echo e(Session::get('info')); ?>", "Info",{
            closeButton: true,
            progressBar: true,
        })

    </script>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/component/toastr.blade.php ENDPATH**/ ?>