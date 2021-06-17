 <!-- Shop Categories
         ============================================= -->

 <?php if($promo_categories->count() > 0): ?>


     <div class="fancy-title title-border title-center mb-4">
         <h4>Shop popular categories</h4>
     </div>

     <div class="row shop-categories clearfix">
         <?php $__currentLoopData = $promo_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if($loop->first): ?>

                 <div class="col-lg-7">
                     <a href="<?php echo e(route('client.category', $category->slug)); ?>"
                         style="background: url('<?php echo e($category->icon); ?>') no-repeat right center; background-size: cover;">
                         <div class="vertical-middle dark center">
                             <div class="heading-block m-0 border-0">
                                 <h3 class="nott font-weight-semibold ls0"> <?php echo e($category->name); ?></h3>
                             </div>
                         </div>
                     </a>
                 </div>
             <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php $__currentLoopData = $promo_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

             <?php if($key != 0 && $key == 1): ?>

                 <div class="col-lg-5">
                     <a href="<?php echo e(route('client.category', $category->slug)); ?>"
                         style="background: url('<?php echo e($category->icon); ?>">
                         <div class="vertical-middle dark center">
                             <div class="heading-block m-0 border-0">
                                 <h3 class="nott font-weight-semibold ls0"><?php echo e($category->name); ?></h3>
                             </div>
                         </div>
                     </a>
                 </div>
             <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

         <?php $__currentLoopData = $promo_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

             <?php if($key != 0 && $key != 1): ?>

                 <div class="col-lg-4">
                     <a href="<?php echo e(route('client.category', $category->slug)); ?>"
                         style="background: url('<?php echo e($category->icon); ?>">
                         <div class="vertical-middle dark center">
                             <div class="heading-block m-0 border-0">
                                 <h3 class="nott font-weight-semibold ls0"><?php echo e($category->name); ?></h3>
                                 <small class="button bg-white text-dark button-light button-mini">Browse Now</small>
                             </div>
                         </div>
                     </a>
                 </div>
             <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     </div>
 <?php endif; ?>
 <!-- Featured Carousel
         ============================================= -->
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/partials/HomeCategory.blade.php ENDPATH**/ ?>