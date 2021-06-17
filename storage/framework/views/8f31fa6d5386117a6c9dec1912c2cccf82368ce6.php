
<footer id="footer" class=" border-0" style="background-color: #cfcece; color:#000;">

    <div class="container clearfix">

        <!-- Footer Widgets
    ============================================= -->
        <div class="footer-widgets-wrap pb-3 border-bottom clearfix">

            <div class="row">
                <div class="col-lg-2 col-md-2 col-6">
                    <div class="widget clearfix">

                        <h4 class="ls0 mb-3 nott">Menu</h4>

                        <ul class="list-unstyled iconlist ml-0">
                            <li><a href="<?php echo e(route('client.home')); ?>">Home</a></li>
                            <li><a href="<?php echo e(route('client.about')); ?>">About</a></li>
                            <li><a href="<?php echo e(route('client.shop')); ?>">Shop</a></li>
                            <li><a href="<?php echo e(route('client.contact')); ?>">Contact</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-6">
                    <div class="widget clearfix">

                        <h4 class="ls0 mb-3 nott">Meta</h4>

                        <ul class="list-unstyled iconlist ml-0">
                            <?php if(auth()->guard()->check()): ?>
                            <li><a href="<?php echo e(route('client.logout')); ?>">Logout</a></li>

                                <li><a href="<?php echo e(route('client.profile')); ?>">My Account</a></li>
                            <?php endif; ?>
                            <?php if(auth()->guard()->guest()): ?>
                            <li><a href="<?php echo e(route('client.login')); ?>">Login</a></li>
                            <?php endif; ?>
                            <li><a href="<?php echo e(route('client.showCart')); ?>">My Cart</a></li>
                            <li><a href="<?php echo e(route('client.checkout')); ?>">Checkout</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-6">
                    <div class="widget clearfix">

                        <h4 class="ls0 mb-3 nott">Category</h4>

                        <ul class="list-unstyled iconlist ml-0">
                            <?php $__currentLoopData = App\Models\ProductsCategoryModel::orderby('name', 'asc')->where('parent_id', 0)->where('is_menu', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a
                                        href="<?php echo e(route('client.category', $parentCat->slug)); ?>"><?php echo e($parentCat->name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="widget clearfix">
                        <h4 class="ls0 mb-3 nott">Contact Us</h4>

                        <div class="widget subscribe-widget mt-2 clearfix">
                            <p class="mb-1">
                                <?php if($others): ?>
                                    <?php echo nl2br(e($others->address)); ?>

                                <?php endif; ?>
                            </p>

                            <p class="mb-1 ">
                                <?php if($others): ?>
                                <i class="icon-call" style="font-size: 15px"></i> &nbsp; <a href="tel:<?php echo e($others->phone); ?>"><?php echo nl2br(e($others->phone)); ?></a>
                                <?php endif; ?>
                            </p>
                            <p class="mb-1">
                                <?php if($others): ?>
                                <i class="icon-email" style="font-size: 15px"></i> &nbsp; <a href="mailto:<?php echo e($others->email); ?>"><?php echo nl2br(e($others->email)); ?></a>
                                <?php endif; ?>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-6 text-center d-none d-md-block">
                    <div class="widget clearfix">
                        <h4 class="ls0 mb-3 nott">About us</h4>

                        <div class="widget subscribe-widget mt-2 clearfix">
                            <div class="text-center">
                                <a href="<?php echo e(route('client.home')); ?>"><img src=" <?php if($others): ?>
                                    <?php echo e($others->logo); ?>

                                <?php endif; ?>" alt="" width="120px" height="auto"></a>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div><!-- .footer-widgets-wrap end -->

    </div>

    <!-- Copyrights
   ============================================= -->
    <div id="copyrights" class="bg-dark text-light">

        <div class="container clearfix">

            <div class="row justify-content-between align-items-center">
                <div class="col-md-6">
                    Copyrights &copy; 2020 All Rights Reserved by <a class="text-light font-weight-bold ml-1" href="https://facebook.com/anis3139">Anis
                        Arronno</a><br>

                </div>

                <div class="col-md-6 d-md-flex flex-md-column align-items-md-end mt-4 mt-md-0">
                    <div class="copyrights-menu copyright-links clearfix text-light">
                        <a class="text-light" href="<?php echo e(route('client.about')); ?>">About</a>/
                        <a class="text-light" href="<?php echo e(route('client.showCart')); ?>">My Cart</a>/
                        <a class="text-light" href="<?php echo e(route('client.checkout')); ?>">Checkout</a>/
                        <a class="text-light" href="<?php echo e(route('client.contact')); ?>">Contact</a>
                    </div>
                </div>
            </div>

        </div>

    </div><!-- #copyrights end -->

</footer>
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/component/Footer.blade.php ENDPATH**/ ?>