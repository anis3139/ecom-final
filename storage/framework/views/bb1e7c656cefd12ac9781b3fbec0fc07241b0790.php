<?php $__env->startSection('title', 'My Cart'); ?>
<?php $__env->startSection('css'); ?>
    <style>
        .blogImg {
            margin: 10px;
            text-align: center;
        }

        .blogImg>img {
            width: 350px;
            height: 200px;
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <section id="page-title">

        <div class="container clearfix">
            <div class="card">
                <?php echo $__env->make('client.component.ErrorMessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if(auth()->guard()->check()): ?>
                    <div class="card-header text-center">
                        <h2>Share Your Experiance</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('client.blog.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input required type="file" name="image" id="blogImage" class="form-control">
                                    <div class="blogImg">
                                        <img src="<?php echo e(asset('default-image.png')); ?>" alt="<?php echo e(auth()->user()->name); ?>"
                                            id="blogImagePreview">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <input required type="text" name="title" id="title" class="form-control" placeholder="Title">
                                    <textarea required class="form-control mt-2" name="post" id="post" cols="30"
                                        rows="10" placeholder="Write Your Massage"><?php echo e(old('post')); ?></textarea>
                                </div>
                            </div>


                            <input type="hidden" name="name" value="<?php echo e(auth()->user()->name); ?>">
                            <button
                                class="button button-xlarge button-black button-rounded text-right text-light button-3d float-right mt-3"
                                type="submit">Share Post</button>
                        </form>
                    </div>
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                    <h2 class="text-center">You need to <a class="font-weight-bold text-primary"
                            href="<?php echo e(route('client.login')); ?>">login</a> for creating post</h2>
                <?php endif; ?>

            </div>
        </div>

    </section>


    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div id="posts" class="row grid-container gutter-40">
                    <?php if($posts): ?>
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="entry col-md-10 offset-md-1 row">
                                <div class="grid-inner row no-gutters">
                                    <div class="entry-image col-md-4">
                                        <a href="<?php echo e($post->image ?? asset('default-image.png')); ?>"
                                            data-lightbox="image"><img src="<?php echo e($post->image ?? asset('default-image.png')); ?>"
                                                alt="<?php echo e($post->title); ?>"></a>
                                    </div>
                                    <div class="col-md-8 pl-md-4">
                                        <div class="entry-title title-sm">
                                            <h2><a href="#"> <?php echo e($post->title); ?></a>
                                            </h2>
                                        </div>
                                        <div class="entry-meta">
                                            <ul>
                                                <li><i class="icon-calendar3"></i><?php echo e($post->created_at->diffForHumans()); ?>

                                                </li>
                                                <li><a href="#"><i class="icon-user"></i> <?php echo e($post->name); ?></a></li>
                                            </ul>
                                        </div>
                                        <div class="entry-content">
                                            <p> <?php echo nl2br(e($post->post)); ?></p>
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <?php echo e($posts->links('vendor.pagination.simple-bootstrap-4')); ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script>
        //image Preview
        $('#blogImage').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#blogImagePreview').attr('src', ImgSource)
            }
        })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/pages/Blog.blade.php ENDPATH**/ ?>