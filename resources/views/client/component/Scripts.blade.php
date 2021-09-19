<script>
    // Single product Show in modal

    function productDetailsModal(id) {

        let url = "{{ route('client.getsingleProductdata') }}";
        axios.post(url, {
                id: id
            })
            .then(function(response) {
                if (response.status == 200) {
                    var jsonData = response.data;

                    let domain = window.location.origin
                    var url = `${domain}/product/${jsonData[0].slug}`;

                    let imgSingle = jsonData[0].img[0].image_path


                    var inStock = '';
                    if (jsonData[0].cat.slug === "customized-jewelry") {
                        inStock = "PRE ORDER"
                    } else if (jsonData[0].stock <= 0) {
                        inStock = "OUT OF STOCK!"
                    } else {
                        inStock = "IN STOCK!"
                    }

                    let title = jsonData[0].name

                    $('#pdTitle').html(title);
                    $('#pdPrice').html("&#2547;   " + jsonData[0].product_selling_price);
                    $('#pdMainPrice').html("&#2547;   " + jsonData[0].product_price);
                    $('#inStock').html(inStock);
                    $('#pdCategory').html(jsonData[0].cat.name);
                    $('#pDescription').html(jsonData[0].description);
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


                    String.prototype.capitalize = function() {
                        return this.charAt(0).toUpperCase() + this.slice(1);
                    }

                    let colorAll = JSON.parse(jsonData[0].color);

                    var color = "";
                    for (let index = 0; index < colorAll.length; index++) {
                        const elementColor = colorAll[index];
                        
                        colorChecked = ""
                        if (index == 0) {
                            colorChecked = "checked"
                        } else {
                            colorChecked = ""
                        }
                        color += '<div>';
                        color += '<input type="radio" id="' + elementColor + '" name="color" ' +
                            colorChecked + ' value="' + elementColor + '">';
                        color += '<label for="' + elementColor.value +
                            '"><span style="background-color:' + elementColor +
                            ';"></span></label> <span>' + elementColor.capitalize() + '</span>&ensp;';
                        color += '</div>';

                    }

                    $('.color-choose').html(color);

                    
                    if (jsonData[0].cat.slug != "customized-jewelry") {
                        $('#note1').prop('required', false);
                        $('#note2').prop('required', false);
                        $('.product-extraDetails').css('display', 'none')
                    } else {
                        $('.product-extraDetails').css('display', 'block')
                        $('#note1').prop('required', true);
                        $('#note2').prop('required', true);
                    }

                    if (jsonData[0].stock <= 0) {
                        [...document.querySelectorAll('.add-to-cart')].map(e => e.disabled = false);
                        $('.addToCart').css('display', 'none')
                        $('.add-to-cart').prop('disabled', true);

                    } else {
                        [...document.querySelectorAll('.add-to-cart')].map(e => e.disabled = true);
                        $('.addToCart').css('display', 'block')
                        $('.add-to-cart').prop('disabled', false);
                    }

                } else {

                }
            }).catch(function(error) {

            });
    }






    getcartData()

    function getcartData() {

        axios.get("{{ route('client.cartData') }}")
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

        axios.post("{{ route('client.cartRemove') }}", {
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




    $('#cartForm').on('submit', function(event) {
        event.preventDefault();
        let quantity = $('#quantity').val();
        let product_ids = $('#product_ids').val();
        let note1 = $('#note1').val();
        let note2 = $('#note2').val();
        let color = $("input[name=color]").val();
        let meserment = $("input[name=maserment]").val();

        let url = "{{ route('client.addCart') }}";
        axios.post(url, {
            meserment: meserment,
            color: color,
            quantity: quantity,
            product_id: product_ids,
            note2: note2,
            note1: note1,
        }).then(function(response) {

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
            toastr.error('Product not Added  ! Try Again');
        })


    })
</script>
