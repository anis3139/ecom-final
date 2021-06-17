
<?php $__env->startSection('title', 'Checkout'); ?>
<?php
$OrderSettings = App\Models\OrderSettings::first();
?>
<?php $__env->startSection('css'); ?>
    <style>
        .box {
            color: #fff;
            padding: 20px;
            display: none;
        }

        .box p {
            margin-bottom: 5px;
            line-height: 1;
        }

        .red {
            background: blue;
        }

        .green {
            background: pink;
        }

        .blue {
            background: violet;
        }

        .yellow {
            background: orange;

        }

    </style>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Title
                                                                                                                                                                                      ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Checkout</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
                                                                                                                                                                                      ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <?php echo $__env->make('client.component.Message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('client.component.ErrorMessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="row col-mb-30 gutter-50 mb-4">
                    <?php if(auth()->guard()->guest()): ?>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    You Need to Login First? <a href="<?php echo e(route('client.login')); ?>">Click here to login</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4> Welcome <?php echo e(auth()->user()->name); ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    Have a coupon? <a href="<?php echo e(route('client.showCart')); ?>">Click here to enter your code</a>

                                </div>
                            </div>
                        </div>
                    </div>




                    <form action="<?php echo e(route('client.processOrder')); ?>" method="post" id="orderFormGest">
                        <?php echo csrf_field(); ?>
                        <div class="row col-mb-50 gutter-50">
                            <div class="col-lg-6">
                                <h3>Billing Address</h3>


                                <div id="billing-form" name="billing-form" class="row mb-0">

                                    <div class="col-md-12 form-group">
                                        <label for="billing-form-name">Name:</label>
                                        <input required type="text" id="billing-form-name" name="customer_name"
                                            value="<?php echo e(auth()->user()->name); ?>" class="sm-form-control" />
                                    </div>



                                    <div class="w-100"></div>

                                    <div class="col-12 form-group">
                                        <label for="billing-form-companyname">Mobile:</label>
                                        <input required type="text" id="billing-form-companyname" name="customer_phone_number"
                                            value="<?php echo e(auth()->user()->phone_number); ?>" class="sm-form-control" />
                                    </div>

                                    <div class="col-12 form-group">
                                        <label for="shipping-form-message">Address: <small>*</small></label>
                                        <textarea required class="sm-form-control" id="shipping-form-message" name="address"
                                            rows="6" cols="30"><?php echo e(auth()->user()->address); ?></textarea>
                                    </div>


                                    <div class="col-12 form-group">
                                        <label for="billing-form-city">City / Town: </label>
                                        <input type="text" id="billing-form-city" name="city"
                                            value="<?php echo e(auth()->user()->city); ?>" class="sm-form-control" />
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="billing-form-city">District: </label>
                                        <input required required type="text" id="billing-form-city" name="district"
                                            value="<?php echo e(auth()->user()->district); ?>" class="sm-form-control" />
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="billing-form-city">Zip Code: </label>
                                        <input type="text" id="billing-form-city" name="postal_code"
                                            value="<?php echo e(auth()->user()->postal_code); ?>" class="sm-form-control" />
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="billing-form-city">Country: </label>
                                        <input required type="text" id="billing-form-city" name="country" value="Bangladesh"
                                            class="sm-form-control" />
                                    </div>



                                </div>
                            </div>

                            <div class="col-lg-6">
                                <h3>Shipping Address</h3>

                                <div id="shipping-form" name="shipping-form" class="row mb-0">

                                    <div class="col-md-12 form-group">
                                        <label for="billing-form-name">Name:</label>
                                        <input type="text" id="billing-form-name" name="shipping_customer_name" value=""
                                            class="sm-form-control" />
                                    </div>



                                    <div class="w-100"></div>

                                    <div class="col-12 form-group">
                                        <label for="billing-form-companyname">Mobile:</label>
                                        <input type="text" id="billing-form-companyname" name="shipping_customer_phone_number"
                                            value="" class="sm-form-control" />
                                    </div>

                                    <div class="col-12 form-group">
                                        <label for="shipping-form-message">Address: <small>*</small></label>
                                        <textarea class="sm-form-control" id="shipping-form-message" name="shipping_address"
                                            rows="6" cols="30"></textarea>
                                    </div>


                                    <div class="col-12 form-group">
                                        <label for="billing-form-city">City / Town:</label>
                                        <input type="text" id="billing-form-city" name="shipping_city" value=""
                                            class="sm-form-control" />
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="billing-form-city">District:</label>
                                        <input type="text" id="billing-form-city" name="shipping_district" value=""
                                            class="sm-form-control" />
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="billing-form-city">Zip Code:</label>
                                        <input type="text" id="billing-form-city" name="shipping_postal_code" value=""
                                            class="sm-form-control" />
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="billing-form-city">Country:</label>
                                        <input type="text" id="billing-form-city" name="shipping_country"
                                            class="sm-form-control" />
                                    </div>

                                </div>
                            </div>

                            <div class="w-100"></div>

                            <div class="col-lg-6">
                                <h4>Your Orders</h4>

                                <div class="table-responsive">
                                    <table class="table cart">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-thumbnail">&nbsp;</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-quantity">Quantity</th>
                                                <th class="cart-product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="cart_item">
                                                    <td class="cart-product-thumbnail">
                                                        <a href="#"><img width="64" height="64" src="<?php echo e($product['image']); ?>"
                                                                alt="Pink Printed Dress"></a>
                                                    </td>

                                                    <td class="cart-product-name">
                                                        <a href="#"><?php echo e($product['title']); ?> </a>
                                                    </td>

                                                    <td class="cart-product-quantity">
                                                        <div class="quantity clearfix">
                                                            <?php echo e($product['quantity']); ?> x &#2547;
                                                            <?php echo e(number_format($product['main_price'], 2)); ?>

                                                        </div>
                                                    </td>

                                                    <td class="cart-product-subtotal">
                                                        <span class="amount"> &#2547;
                                                            <?php echo e(number_format($product['main_price'] * $product['quantity'], 2)); ?>

                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <h4>Cart Totals</h4>

                                <div class="table-responsive">
                                    <table class="table cart">
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="border-top-0 cart-product-name">
                                                    <strong>Cart Total (Without Discount)</strong>
                                                </td>

                                                <td class="border-top-0 cart-product-name">
                                                    <span class="amount">&#2547;
                                                        <?php echo e(number_format($total_main_price, 2)); ?></span>
                                                </td>
                                            </tr>
                                            <?php if(!empty($total_cupon_discount)): ?>
                                            <tr class="cart_item">
                                                <td class="border-top-0 cart-product-name">
                                                    <strong>Product Discount</strong>
                                                </td>

                                                <td class="border-top-0 cart-product-name">
                                                    <span class="amount">&#2547;
                                                        <?php echo e(number_format($total_discount, 2)); ?></span>
                                                </td>
                                            </tr>
                                                <tr class="cart_item">
                                                    <td class="border-top-0 cart-product-name">
                                                        <strong>Cupon Discount</strong>
                                                    </td>

                                                    <td class="border-top-0 cart-product-name">
                                                        <span class="amount">&#2547;
                                                            <?php echo e(number_format($total_cupon_discount, 2)); ?></span>
                                                    </td>
                                                </tr>
            
                                                <tr class="cart_item">
                                                    <td class="border-top-0 cart-product-name">
                                                        <strong>Total Discount</strong>
                                                    </td>
    
                                                    <td class="border-top-0 cart-product-name">
                                                        <span class="amount">&#2547;
                                                            <?php echo e(number_format($total_discount + $total_cupon_discount, 2)); ?></span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="border-top-0 cart-product-name">
                                                        <strong>Cart Total (After Discount)</strong>
                                                    </td>
    
                                                    <td class="border-top-0 cart-product-name">
                                                        <span class="amount">&#2547; <?php echo e(number_format($total-$total_cupon_discount, 2)); ?></span>
                                                    </td>
                                                </tr>
                                            <?php else: ?>                       
                                            <tr class="cart_item">
                                                <td class="border-top-0 cart-product-name">
                                                    <strong>Total Discount</strong>
                                                </td>

                                                <td class="border-top-0 cart-product-name">
                                                    <span class="amount">&#2547;
                                                        <?php echo e(number_format($total_discount, 2)); ?></span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="border-top-0 cart-product-name">
                                                    <strong>Cart Total (After Discount)</strong>
                                                </td>

                                                <td class="border-top-0 cart-product-name">
                                                    <span class="amount">&#2547; <?php echo e(number_format($total, 2)); ?></span>
                                                </td>
                                            </tr>
                                            <?php endif; ?>

                     
                                   
                                            <tr class="cart_item">
                                                <td class="border-top-0 cart-product-name">
                                                    <strong>Tax</strong>
                                                </td>

                                                <td class="border-top-0 cart-product-name">
                                                    <span class="amount">&#2547; <?php echo e(number_format($total_tax, 2)); ?></span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="border-top-0 cart-product-name">
                                                    <strong>Shipping</strong>
                                                </td>

                                                <td class="border-top-0 cart-product-name">
                                                    <p id="deliveryCharge"></p>
                                                    <input type="hidden" placeholder="Name*" value="" class="form-control"
                                                        name="total_delivery_charge" id="total_delivery_charge">
                                                </td>
                                            </tr>

                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    <strong>Shipping Area</strong>
                                                </td>

                                                <td class="cart-product-name">
                                                    <label>
                                                        <input type="radio" id="in_dhaka" checked
                                                            value=" <?php echo e($OrderSettings->delivary_in_city ?? 0); ?> "
                                                            name="in_dhaka">
                                                        Inside Dhaka
                                                    </label>
                                                    <label>
                                                        <input type="radio" id="in_dhaka"
                                                            value="<?php echo e($OrderSettings->delivary_out_city ?? 0); ?> "
                                                            name="in_dhaka"> Out side
                                                        of
                                                        Dhaka
                                                    </label>

                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    <strong>Payable Amount</strong>
                                                </td>

                                                <?php if(empty($total_cupon_discount)): ?>
                                                <input id="taxAndTotal" type="hidden" value="<?php echo e(($total + $total_tax)); ?>">
                                                <?php else: ?>
                                                <input id="taxAndTotal" type="hidden" value="<?php echo e(($total + $total_tax)-$total_cupon_discount); ?>">
                                                <?php endif; ?>
                                                <input type="hidden" placeholder="Name*" value="" class="form-control"
                                                    name="total_main_price" id="total_main_price">

                                                <td id="totalCharge">

                                                </td>

                                            </tr>

                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    <label><input type="radio" checked name="payment_details" id="red"
                                                            value=" Cash  On  Delivery"> Cash
                                                        On
                                                        Delivery</label><br>
                                                    <label><input type="radio" name="payment_details" id="green" value="Bkash">
                                                        Bkash</label><br>
                                                    <label><input type="radio" name="payment_details" id="blue" value="Rocket">
                                                        Rocket</label><br>
                                                    <label><input type="radio" name="payment_details" id="yellow" value="Nagad">
                                                        Nagad</label><br>
                                                </td>

                                                <td class="cart-product-name">
                                                    <div class="red box">
                                                        <p style="min-height: 100px">Selected For Cash on Delivery</p>
                                                    </div>
                                                    <div class="green box">
                                                        <p>Personal Bkash Number:</p>
                                                        <p>

                                                            <?php echo e($OrderSettings->bkash_number ?? '01816366535'); ?>

                                                        </p>
                                                        <input class="form-control" type="text" name="transection_id[]"
                                                            placeholder="Input Your Transaction ID">
                                                    </div>
                                                    <div class="blue box">
                                                        <p>Personal Rocket Number:</p>
                                                        <p>

                                                            <?php echo e($OrderSettings->rocket_number ?? '018163665358'); ?>

                                                        </p>
                                                        <input class="form-control" type="text" name="transection_id[]"
                                                            placeholder="Input Your Transaction ID">
                                                    </div>
                                                    <div class="yellow box">
                                                        <p>Personal Nagad Number:</p>
                                                        <p>

                                                            <?php echo e($OrderSettings->nagad_number ?? '01816366535'); ?>

                                                        </p>
                                                        <input class="form-control" type="text" name="transection_id[]"
                                                            placeholder="Input Your Transaction ID">
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="cart_item">
                                                <td class="cart-product-name">

                                                </td>

                                                <td class="cart-product-name">

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>




                                <?php if($total > 0): ?>
                                    <button type="submit" class="button btn-block button-3d float-right">Place Order</button>
                                <?php else: ?>
                                    <button type="button" onclick="alert('Your Cart is Empty')"
                                        class="button btn-block button-3d float-right">Place Order</button>
                                <?php endif; ?>

                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </section><!-- #content end -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        // Single product Show in modal

        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var inputValue = $(this).attr("id");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });



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
                            imageViewHtml +=
                                `<div class="top-cart-item">
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

        var dValue = $('input[name=in_dhaka]:checked').val();
        var value = parseInt(dValue);
        var dvalues = parseFloat(value).toFixed(2);
        $('#deliveryCharge').html("&#2547; " + dvalues);
        $('#total_delivery_charge').val(dvalues);

        var taTotal = $('#taxAndTotal').val();
        var taxAndTotal = parseInt(taTotal);
        var total = taxAndTotal + value;
        var totala = parseFloat(total).toFixed(2);
        $('#totalCharge').html("&#2547; " + totala);
        $('#total_main_price').val(totala);
        console.log(totala);
        $('input[type=radio]').change(function() {

            var dValue = $('input[name=in_dhaka]:checked').val();
            var value = parseInt(dValue);
            var dvalues = parseFloat(value).toFixed(2);
            $('#deliveryCharge').html("&#2547; " + dvalues);
            $('#total_delivery_charge').val(dvalues);
            var taTotal = $('#taxAndTotal').val();
            var taxAndTotal = parseInt(taTotal);
            var total = taxAndTotal + value;
            var totala = parseFloat(total).toFixed(2);
            $('#totalCharge').html("&#2547; " + totala);
            $('#total_main_price').val(totala);
            console.log(totala);
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/pages/Checkout.blade.php ENDPATH**/ ?>