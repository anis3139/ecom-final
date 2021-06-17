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
    <link rel="stylesheet" href="<?php echo e(asset('client')); ?>/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('client')); ?>/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('client')); ?>/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('client')); ?>/css/swiper.css" type="text/css" />

    <!-- shop Demo Specific Stylesheet -->
    <link rel="stylesheet" href="<?php echo e(asset('client')); ?>/demos/shop/shop.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('client')); ?>/demos/shop/css/fonts.css" type="text/css" />
    <!-- / -->

    <link rel="stylesheet" href="<?php echo e(asset('client')); ?>/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('client')); ?>/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('client')); ?>/css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="<?php echo e(asset('client')); ?>/css/custom.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="<?php echo e(asset('client')); ?>/css/colors.php?color=000000" type="text/css" />

    <link rel="stylesheet" href="<?php echo e(asset('client')); ?>/css/style.css">

    <?php echo $__env->yieldContent('css'); ?>

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
    <title><?php echo $__env->yieldContent('title'); ?></title>

</head>

<body class="stretched">

    <!-- Document Wrapper
 ============================================= -->

    

    <!-- Login Modal -->
    <?php echo $__env->make('client.component.LoginModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Top Bar
  ============================================= -->
    <?php echo $__env->make('client.component.Topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Header
  ============================================= -->
    <?php echo $__env->make('client.component.Header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('client.component.Footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Go To Top
 ============================================= -->
    <div id="gotoTop" class="icon-line-arrow-up"></div>

    <!-- JavaScripts
 ============================================= -->
    <script src="<?php echo e(asset('client')); ?>/js/jquery.js"></script>
    <script src="<?php echo e(asset('client')); ?>/js/plugins.min.js"></script>

    <!-- Footer Scripts
 ============================================= -->
    <script src="<?php echo e(asset('client')); ?>/js/functions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- ADD-ONS JS FILES -->

    <?php echo $__env->make('client.component.toastr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('script'); ?>


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
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/layouts/app.blade.php ENDPATH**/ ?>