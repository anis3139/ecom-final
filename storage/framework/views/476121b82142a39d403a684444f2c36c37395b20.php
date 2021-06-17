<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Varifiacation Mail</title>
    <style>
        button{
            width: 200px;
            height: 50px;
            background-color: blue;
            color: white;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <h1>Hello  <?php echo e($user->name); ?></h1>
    <p>Welcome To Our Ecommerce System</p>
    <p>Please Click The Following Link to Reset Your Password</p>
    <?php
         $passRecoveryTokentoken=$user->email."-".Str::random(40);
    ?>
    <a href="<?php echo e(route('client.recoverPassWord',  $passRecoveryTokentoken)); ?>"><button>Click Here</button></a>
    <h3>Thanks For Registration</h3>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/mail/PasswordRecoveryMail.blade.php ENDPATH**/ ?>