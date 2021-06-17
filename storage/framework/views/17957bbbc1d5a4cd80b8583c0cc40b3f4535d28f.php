<?php $__env->startSection('css'); ?>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
    $others = App\Models\OthersModel::first();
    $socialData = App\Models\SocialModel::first();
    $HomeAboutSectionData = json_decode(
        App\Models\HomeAboutSecTionModel::orderBy('id', 'desc')
            ->get()
            ->first(),
    );
    ?>



    <!-- Page Title
              ============================================= -->
    <section id="page-title" class="page-title-parallax include-header"
        style="padding-top: 150px; background-image: url('<?php if($HomeAboutSectionData): ?> <?php echo e($HomeAboutSectionData->image2); ?> <?php endif; ?>'); background-size: cover; background-position:
        center center;" data-bottom-top="background-position:0px 400px;" data-top-bottom="background-position:0px -500px;">

        <?php echo $__env->make('client.aboutPartial.AboutIntro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </section><!-- #page-title end -->

    <!-- Content
              ============================================= -->
    <section id="content">
        <div class="content-wrap">


            <?php echo $__env->make('client.component.SpecialFeatureSection', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



            <?php echo $__env->make('client.component.Testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        </div>
        <div class="col-md-8 offset-md-2 mt-5">
            <div class="fancy-title title-border">
                <h3>Send us an Email</h3>
            </div>

            <div class="form-widget">
                <?php echo $__env->make('client.aboutPartial.ContactForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </section><!-- #content end -->

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














        let sortBtn = document.querySelector('.filter-menu').children;
        let sortItem = document.querySelector('.filter-item').children;

        for (let i = 0; i < sortBtn.length; i++) {
            sortBtn[i].addEventListener('click', function() {
                for (let j = 0; j < sortBtn.length; j++) {
                    sortBtn[j].classList.remove('current');
                }

                this.classList.add('current');


                let targetData = this.getAttribute('data-target');

                for (let k = 0; k < sortItem.length; k++) {
                    sortItem[k].classList.remove('active');
                    sortItem[k].classList.add('delete');

                    if (sortItem[k].getAttribute('data-item') == targetData || targetData == "all") {
                        sortItem[k].classList.remove('delete');
                        sortItem[k].classList.add('active');
                    }
                }
            });
        }








    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/pages/aboutPage.blade.php ENDPATH**/ ?>