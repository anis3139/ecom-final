 <div class="fancy-title title-border mt-4 title-center">
     <h4>Weekly Featured Items</h4>
 </div>

 <div id="oc-products" class="owl-carousel products-carousel carousel-widget" data-margin="20" data-loop="true"
     data-autoplay="5000" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3"
     data-items-lg="4" data-items-xl="5">

     <?php $__currentLoopData = $featureProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featureProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <!-- Shop Item 1 ============================================= -->
         <div class="oc-item">
             <div class="product">
                 <div class="product-image">
                     <?php $i= 2; ?>
                     <?php $__currentLoopData = $featureProduct->img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php if($i > 0): ?>
                             <a
                                 href="<?php echo e(route('client.showProductDetails', ['slug' => $featureProduct->product_slug])); ?>"><img
                                     src="<?php echo e($images->image_path); ?>" alt="Round Neck T-shirts"></a>
                         <?php endif; ?>
                         <?php $i--; ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php if($featureProduct->product_in_stock): ?>
                         <div class="sale-flash badge badge-danger p-2">Sale!</div>
                     <?php else: ?>
                         <div class="sale-flash badge badge-secondary p-2">Out of Stock!</div>
                     <?php endif; ?>

                     <div class="bg-overlay">
                         <div class="bg-overlay-content align-items-end justify-content-between"
                             data-hover-animate="fadeIn" data-hover-speed="400">





                        <?php if(auth()->guard()->guest()): ?>
                             <a href="javascript:void(0);" onclick="toastr.info('To add Favorite List. You need to login first.','Info',{
                                closeButton: true,
                                progressBar: true,
                            })" class="btn btn-dark mr-2"><i class="icon-heart3"></i> <span> (<?php echo e($featureProduct->favorite_to_users->count()); ?>)</span></a>
                         <?php else: ?>
                             <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-<?php echo e($featureProduct->id); ?>').submit();"
                                class="<?php echo e(!Auth::user()->favorite_product->where('pivot.product_id',$featureProduct->id)->count()  == 0 ? 'favorite_posts' : ''); ?>"><i class="icon-heart3"></i><span class="text-dark">(<span class="favorite_posts"><?php echo e($featureProduct->favorite_to_users->count()); ?></span>)</span></a>

                             <form id="favorite-form-<?php echo e($featureProduct->id); ?>" method="POST" action="<?php echo e(route('client.favorite',$featureProduct->id)); ?>" style="display: none;">
                                 <?php echo csrf_field(); ?>
                             </form>
                         <?php endif; ?>





                             <a href="" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg"
                                 onclick="productDetailsModal(<?php echo e($featureProduct->id); ?>)"><i
                                     class="icon-line-expand"></i></a>
                         </div>
                         <div class="bg-overlay-bg bg-transparent"></div>
                     </div>
                 </div>
                 <div class="product-desc">
                     <div class="product-title mb-1">
                         <h3><a href="<?php echo e(route('client.showProductDetails', ['slug' => $featureProduct->product_slug])); ?>"><?php echo e($featureProduct->product_title); ?></a>
                         </h3>
                     </div>
                     <div class="product-price font-primary">
                         <?php if($featureProduct->product_price != $featureProduct->product_selling_price): ?><del
                                 class="mr-1">&#2547; <?php echo e($featureProduct->product_price); ?></del><?php endif; ?> <ins>&#2547; <?php echo e($featureProduct->product_selling_price); ?></ins>
                     </div>
                     <div class="product-rating">
                        <?php
                        $arr = $featureProduct->rating;
                        $sum = 0;
                        foreach ($arr as $item) {
                            $sum += $item['star_reating'];
                        }

                        if (count($arr) > 0) {
                            $average = $sum / count($arr);
                            $ratingValue = round(intval($average));
                        } else {
                            $ratingValue = 0;
                        }
                    ?>
                    <?php if($ratingValue > 0): ?>
                        <?php for($i = 0; $i < $ratingValue; $i++): ?>
                            <i class="icon-star3"></i>
                        <?php endfor; ?>
                        <?php
                            $emptyValue = 5 - $ratingValue;
                        ?>
                        <?php for($i = 0; $i < $emptyValue; $i++): ?>
                            <i class="icon-star-empty"></i>
                        <?php endfor; ?>
                        <?php else: ?>
                        <i class="icon-star-empty"></i>
                        <i class="icon-star-empty"></i>
                        <i class="icon-star-empty"></i>
                        <i class="icon-star-empty"></i>
                        <i class="icon-star-empty"></i>
                    <?php endif; ?>
                     </div>
                 </div>
             </div>
         </div>

     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </div>



<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/partials/WeeklyFeaturedItems.blade.php ENDPATH**/ ?>