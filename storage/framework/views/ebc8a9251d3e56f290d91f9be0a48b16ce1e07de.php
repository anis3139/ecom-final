
<?php $__env->startSection('title','Admin Login'); ?>
<?php $__env->startSection('content'); ?>

<div class="container ">
<div class="row justify-content-center d-flex mt-5 mb-5">

<div class="col-md-10 card">
  <div class="row">
    <div style="height: 450px" class="col-md-6 p-3">
      <form  action=" "  class="m-5 loginForm">

        <div class="form-group">
        <label for="exampleInputEmail1">User Name</label>
         <input required="" name="userName" value="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter User Name">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input  required="" name="userPassword"  value="" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <button name="submit" type="submit" class="btn btn-block btn-danger">Login</button>
        </div>
    </form>
</div>

<div style="height: 450px" class="col-md-6 bg-light">
<?php
$others=App\Models\OthersModel::first();
?>
<img class="w-75 m-5" src="<?php echo e($others->logo ?? asset('/admin/images/login.jpg')); ?>">
</div>
</div>
</div>




</div>
</div>


<?php $__env->stopSection(); ?>




<?php $__env->startSection('script'); ?>
<script type="text/javascript">


    $('.loginForm').on('submit',function (event) {
        event.preventDefault();
        let formData=$(this).serializeArray();
        let userName=formData[0]['value'];
        let password=formData[1]['value'];
        let url="<?php echo e(route('admin.onLogin')); ?>";
        axios.post(url,{
          username:userName,
          password:password
        }).then(function (response) {
          console.log(response.data);
           if(response.status==200 && response.data==1){
            toastr.success('Login Success.');
               window.location.href="<?php echo e(route('admin.adminHome')); ?>";
           }
           else{
               toastr.error('Login Fail ! Try Again');
           }

        }).catch(function (error) {
            toastr.error('Login Fail ! Try Again');
        })


    })

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.Layouts.appLogin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/admin/adminLogin.blade.php ENDPATH**/ ?>