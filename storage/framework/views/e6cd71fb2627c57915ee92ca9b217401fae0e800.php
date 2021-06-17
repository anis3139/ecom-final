<?php
$HomeSFSectionData = json_decode(
    App\Models\homeSpecialFeaturesModel::orderBy('id', 'desc')
        ->limit(3)
        ->get(),
);
?>
<div class="container clearfix">

    <div class="row col-mb-50 mb-0">
        <?php $__currentLoopData = $HomeSFSectionData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $HomeSFData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-lg-4">

                <div class="heading-block fancy-title border-bottom-0 title-bottom-border">
                    <h4>
                        <?php if($HomeSFData): ?><?php echo e($HomeSFData->title); ?><?php endif; ?>
                    </h4>
                </div>

                <p>
                    <?php if($HomeSFData): ?><?php echo e($HomeSFData->description); ?><?php endif; ?>
                </p>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/component/SpecialFeatureSection.blade.php ENDPATH**/ ?>