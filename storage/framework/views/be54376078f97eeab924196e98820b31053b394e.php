<?php $__env->startSection('css'); ?>

    <style>
        .pBtn {
            margin: 20px 0px !important;
            z-index: 999999;
        }

        .pBtn {
            position: fixed;
            top: 200px;
            right: 5px;
            background-color: #FF6666;
            color: #fff;
            padding: 10px;
            border-radius: 20px;
            display: inline-block;
            animation-name: profile-link;
            animation-duration: 2s;
            animation-iteration-count: infinite;
        }

        @keyframes  profile-link {
            0% {
                background-color: red;
            }

            50% {
                background-color: #FF6666;
            }

            100% {
                background-color: rgb(228, 122, 23);
            }
        }

    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($orders): ?>
        <div class="container">
            <div class="col-md-10 offset-md-1">
                <?php if(auth()->guard()->check()): ?>
                    <div class=" text-center pBtn">
                        <a href="<?php echo e(route('client.profile')); ?>">Go Your Profile</a>
                    </div>
                <?php endif; ?>
                <h2 class=" profile  text-center mt-3">Order id: <?php echo e($orders->id); ?></h2>
                <?php echo $__env->make('client.component.Message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <table class="table table-bordered table-striped table-hover cart mb-5">
                    <thead>
                        <tr>
                            <th class="cart-product-remove">Title</th>
                            <th class="cart-product-thumbnail">Details</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Customer Name:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e($orders->customer_name); ?></span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Mobile Number:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e($orders->customer_phone_number); ?></span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Address:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e($orders->address); ?></span>
                            </td>
                        </tr>



                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">City:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e($orders->city); ?></span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">District:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e($orders->district); ?></span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Country:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e($orders->country); ?></span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Postal Code:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e($orders->postal_code); ?></span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Sub Total:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e($orders->price_without_discount); ?></span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Discount Amount:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e($orders->discount_amount); ?></span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Total (After Discount):</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e($orders->total_amount); ?></span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Tax:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e($orders->total_tax); ?></span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Delivery Charge:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e($orders->total_delivery_charge); ?></span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Grand Total:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e($orders->paid_amount); ?></span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Delivery Status:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount btn btn-success  px-3"><?php echo e($orders->payment_status); ?></span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Payment Details:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e($orders->payment_details); ?></span>
                            </td>
                        </tr>
                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Transection Id:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e($orders->transection_id ?? "Payment Incomplete"); ?></span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Order Issued :</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount"><?php echo e(date('d-M-Y', strtotime($orders->created_at))); ?></span>
                            </td>
                        </tr>


                    </tbody>

                </table>



            </div>
            <div class="col-md-10 offset-md-1">



                <table class="table table-bordered table-striped table-hover cart mb-5">
                    <thead>
                        <tr>


                            <th class="cart-product-remove">Product Title</th>
                            <th class="cart-product-thumbnail">Quantity</th>
                            <th class="cart-product-name">Color</th>
                            <th class="cart-product-price">Maserment</th>
                            <th class="cart-product-subtotal">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $orders->product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($product->product): ?>
                                <tr class="cart_item">




                                    <td class="cart-product-subtotal">
                                        <span class="amount"><?php echo e($product->product->product_title); ?></span>
                                    </td>
                                    <td class="cart-product-subtotal">
                                        <span class="amount"> <?php echo e($product->quantity); ?></span>
                                    </td>

                                    <td class="cart-product-subtotal">
                                        <span class="amount"
                                            style="display:flex; justify-content:center; align-items: center;">
                                            <?php if($product->color): ?>

                                                <div
                                                    style=" width:20px; height:20px; border:1px solid #000; border-radius:50%; background-color: <?php echo e($product->color); ?>;">
                                                </div>
                                            <?php else: ?>
                                                <?php echo e('N/A'); ?>

                                            <?php endif; ?>
                                        </span>
                                    </td>


                                    <td class="cart-product-subtotal">
                                        <span class="amount">
                                            <?php if($product->maserment): ?>
                                                <?php echo e($product->maserment); ?>

                                            <?php else: ?>
                                                <?php echo e('N/A'); ?>

                                            <?php endif; ?>
                                        </span>
                                    </td>



                                    <td class="cart-product-subtotal">
                                        <span class="amount"> &#2547; <?php echo e(number_format($product->price, 2)); ?></span>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>
            </div>
        </div>
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
                        $("#total_cart_price").html(' &#2547; ' + dataJSON.total);

                        var imageViewHtml = "";
                        $.each(cartData, function(i, item) {

                            imageViewHtml += '<li>';
                            imageViewHtml += '<a class="aa-cartbox-img" href="#"><img src=" ' + cartData[i]
                                .image +
                                ' " alt="img"></a>';
                            imageViewHtml += '<div class="aa-cartbox-info"> <h4><a href="#">' + cartData[i]
                                .title +
                                '</a> </h4> <p>' + cartData[i].quantity + ' x &#2547; ' + cartData[i]
                                .unit_price +
                                '</p>  </div>';
                            imageViewHtml +=
                                '<div class="aa-remove-product"><button class="cartDeleteIcon" data-id=' +
                                i +
                                '  style=" display:inline-block" type="submit" class="fa fa-times"><i class="fa fa-remove"></i></button> </div>';
                            imageViewHtml += '</li>';
                        });


                        $('#headerCart').html(imageViewHtml);

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
            ;
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

<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/pages/OrderDetails.blade.php ENDPATH**/ ?>