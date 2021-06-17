<div class="modal1 mfp-hide" id="modal-register">
			<div class="card mx-auto" style="max-width: 540px;">
				<div class="card-header py-3 bg-transparent center">
					<h3 class="mb-0 font-weight-normal">Hello, Welcome Back</h3>
				</div>
				<div class="card-body mx-auto py-5" style="max-width: 70%;">

					<a href="<?php echo e(route('client.SSOLogin', 'facebook')); ?>" class="button button-large btn-block si-colored si-facebook nott font-weight-normal ls0 center m-0"><i class="icon-facebook-sign"></i> Log in with Facebook</a>

						<a href="<?php echo e(route('client.SSOLogin', 'google')); ?>" class=" mt-2 button button-large btn-block si-colored si-google nott font-weight-normal ls0 center m-0"><i class="icon-google"></i> Log in with Google</a>

				
					<div class="divider divider-center"><span class="position-relative" style="top: -2px">OR</span></div>

					<form id="login-form" name="login-form" class="mb-0 row" action="<?php echo e(route('client.onlogin')); ?>" method="post">
                            <?php echo csrf_field(); ?>
						<div class="col-12">
							<input type="email" id="login-form-username" name="email" value="<?php echo e(old('email')); ?>" class="form-control not-dark" placeholder="Username" />
						</div>

						<div class="col-12 mt-4">
							<input type="password" id="login-form-password" name="password" value="" class="form-control not-dark" placeholder="Password" />
						</div>

						<div class="col-12">
							<a href="<?php echo e(route('client.forgot')); ?>" class="float-right text-dark font-weight-light mt-2">Forgot Password?</a>
						</div>

						<div class="col-12 mt-4">
							<button class="button btn-block m-0" id="login-form-submit" name="login-form-submit" value="login">Login</button>
						</div>
					</form>
				</div>
				<div class="card-footer py-4 center">
					<p class="mb-0">Don't have an account? <a href="<?php echo e(route('client.registration')); ?>"><u>Sign up</u></a></p>
				</div>
			</div>
		</div>
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/component/LoginModal.blade.php ENDPATH**/ ?>