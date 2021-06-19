 // Single product Show in modal

 function productDetailsModal(id) {

    let url = "{{ route('client.getsingleProductdata') }}";
    axios.post(url, {
            id: id
        })
        .then(function(response) {
            console.log(response.data);
            if (response.status == 200) {
                var jsonData = response.data;


                var url = `product/${jsonData[0].product_slug}`;



                var inStock = '';
                if (jsonData[0].product_in_stock == 0) {
                    inStock = "STOCK OUT!"
                } else {
                    inStock = "SALE!"
                }

                $('#pdTitle').html(jsonData[0].product_title);
                $('#pdPrice').html("&#2547;   " + jsonData[0].product_selling_price);
                $('#pdMainPrice').html("&#2547;   " + jsonData[0].product_price);
                $('#inStock').html(inStock);
                $('#pdCategory').html(jsonData[0].cat.name);
                $('#pDescription').html(jsonData[0].product_discription);
                $('#product_ids').val(id);
                $('#modalSingleView').attr("href", url);




                var imageDiv = "";
                for (let index = 0; index < jsonData[0].img.length; index++) {
                    const element = jsonData[0].img[index];
                    imageDiv += '<div  class="slide">';
                    imageDiv += '<a href="#" title="Pink Printed Dress - Front View">';
                    imageDiv += '<img src="' + element.image_path + '" alt="Pink Printed Dress">';
                    imageDiv += '</a>';
                    imageDiv += '</div>';

                }

                $('.slider-wrap').html(imageDiv);

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













// Add to cart


$('#cartForm').on('submit', function(event) {
    event.preventDefault();
    let formData = $(this).serializeArray();
    let meserment = formData[0]['value'];
    let color = formData[1]['value'];
    let quantity = formData[2]['value'];
    let product_ids = formData[3]['value'];
    console.log(formData);
    let url = "{{ route('client.addCart') }}";
    axios.post(url, {
        meserment: meserment,
        color: color,
        quantity: quantity,
        product_id: product_ids
    }).then(function(response) {
        console.log(response.data);
        if (response.status == 200 && response.data == 1) {
            $('.bd-example-modal-lg').modal('hide');
            toastr.success('Product Add Successfully');
            getcartData()
        } else {
            toastr.error('Product not Added ! Try Again');
        }

    }).catch(function(error) {
        toastr.error('Product not Added  ! Something Error');
    })


})





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
                                                 <div class="top-cart-item-quantity"><button class="cartDeleteIcon" data-id="${i}" type="submit"><i class="fas fa-times"> </i></button></div>
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

    axios.post("{{ route('client.cartRemove') }}", {
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
