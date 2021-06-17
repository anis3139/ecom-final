 <div class="row mt-5">
     <div class="col-12">
         <div class="fancy-title title-border title-center mb-4">
             <h4 class="text-uppercase">All Category</h4>
         </div>

         <ul class="clients-grid grid-2 grid-sm-3 grid-md-6 grid-lg-8 mb-0 justify-content-center">
             <?php $__currentLoopData = $allCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                     <li class="grid-item"><a href="<?php echo e(route('client.category', $category->slug)); ?>"><img src="<?php echo e($category->icon); ?>"
                         alt="Clients"></a></li>

             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


         </ul>
     </div>
 </div>
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/partials/Brand.blade.php ENDPATH**/ ?>