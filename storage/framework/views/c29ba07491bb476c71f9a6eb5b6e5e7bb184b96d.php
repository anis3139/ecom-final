  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <?php
              $HomeSFSectionData= json_decode(App\Models\homeSpecialFeaturesModel::orderBy('id', 'desc')->limit(3)->get());
                $icon=['fa-truck', 'fa-clock-o', 'fa-phone' ]
            ?>

            <?php $__currentLoopData = $HomeSFSectionData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $HomeSFData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa <?php echo e($icon[$loop->index]); ?>"></span>
                <h4><?php if($HomeSFData): ?><?php echo e($HomeSFData->title); ?><?php endif; ?></h4>
                <P><?php if($HomeSFData): ?><?php echo e($HomeSFData->description); ?><?php endif; ?></P>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          </div>
        </div>
      </div>
    </div>
  </section><?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/component/specialFeatureSection.blade.php ENDPATH**/ ?>