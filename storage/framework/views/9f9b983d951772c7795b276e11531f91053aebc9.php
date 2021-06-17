<?php $__env->startSection('title', 'Shop'); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page Title  ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Shop</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('client.home')); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </div>

    </section>
    <!-- #page-title end -->


    <!-- Content
                                                                                                                      ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row gutter-40 col-mb-80">
                    <!-- Post Content
                                                                                                                          ============================================= -->
                    <div class="postcontent col-lg-9 order-lg-last">

                        <!-- Shop
                                                                                                                           ============================================= -->
                        <div id="shop" class="shop row grid-container gutter-20" data-layout="fitRows">


                            <?php $__currentLoopData = $allProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="product col-md-4 col-sm-6 col-12">
                                    <div class="grid-inner">
                                        <div class="product-image">
                                            <?php $i= 2; ?>
                                            <?php $__currentLoopData = $allProduct->img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($i > 0): ?>
                                                    <a
                                                        href="<?php echo e(route('client.showProductDetails', ['slug' => $allProduct->product_slug])); ?>"><img
                                                            src="<?php echo e($images->image_path); ?>" alt="Checked Short Dress"></a>
                                                <?php endif; ?>
                                                <?php $i--; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                            <?php if($allProduct->product_in_stock): ?>
                                            <a href="<?php echo e(route('client.showProductDetails', ['slug' => $allProduct->product_slug])); ?>">
                                                <div class="sale-flash badge badge-secondary p-2">Sell!</div>
                                            <?php else: ?>
                                                <div class="sale-flash badge badge-secondary p-2">Out of Stock</div>
                                            <?php endif; ?>

                                            <div class="bg-overlay">

                                                <div class="bg-overlay-content align-items-end justify-content-between"
                                                    data-hover-animate="fadeIn" data-hover-speed="400">
                                                <?php if(auth()->guard()->guest()): ?>
                                                    <a href="javascript:void(0);" onclick="toastr.info('To add Favorite List. You need to login first.','Info',{
                                                       closeButton: true,
                                                       progressBar: true,
                                                   })" class="btn btn-dark mr-2"><i class="icon-heart3"></i> <span> (<?php echo e($allProduct->favorite_to_users->count()); ?>)</span></a>
                                                <?php else: ?>
                                                    <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-<?php echo e($allProduct->id); ?>').submit();"
                                                       class="<?php echo e(!Auth::user()->favorite_product->where('pivot.product_id',$allProduct->id)->count()  == 0 ? 'favorite_posts' : ''); ?>"><i class="icon-heart3"></i><span class="text-dark">(<span class="favorite_posts"><?php echo e($allProduct->favorite_to_users->count()); ?></span>)</span></a>

                                                    <form id="favorite-form-<?php echo e($allProduct->id); ?>" method="POST" action="<?php echo e(route('client.favorite',$allProduct->id)); ?>" style="display: none;">
                                                        <?php echo csrf_field(); ?>
                                                    </form>
                                                <?php endif; ?>
                                                    <a href="" class="btn btn-dark" data-toggle="modal"
                                                        data-target=".bd-example-modal-lg"
                                                        onclick="productDetailsModal(<?php echo e($allProduct->id); ?>)"><i
                                                            class="icon-line-expand"></i></a>
                                                </div>
                                                <div class="bg-overlay-bg bg-transparent"></div>
                                            </div>
                                        </a>
                                        </div>
                                        <div class="product-desc">
                                            <div class="product-title">
                                                <h3><a
                                                        href="<?php echo e(route('client.showProductDetails', ['slug' => $allProduct->product_slug])); ?>"><?php echo e($allProduct->product_title); ?></a>
                                                </h3>
                                            </div>
                                            <div class="product-price">
                                                <?php if($allProduct->product_price != $allProduct->product_selling_price): ?>
                                                    <del>&#2547;
                                                        <?php echo e($allProduct->product_selling_price); ?></del>
                                                <?php endif; ?><ins>&#2547;
                                                    <?php echo e($allProduct->product_price); ?></ins>
                                            </div>


                                            <div class="product-rating">
                                                <?php
                                                    $arr = $allProduct->rating;
                                                    $sum = 0;
                                                    foreach ($arr as $item) {
                                                        $sum += $item['star_reating'];
                                                    }

                                                    if (count($arr) > 0) {
                                                        $average = $sum / count($arr);
                                                        $ratingValue = round(intval($average));
                                                    } else {
                                                        $ratingValue = 0;
                                                    }
                                                ?>
                                                <?php if($ratingValue > 0): ?>
                                                    <?php for($i = 0; $i < $ratingValue; $i++): ?>
                                                        <i class="icon-star3"></i>
                                                    <?php endfor; ?>
                                                    <?php
                                                        $emptyValue = 5 - $ratingValue;
                                                    ?>
                                                    <?php for($i = 0; $i < $emptyValue; $i++): ?>
                                                        <i class="icon-star-empty"></i>
                                                    <?php endfor; ?>
                                                    <?php else: ?>
                                                    <i class="icon-star-empty"></i>
                                                    <i class="icon-star-empty"></i>
                                                    <i class="icon-star-empty"></i>
                                                    <i class="icon-star-empty"></i>
                                                    <i class="icon-star-empty"></i>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>
                        <div class="d-block m-5">

                            <?php echo e($allProducts->links('vendor.pagination.simple-bootstrap-4')); ?>


                        </div>

                        <!-- #shop end -->

                    </div>



                    <!-- .postcontent end -->

                    <!-- Sidebar
                                                                                                                          ============================================= -->
                    <div class="sidebar col-lg-3">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget widget_links clearfix">

                                <h4>Shop Categories</h4>
                                <ul>
                                    <?php $__currentLoopData = App\Models\ProductsCategoryModel::orderby('name', 'asc')->where('parent_id', 0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a
                                                href="<?php echo e(route('client.category', $parentCat->slug)); ?>"><?php echo e($parentCat->name); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>

                            </div>

                            <div class="widget clearfix">

                                <h4>Recent Items</h4>
                                <div class="posts-sm row col-mb-30" id="recent-shop-list-sidebar">

                                    <?php $__currentLoopData = $recentProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                        <div class="entry col-12">
                                            <div class="grid-inner row no-gutters">
                                                <div class="col-auto">
                                                    <div class="entry-image">
                                                        <?php $i= 1; ?>
                                                        <?php $__currentLoopData = $recentProduct->img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($i > 0): ?>
                                                                <a class="aa-cartbox-img"
                                                                    href="<?php echo e(route('client.showProductDetails', ['slug' => $recentProduct->product_slug])); ?>"><img
                                                                        src="<?php echo e($images->image_path); ?>"
                                                                        alt="polo shirt img" width="100%"
                                                                        height="300px"></a>
                                                            <?php endif; ?>
                                                            <?php $i--; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                                <div class="col pl-3">
                                                    <div class="entry-title">
                                                        <h4><a
                                                                href="<?php echo e(route('client.showProductDetails', ['slug' => $recentProduct->product_slug])); ?>"><?php echo e($recentProduct->product_title); ?></a>
                                                        </h4>
                                                    </div>
                                                    <div class="entry-meta no-separator">
                                                        <ul>
                                                            <li class="color">&#2547; <?php echo e($recentProduct->product_price); ?>

                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>


                            <?php if($topRatedProducts): ?>


                                <div class="widget clearfix">

                                    <h4>Top Rated Items</h4>
                                    <div class="posts-sm row col-mb-30" id="popular-shop-list-sidebar">
                                        <?php $__currentLoopData = $topRatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topRatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="entry col-12">
                                                <div class="grid-inner row no-gutters">
                                                    <div class="col-auto">
                                                        <div class="entry-image">


                                                            <?php $i= 1; ?>
                                                            <?php $__currentLoopData = $topRatedProduct->img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($i > 0): ?>
                                                                    <a class="aa-cartbox-img"
                                                                        href="<?php echo e(route('client.showProductDetails', ['slug' => $topRatedProduct->product_slug])); ?>"><img
                                                                            src="<?php echo e($images->image_path); ?>"
                                                                            alt="polo shirt img" width="100%"
                                                                            height="300px"></a>
                                                                <?php endif; ?>
                                                                <?php $i--; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-3">
                                                        <div class="entry-title">
                                                            <h4><a
                                                                    href="<?php echo e(route('client.showProductDetails', ['slug' => $topRatedProduct->product_slug])); ?>"><?php echo e($topRatedProduct->product_title); ?></a>
                                                            </h4>
                                                        </div>
                                                        <div class="entry-meta no-separator">
                                                            <ul>
                                                                <li class="color"> &#2547;
                                                                    <?php echo e($topRatedProduct->product_price); ?></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>

                                </div>
                            <?php endif; ?>





                        </div>
                    </div><!-- .sidebar end -->
                </div>

            </div>
        </div>
    </section><!-- #content end -->









    <?php echo $__env->make('client.component.Modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>




        // Add to cart


        $('#cartForm').on('submit', function(event) {
            event.preventDefault();
            let formData = $(this).serializeArray();
            let meserment = formData[0]['value'];
            let color = formData[1]['value'];
            let quantity = formData[2]['value'];
            let product_ids = formData[3]['value'];
            console.log(formData);
            let url = "<?php echo e(route('client.addCart')); ?>";
            axios.post(url, {
                meserment: meserment,
                color: color,
                quantity: quantity,
                product_id: product_ids
            }).then(function(response) {
                console.log(response.data);
                if (response.status == 200 && response.data == 1) {
                    $('.bd-example-modal-lg').modal('hide');
                         toastr.success('Product Add Successfully', 'Success',{
            closeButton: true,
            progressBar: true,
        });
                    getcartData()
                } else {
                    toastr.error('Product not Added ! Try Again', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                }

            }).catch(function(error) {
                toastr.error('Product not Added  ! Something Error', 'Error',{
            closeButton: true,
            progressBar: true,
        });
            })


        })





        getcartData()

        function getcartData() {

            axios.get("<?php echo e(route('client.cartData')); ?>")
                .then(function(response) {

                    if (response.status = 200) {
                        var dataJSON = response.data;
                        var cartData = dataJSON.cart;

                        var a = Object.keys(cartData).length;


                        $("#cart_quantity").html(a);
                        var tp = parseFloat(dataJSON.total).toFixed(2);
                        $("#total_cart_price").html(' &#2547; ' + tp);

                        var imageViewHtml = "";
                        $.each(cartData, function(i, item) {
                            imageViewHtml += `<div class="top-cart-item">
                                                                                         <div class="top-cart-item-image">
                                                                                             <a href="#"><img src="${cartData[i].image}"
                                                                                                     alt="Blue Round-Neck Tshirt" /></a>
                                                                                         </div>
                                                                                         <div class="top-cart-item-desc">
                                                                                             <div class="top-cart-item-desc-title">
                                                                                                 <a href="#">${cartData[i].title}</a>
                                                                                                 <span class="top-cart-item-price d-block"> ${cartData[i].quantity} x &#2547; ${cartData[i].unit_price}</span>
                                                                                             </div>
                                                                                             <div class="top-cart-item-quantity"><button class="cartDeleteIcon" data-id="${i}" type="submit"><i class="icon-remove"> </i></button></div>
                                                                                         </div>
                                                                                </div>`
                        });


                        $('.top-cart-items').html(imageViewHtml);

                        console.log(a);

                        if (a == 0) {
                            $("#HeaderPreview").css("display", "none");
                        } else {
                            $("#HeaderPreview").css("display", "block");
                        }


                        //Carts click on delete icon
                        $(".cartDeleteIcon").click(function() {
                            var id = $(this).data('id');
                            $('#CartsDeleteId').html(id);
                            DeleteDataCart(id);
                        })
                    } else {
                        toastr.error('Something Went Wrong', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        });
                    }
                }).catch(function(error) {

                    toastr.error('Something Went Wrong...', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                });
        }





        $('#confirmDeleteCart').click(function() {


            alert("hello")
            var id = $(this).data('id');
            DeleteDataCart(id);
        })


        //delete Cart function
        function DeleteDataCart(id) {

            axios.post("<?php echo e(route('client.cartRemove')); ?>", {
                    product_id: id
                })
                .then(function(response) {

                    if (response.status == 200) {
                        toastr.success('Cart Removed Success.', 'Success',{
            closeButton: true,
            progressBar: true,
        });
                        getcartData();
                    } else {
                        toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                    }
                }).catch(function(error) {

                    toastr.error('Something Went Wrong......', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                });
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/pages/Shop.blade.php ENDPATH**/ ?>