<section class="isotope-section">
    <div class="container">
      <ul class="filter-menu">
        <li data-target="all">All</li>
        
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li data-target="#<?php echo e($category->id); ?>"><?php echo e($category->name); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
    </ul>
  
    <ul class="filter-item">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $products=App\Models\product_table::with(['img'])->where('product_category_id', $catItem->id)->where('product_active', 1)->take(20)->get();
        ?>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li data-item="#<?php echo e($product->product_category_id); ?>">
            <?php  $i= 1; ?>
                                    <?php $__currentLoopData = $product->img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($i > 0): ?>
            <a href="<?php echo e(route('client.showProductDetails', ['slug'=>$product->product_slug])); ?>"><img src="<?php echo e($images->image_path); ?>" alt="<?php echo e($product->product_title); ?>"></a>
            
            <?php endif; ?>
            <?php $i--; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <div class="filter-details">
             <h6><span><?php echo e($product->product_title); ?></span></h6>
    
          </div>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
   
    </div>
    
    
    </section>

</div><?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/aboutPartial/aboutProducts.blade.php ENDPATH**/ ?>