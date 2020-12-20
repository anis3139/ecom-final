<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Home</title>
    
    <!-- Font awesome -->
    <link href="<?php echo e(asset('client/css')); ?>/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo e(asset('client/css')); ?>/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="<?php echo e(asset('client/css')); ?>/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('client/css')); ?>/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('client/css')); ?>/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('client/css')); ?>/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="<?php echo e(asset('client/css')); ?>/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="<?php echo e(asset('client/css')); ?>/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="<?php echo e(asset('client/css')); ?>/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="<?php echo e(asset('client/css')); ?>/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo $__env->yieldContent('css'); ?>;
  </head>
  <body> 

<?php echo $__env->make('client.components.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('client.components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('client.components.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->yieldContent('content'); ?>

  
<?php echo $__env->make('client.components.newslatter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('client.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('client.components.loginModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo e(asset('client/js')); ?>/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="<?php echo e(asset('client/js')); ?>/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="<?php echo e(asset('client/js')); ?>/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="<?php echo e(asset('client/js')); ?>/sequence.js"></script>
  <script src="<?php echo e(asset('client/js')); ?>/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="<?php echo e(asset('client/js')); ?>/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="<?php echo e(asset('client/js')); ?>/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="<?php echo e(asset('client/js')); ?>/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="<?php echo e(asset('client/js')); ?>/nouislider.js"></script>
  <!-- Custom js -->
  <script src="<?php echo e(asset('client/js')); ?>/custom.js"></script> 
  <?php echo $__env->yieldContent('script'); ?>
  </body>
</html><?php /**PATH C:\Users\Windows 10\Documents\GitHub\ecom-final\frontend\resources\views/client/layouts/app.blade.php ENDPATH**/ ?>