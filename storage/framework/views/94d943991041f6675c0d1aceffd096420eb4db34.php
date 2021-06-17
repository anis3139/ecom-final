<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
    <div id="wrapper" class="clearfix">

        <!-- Slider
                                                                                                                                                                          ============================================= -->
        <?php echo $__env->make('client.component.Slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- #Slider End -->

        <!-- Content
                                                                                                                                                                          ============================================= -->
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">

                    <?php echo $__env->make('client.partials.HomeCategory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('client.partials.WeeklyFeaturedItems', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                </div>

                <!-- New Arrival Section ============================================= -->
                <?php echo $__env->make('client.partials.FreshArrivalPromo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <div class="clear"></div>

                <!-- New Arrivals Men
                                                                                                                                                                            ============================================= -->
                <?php echo $__env->make('client.partials.NewArrivalProduct', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- Sign Up
                                                                                                                                                                            ============================================= -->

                <?php echo $__env->make('client.partials.Signup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="container">

                    <!-- Features  ============================================= -->


                    <div class="clear"></div>

                    <!-- Brands ============================================= -->

                    <?php echo $__env->make('client.partials.Brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="clear"></div>

                <!-- App Buttons  ============================================= -->


                <?php echo $__env->make('client.partials.SpecialOffer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- Last Section ============================================= -->

            </div>
        </section><!-- #content end -->

        <!-- Footer
                                                                                                                                                                          ============================================= -->


        <!-- #footer end -->

    </div><!-- #wrapper end -->

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
                    toastr.success('Product Add Successfully', 'Success', {
                        closeButton: true,
                        progressBar: true,
                    });
                    getcartData()
                } else {
                    toastr.error('Product not Added ! Try Again', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                }

            }).catch(function(error) {
                toastr.error('Product not Added  ! Something Error', 'Error', {
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
                        toastr.success('Cart Removed Success.', 'Success', {
                            closeButton: true,
                            progressBar: true,
                        });
                        getcartData();
                    } else {
                        toastr.error('Something Went Wrong', 'Error', {
                            closeButton: true,
                            progressBar: true,
                        });
                    }
                }).catch(function(error) {

                    toastr.error('Something Went Wrong......', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                });
        }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/index.blade.php ENDPATH**/ ?>