<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <?php if(count($errors) > 1 ): ?>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php else: ?>
        <?php echo e($errors->first()); ?>

        <?php endif; ?>
    </div>
<?php endif; ?>


<?php if(session()->has('message')): ?>
<div class="alert alert-<?php echo e(session('type')); ?>">
    <?php echo e(session('message')); ?>

</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/component/ErrorMassage.blade.php ENDPATH**/ ?>