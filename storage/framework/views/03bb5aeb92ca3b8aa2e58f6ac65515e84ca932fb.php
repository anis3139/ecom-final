<div id="top-bar" class="dark" style="background-color: #a3a5a7;">
			<div class="container">

				<div class="row justify-content-between align-items-center">

					<div class="col-12 col-lg-auto">
						<p class="mb-0 d-flex justify-content-center justify-content-lg-start py-3 py-lg-0"><strong><?php if($others): ?>
                        <?php echo e($others->title); ?>

                        <?php endif; ?></strong></p>
					</div>

					<div class="col-12 col-lg-auto d-none d-lg-flex">

						<!-- Top Links
						============================================= -->
						<div class="top-links">
							<ul class="top-links-container">
                                <?php if(auth()->guard()->check()): ?>
								<li class="top-links-item"><a href="<?php echo e(route('client.profile')); ?>">My Account</a></li>
                                <?php endif; ?>
								<li class="top-links-item"><a href="<?php echo e(route('client.showCart')); ?>">My Cart</a></li>
								<li class="top-links-item"><a href="<?php echo e(route('client.checkout')); ?>">Checkout</a></li>
								<li class="top-links-item"><a href="#">EN</a>
									<ul class="top-links-sub-menu">
										<li class="top-links-item"><a href="#"><img src="<?php echo e(asset('client')); ?>/images/icons/flags/french.png" alt="French"> FR</a></li>
										<li class="top-links-item"><a href="#"><img src="<?php echo e(asset('client')); ?>/images/icons/flags/italian.png" alt="Italian"> IT</a></li>
										<li class="top-links-item"><a href="#"><img src="<?php echo e(asset('client')); ?>/images/icons/flags/german.png" alt="German"> DE</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- .top-links end -->

						<!-- Top Social
						============================================= -->
						<ul id="top-social">
							<li><a href="<?php if($socialData): ?>
                                   <?php echo e($socialData->facebook); ?>

                                   <?php endif; ?>" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
							<li><a href="<?php if($socialData): ?>
                                   <?php echo e($socialData->twitter); ?>

                                   <?php endif; ?>" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
							<li><a href="tel:<?php if($others): ?> <?php echo e($others->phone); ?> <?php endif; ?>" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text"><?php if($others): ?> <?php echo e($others->phone); ?> <?php endif; ?></span></a></li>
							<li><a href="mailto: <?php if($others): ?>
                        <?php echo e($others->email); ?>

                        <?php endif; ?>" class="si-email3"><span class="ts-icon"><i class="icon-envelope-alt"></i></span><span class="ts-text"> <?php if($others): ?>
                        <?php echo e($others->email); ?>

                        <?php endif; ?></span></a></li>
						</ul><!-- #top-social end -->

					</div>
				</div>

			</div>
		</div>
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/component/Topbar.blade.php ENDPATH**/ ?>