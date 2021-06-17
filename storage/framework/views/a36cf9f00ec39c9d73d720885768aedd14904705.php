<div class="main-div">
<section class="about-section">
    <div class="container">
        <div class="containt">
            <div class="row">
  <?php
      $HomeAboutSectionData= json_decode(App\Models\HomeAboutSecTionModel::orderBy('id', 'desc')->get()->first());
  ?>
                <div class="col-md-5">
                    <div class="left-contain">
                        <img src="<?php if($HomeAboutSectionData): ?><?php echo e($HomeAboutSectionData->image1); ?><?php endif; ?>" alt="">
                    </div>
                </div>
  
            <div class="col-md-7 ">
                <div class="right-contain">
                    <div class="right-header">
                        <h1><?php if($HomeAboutSectionData): ?><?php echo nl2br(e( $HomeAboutSectionData->title)); ?><?php endif; ?></h1>
                    </div>
                    <div class="right-details">
                        <p><?php if($HomeAboutSectionData): ?><?php echo nl2br(e( $HomeAboutSectionData->description)); ?><?php endif; ?></p>
                    </div>
                </div>
            </div>
        </div>
  
    </div>
  </section><?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/aboutPartial/aboutIntro.blade.php ENDPATH**/ ?>