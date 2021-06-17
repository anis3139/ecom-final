<nav class="primary-menu">
    <ul class="menu-container">
        <?php if(auth()->guard()->check()): ?>
            <li class="menu-item custom-menu-my-account"><a class="menu-link" href="<?php echo e(route('client.profile')); ?>">
                    <div>My Account</div>
                </a>
            </li>
        <?php endif; ?>


        <li class="menu-item"><a class="menu-link" href="<?php echo e(route('client.home')); ?>">
                <div>Home</div>
            </a>
        </li>

        <li class="menu-item"><a class="menu-link" href="<?php echo e(route('client.shop')); ?>">
                <div>Shop</div>
            </a></li>
        <?php $__currentLoopData = App\Models\ProductsCategoryModel::orderby('name', 'asc')->where('parent_id', 0)->where('is_menu', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="menu-item">
                <a class="menu-link" href="<?php echo e(route('client.category', $parentCat->slug)); ?> ">
                    <div><?php echo e($parentCat->name); ?></div>
                </a>
                <?php
                    $childcats = App\Models\ProductsCategoryModel::orderby('name', 'asc')
                        ->where('parent_id', $parentCat->id)
                        ->get();
                ?>
                <?php if($childcats->count() > 0): ?>
                    <ul class="sub-menu-container">
                        <?php $__currentLoopData = $childcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="menu-item">
                                <a class="menu-link" href="<?php echo e(route('client.category', $childCat->slug)); ?>">
                                    <div><?php echo e($childCat->name); ?></div>
                                </a>
                            </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <li class="menu-item"><a class="menu-link" href="<?php echo e(route('client.about')); ?>">
                <div>About</div>
            </a>
        </li>
        <li class="menu-item"><a class="menu-link" href="<?php echo e(route('client.blog')); ?>">
                <div>News Feed</div>
            </a>
        </li>


        <li class="menu-item"><a class="menu-link" href="<?php echo e(route('client.contact')); ?>">
                <div>Contact</div>
            </a>
        </li>

        <?php if(auth()->guard()->check()): ?>
            <li class="menu-item d-sm-block d-md-none"><a onClick="return confirm('Are you sure you want to Logout?')" class="menu-link" href="<?php echo e(route('client.logout')); ?>">
                    <div>
                       <i class="text-danger icon-line-power mr-1 position-relative" style="top: 1px;"></i>Logout
                    </div>
                </a>
            </li>
        <?php endif; ?>
    </ul>

</nav>
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/component/Menu.blade.php ENDPATH**/ ?>