<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <div class="single-product shop-quick-view-ajax">
                <div class="ajax-modal-title text-center w-100">
                    <h2 id="pdTitle"></h2>
                </div>

                <div class="product modal-padding">

                    <div class="row col-mb-50">
                        <div class="col-md-6">
                            <div class="product-image">
                                <div class="fslider" data-pagi="false">
                                    <div class="flexslider">
                                        <div class="slider-wrap">
                                            <div class="slide22"><a href="#" id="product_img_link"
                                                    title="<?php echo e(env('APP_NAME')); ?>"><img src="" id="modalSingleImage"
                                                        alt="<?php echo e(env('APP_NAME')); ?>"></a></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="sale-flash badge badge-danger p-2" id="inStock"></div>

                            </div>
                        </div>
                        <div class="col-md-6 product-desc">
                            <div class="product-price"><del id="pdMainPrice"></del> <ins class="font-weight-semibold"
                                    id="pdPrice"></ins></div>

                            <div class="clear"></div>
                            <div class="line"></div>
                            <form class="cart mb-0" method="post" enctype='multipart/form-data' id="cartForm">

                                <div class="product-color">
                                    <span>Mezerment:</span>
                                    <div class="meserment-choose">

                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="line"></div>
                                <div class="product-color">
                                    <span>Color:</span>
                                    <div class="color-choose">
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="line"></div>


                                <div class="quantity clearfix">
                                    <input type="button" value="-" class="minus">
                                    <input type="text" step="1" min="1" name="quantity" id="quantity" value="1"
                                        title="Qty" class="qty" size="4" />
                                    <input type="button" value="+" class="plus">
                                </div>

                                <input type="hidden" id="product_ids" name="product_ids">
                                <button type="submit" class="add-to-cart button m-0">Add to cart</button>
                            </form>

                            <div class="clear"></div>

                            <div class="line"></div>
                            <p id="pDescription"></p>

                            <div class="card product-meta mb-0">
                                <div class="card-body">
                                    <span class="posted_in">Category: <a href="#" rel="tag" id="pdCategory"></a></span>
                                </div>
                            </div>
                            <div class="card product-meta mb-0">
                                <div class="card-body">
                                    <span class="posted_in"><a href="" id="modalSingleView"
                                            class="add-to-cart button m-0">View
                                            Details</a></span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function productDetailsModal(id) {

        let url = "<?php echo e(route('client.getsingleProductdata')); ?>";
        axios.post(url, {
                id: id
            })
            .then(function(response) {
                console.log(response.data);
                if (response.status == 200) {
                    var jsonData = response.data;

                    let domain = window.location.origin
                    var url = `${domain}/product/${jsonData[0].product_slug}`;

                    let imgSingle = jsonData[0].img[0].image_path


                    var inStock = '';
                    if (jsonData[0].product_in_stock == 0) {
                        inStock = "STOCK OUT!"
                    } else {
                        inStock = "SALE!"
                    }

                    let title = jsonData[0].product_title

                    $('#pdTitle').html(title);
                    $('#pdPrice').html("&#2547;   " + jsonData[0].product_selling_price);
                    $('#pdMainPrice').html("&#2547;   " + jsonData[0].product_price);
                    $('#inStock').html(inStock);
                    $('#pdCategory').html(jsonData[0].cat.name);
                    $('#pDescription').html(jsonData[0].product_discription);
                    $('#product_ids').val(id);
                    $('#modalSingleView').attr("href", url);
                    $('#product_img_link').attr("title", title);
                    $('#product_img_link').attr("href", url);
                    $('#modalSingleImage').attr("src", imgSingle);
                    $('#modalSingleImage').attr("alt", title);


                    var maserment = "";
                    for (let index = 0; index < jsonData[0].maserment.length; index++) {
                        const element = jsonData[0].maserment[index];
                        checked = ""
                        if (index == 0) {
                            checked = "checked"
                        } else {
                            checked = ""
                        }

                        maserment += '<div>';
                        maserment += '<input type="radio" id="' + element.meserment_value + '" name="maserment" ' +
                            checked + ' value="' + element.meserment_value + '">';
                        maserment += '<label for="' + element.meserment_value +
                            '"><span style="background-color:#000;"></span></label>';
                        maserment += '<span>' + element.meserment_value + '</span>&nbsp;';
                        maserment += '</div>';

                    }

                    $('.meserment-choose').html(maserment);




                    var color = "";
                    for (let index = 0; index < jsonData[0].color.length; index++) {
                        const elementColor = jsonData[0].color[index];

                        colorChecked = ""
                        if (index == 0) {
                            colorChecked = "checked"
                        } else {
                            colorChecked = ""
                        }
                        color += '<div>';
                        color += '<input type="radio" id="' + elementColor.product_color_code + '" name="color" ' +
                            colorChecked + ' value="' + elementColor.product_color_code + '">';
                        color += '<label for="' + elementColor.product_color_code +
                            '"><span style="background-color:' + elementColor.product_color_code +
                            ';"></span></label>';
                        color += '</div>';

                    }

                    $('.color-choose').html(color);




                } else {

                }
            }).catch(function(error) {

            });
    }

</script>
<?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/component/Modal.blade.php ENDPATH**/ ?>