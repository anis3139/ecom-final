
<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('content'); ?>


<div class="container">
	<div class="row">

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title"><?php echo e($TotalVisitor); ?></h3>
					<h3 class="count-card-text">Total Visitor</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title"><?php echo e($TotalProduct); ?></h3>
					<h3 class="count-card-text">Total Products</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title"><?php echo e($TotalCategory); ?></h3>
					<h3 class="count-card-text">Total Categories</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title"><?php echo e($TotalBrand); ?></h3>
					<h3 class="count-card-text">Total Brand</h3>
				</div>
			</div>
		</div>
		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title"><?php echo e($TotalContact); ?></h3>
					<h3 class="count-card-text">Total Contacts</h3>
				</div>
			</div>
		</div>
		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title"><?php echo e($Orders); ?></h3>
					<h3 class="count-card-text">Total Orders</h3>
				</div>
			</div>
		</div>

	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.Layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/admin/home.blade.php ENDPATH**/ ?>