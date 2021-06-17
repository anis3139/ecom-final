<?php if($sliders): ?>

    <section id="slider" class="slider-element swiper_wrapper" data-autoplay="6000" data-speed="800" data-loop="true"
        data-grab="true" data-effect="fade" data-arrow="false" style="height: 600px;">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">

                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide dark">
                        <div class="container">
                            <div class="slider-caption slider-caption-center">
                                <div>
                                    <div class="h5 mb-2 font-secondary">
                                        <?php if($slider->title): ?>
                                            <?php echo e($slider->title); ?>

                                        <?php endif; ?>
                                    </div>
                                    <h2 class="bottommargin-sm text-white">
                                        <?php if($slider->sub_title): ?>
                                            <?php echo e($slider->sub_title); ?>

                                        <?php endif; ?>

                                    </h2>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide-bg" style="background-image:url('<?php echo e($slider->image); ?>')"></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/component/Slider.blade.php ENDPATH**/ ?>