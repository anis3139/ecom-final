
 <div class="section my-4">
     <div class="container">
         <div class="row align-items-stretch">
             <div class="col-md-5">
                 <div class="row">
                     <div class="col-md-12 center p-5">
                         <div class="heading-block mb-1 border-bottom-0 mx-auto">

                             <h3 class="nott ls0">New Arrivals</h3>
                             <p class="font-weight-normal mt-2 mb-3 text-muted"
                                 style="font-size: 17px; line-height: 1.4">
                                 <?php if($others): ?> <?php echo e($others->sub_title); ?> <?php endif; ?>
                             </p>
                             <a href="<?php echo e(route('client.shop')); ?>"
                                 class="button bg-dark text-white button-dark button-small ml-0">Shop
                                 Now</a>
                         </div>
                     </div>
                     <div class="col-6">
                         <a href="<?php if($others): ?> <?php echo e($others->promo_image_three); ?> <?php endif; ?>" data-lightbox="image"><img src="<?php if($others): ?> <?php echo e($others->promo_image_three); ?> <?php endif; ?>" alt="Image"></a>
                     </div>
                     <div class="col-6">
                         <a href="<?php if($others): ?> <?php echo e($others->promo_image_two); ?> <?php endif; ?>" data-lightbox="image"><img src="<?php if($others): ?> <?php echo e($others->promo_image_two); ?> <?php endif; ?>" alt="Image"></a>
                     </div>
                 </div>
             </div>
             <div class="col-md-7 min-vh-50">
                 <a href="<?php if($socialData): ?><?php echo e($socialData->linkin); ?><?php endif; ?>" data-lightbox="iframe"
                     class="d-block position-relative h-100" style="background: url('<?php if($others): ?> <?php echo e($others->promo_image_one); ?> <?php endif; ?>') center center
                     no-repeat; background-size: cover;">
                     <div class="vertical-middle text-center">
                         <div class="play-icon"><i class="icon-play-sign display-3 text-light"></i></div>
                     </div>
                 </a>
             </div>
         </div>
     </div>
 </div>
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/partials/FreshArrivalPromo.blade.php ENDPATH**/ ?>