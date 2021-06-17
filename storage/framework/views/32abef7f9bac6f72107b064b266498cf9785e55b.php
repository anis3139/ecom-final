<?php
 $HomeTestimonialDatas= json_decode(App\Models\TestimonialModel::orderBy('id', 'desc')->limit(3)->get());
?>


  <div class="section footer-stick" style="background-color: #fff !important;">

    <h4 class="text-uppercase center">What <span>Clients</span> Say?</h4>

    <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
        <div class="flexslider">
            <div class="slider-wrap">

                <?php $__currentLoopData = $HomeTestimonialDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $HomeTestimonialData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="slide">
                    <div class="testi-image">
                        <a href="#"><img src="<?php if($HomeAboutSectionData): ?><?php echo e($HomeTestimonialData->image); ?><?php endif; ?>" alt="Customer Testimonails"></a>
                    </div>
                    <div class="testi-content">
                        <p><?php if($HomeAboutSectionData): ?><?php echo nl2br(e( $HomeTestimonialData->description)); ?><?php endif; ?></p>
                        <div class="testi-meta">
                            <?php if($HomeAboutSectionData): ?><?php echo e($HomeTestimonialData->name); ?><?php endif; ?>
                            <span><?php if($HomeAboutSectionData): ?><?php echo e($HomeTestimonialData->date); ?><?php endif; ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/component/Testimonial.blade.php ENDPATH**/ ?>