<?php $__env->startSection('title', 'My Cart'); ?>
<?php $__env->startSection('content'); ?>

    <section id="page-title">

        <div class="container">
            <h1>Cart</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('client.home')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('client.shop')); ?>">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content  ============================================= -->

    <?php if(empty($cart)): ?>

        <div class="alert alert-info alert-block text-center py-5">
            <p>Please Add Some Product On Your Cart. <a class="text-primary" href="<?php echo e(route('client.shop')); ?>"> Go Shop
                    Page</a></p>
        </div>
    <?php else: ?>
        <section id="content">
            <div class="content-wrap">
                <div class="container">

                    <table class="table table-bordered table-striped table-hover cart mb-5">
                        <thead>
                            <tr>
                                <th class="cart-product-remove">&nbsp;</th>
                                <th class="cart-product-thumbnail">Image</th>
                                <th class="cart-product-name">Product</th>
                                <th class="cart-product-price">Unit Price</th>
                                <th class="cart-product-quantity">Quantity</th>
                                <th class="cart-product-color">Color</th>
                                <th class="cart-product-mesement text-center">Meserment</th>
                                <th class="cart-product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="cart_item">
                                    <td class="cart-product-remove">
                                        <form action="<?php echo e(route('client.cartRemove')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" value="<?php echo e($key); ?>" name="product_id">
                                            <button class="remove" title="Remove this item" type="submit"
                                                style="border: none; background-color:#fff;"><i
                                                    class="icon-trash2"></i></button>
                                        </form>
                                    </td>

                                    <td class="cart-product-thumbnail">
                                        <a href="#"><img width="64" height="64" src="<?php echo e($cartItem['image']); ?>"
                                                alt="Pink Printed Dress"></a>
                                    </td>

                                    <td class="cart-product-name">
                                        <a
                                            href="<?php echo e(route('client.showProductDetails', ['slug' => $cartItem['slug']])); ?>"><?php echo e($cartItem['title']); ?></a>
                                    </td>

                                    <td class="cart-product-price">
                                        <span class="amount">&#2547;
                                            <?php echo e(number_format($cartItem['unit_price']), 2); ?></span>
                                    </td>


                                    <td class="cart-product-quantity">
                                        <div class="quantity">

                                            <form action="<?php echo e(route('client.cartUpdate')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" value="<?php echo e($key); ?>" name="product_update_id">
                                                <input style="width: 50px" type="number"
                                                    value="<?php echo e($cartItem['quantity']); ?>" name="quantity" min="1"
                                                    max="1000"
                                                    onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                                <button type="submit"
                                                    style="background-color: #dad9d1; color:#ff6666; margin:5px 0px 0px 5px;"><i
                                                        style="font-size:15px;" class="icon-ok"></i></button>
                                            </form>
                                        </div>
                                    </td>

                                    <td class="cart-product-color text-center hidden-xs">
                                        <?php if($cartItem['color']): ?>
                                            <div class="text-center"
                                                style=" width:20px; margin:auto; height:20px; border:1px solid #000; border-radius:50%; background-color: <?php echo e($cartItem['color']); ?>;">
                                            </div>
                                        <?php else: ?>
                                            <?php echo e('N/A'); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td class="cart-product-mesement text-center">
                                        <?php if($cartItem['maserment']): ?>
                                            <?php echo e($cartItem['maserment']); ?>

                                        <?php else: ?>
                                            <?php echo e('N/A'); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td class="cart-product-subtotal">
                                        <span class="amount">&#2547;
                                            <?php echo e(number_format($cartItem['total_price'], 2)); ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>
                    <div class="col-lg-12">
                        <div class="col-12 form-group">
                            <a href="<?php echo e(route('client.ClearCart')); ?>"
                                class="button button-large button-circle text-right button-3d gradient-blue-purple"><i
                                    class="icon-repeat"></i> Clear Cart</a>
                        </div>
                    </div>

                    <div class="row col-mb-30 mt-5">

                        <div class="col-md-6">
                            <div class="col-12 form-group p-3">
                                <form action="<?php echo e(route('client.cupon')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <label for="cupon">Have Cupon?</label>
                                    <input required class="form-control" type="text" id="cupon" name="cupon">
                                    <button type="submit"
                                        class="button button-large button-black button-rounded text-right text-light button-3d mt-3">Apply
                                        Cupon</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Cart Totals</h4>
                            <hr>
                            <div class="row">
                                <?php if(empty($total_cupon_discount)): ?>
                                    <div class="col-6">
                                        <h3>Total:</h3>
                                    </div>
                                    <div class="col-6">
                                        <span class="amount color lead"><strong> &#2547;
                                                <?php echo e(number_format($total, 2)); ?></strong></span>
                                    </div>
                                <?php else: ?>

                                    <div class="col-6">
                                        <h3>Sub Total:</h3>
                                    </div>
                                    <div class="col-6">
                                        <span class="amount color lead"><strong> &#2547;
                                                <?php echo e(number_format($total, 2)); ?></strong></span>
                                    </div>
                                    <div class="col-6">
                                        <h3>Cupon Discount:</h3>
                                    </div>
                                    <div class="col-6">
                                        <span class="amount color lead"><strong> &#2547;
                                                <?php echo e(number_format($total_cupon_discount, 2)); ?></strong></span>
                                    </div>
                                    <div class="col-6">
                                        <h3>Total:</h3>
                                    </div>
                                    <div class="col-6">
                                        <?php
                                            $grandTotal = $total - $total_cupon_discount;
                                        ?>
                                        <span class="amount color lead"><strong> &#2547;
                                                <?php echo e(number_format($grandTotal, 2)); ?></strong></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-12 form-group mt-5">
                                <a href="<?php echo e(route('client.checkout')); ?>"
                                    class="button button-xlarge button-black button-rounded text-right text-light button-3d">Process
                                    Checkout <i class="icon-circle-arrow-right"></i></a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section><!-- #content end -->

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
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
                        toastr.error('Something Went Wrong');
                    }
                }).catch(function(error) {

                    toastr.error('Something Went Wrong...');
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
                        toastr.success('Cart Removed Success.');
                        getcartData();
                    } else {
                        toastr.error('Something Went Wrong');
                    }
                }).catch(function(error) {

                    toastr.error('Something Went Wrong......');
                });
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/pages/Cart.blade.php ENDPATH**/ ?>