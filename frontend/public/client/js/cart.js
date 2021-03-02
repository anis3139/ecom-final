//Quick Order Details
$('#quick-order-form').on('submit', function (event) {
    event.preventDefault();

    let product_title = $('#pdTitle_order').val();
    let meserment = $("input[name=color_chooses]").val();
    let color = $("input[name=color_chooses]").val();
    let product_price = $('#pdPrices').val();
    let quantity = $('#quantitys').val();
    let customer_name = $('#customer_name').val();
    let customer_phone_number = $('#customer_phone_number').val();

    if (product_title.length == 0) {
        toastr.error('Product Title Is Empty');
    } else if (customer_name.length == 0) {
        toastr.error('Your Name Is Empty');
    } else if (customer_phone_number.length == 0) {
        toastr.error('Mobile Number Is Empty');
    } else {
        let url = window.location.origin + "/api/quickOrder/";
        axios.post(url, {

            product_title: product_title,
            meserment: meserment,
            color: color,
            quantity: quantity,
            product_price: product_price,
            customer_phone_number: customer_phone_number,
            customer_name: customer_name

        }).then(function (response) {
            
            if (response.status == 200 && response.data == 1) {
                $('#quick-order').modal('hide');
                toastr.success('Order Place Successfully');
            } else {
                toastr.error('Order Not Place ! Try Again');
            }

        }).catch(function (error) {
         
            toastr.error('Order Not Place ! Try Again..');
        })
    }



})



function productQuickOrder(id) {
    let url = window.location.origin + "/api/getsingleProductdata/";
    axios.post(url, {
        id: id
    })
        .then(function (response) {
            
            if (response.status == 200) {
                var jsonData = response.data;


                $('#pdTitle_order').val(jsonData[0].product_title);
                $('#pdPrices').val(jsonData[0].product_selling_price);
                $('#pdTitles').html(jsonData[0].product_title);
                $('#pdPricesShow').html(jsonData[0].product_selling_price);




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
                    maserment += '<input type="radio" id="' + element.meserment_value + '" name="meserment_chooses" id="meserment_chooses" ' +
                        checked + ' value="' + element.meserment_value + '">';
                    maserment += '<label for="' + element.meserment_value +
                        '"><span style="background-color:#000;"></span></label>';
                    maserment += '<span>' + element.meserment_value + '</span>&nbsp;';
                    maserment += '</div>';

                }

                $('#meserment-chooses').html(maserment);




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
                    color += '<input type="radio" id="' + elementColor.product_color_code + '" name="color_chooses" id="color_chooses" ' +
                        colorChecked + ' value="' + elementColor.product_color_code + '">';
                    color += '<label for="' + elementColor.product_color_code +
                        '"><span style="background-color:' + elementColor.product_color_code +
                        ';"></span></label>';
                    color += '</div>';

                }

                $('#color-chooses').html(color);


            } else {

                toastr.error('Something Went Wrong...');
            }
        }).catch(function (error) {

            toastr.error('Something Went Wrong...');
        });
}









/// SIngle Product View

function productDetailsModal(id) {
    let url = window.location.origin + "/api/getsingleProductdata/";
    axios.post(url, {
                id: id
            })
        .then(function(response) {
            if (response.status == 200) {
                var jsonData = response.data;


                var url= `product/${jsonData[0].product_slug}`;
                var simpleLensImageUrl = jsonData[0].img[0].image_path;


                var inStock = '';
                if (jsonData[0].product_in_stock == 0) {
                    inStock = "STOCK OUT!"
                } else {
                    inStock = "SALE!"
                }

                $('#pdTitle').html(jsonData[0].product_title);
                $('#pdPrice').html("&#2547;   " + jsonData[0].product_selling_price);
                $('#inStock').html(inStock);
                $('#pdCategory').html(jsonData[0].cat.name);
                $('#product_ids').val(id);
                $('#modalSingleView').attr("href" , url );
                $('#simpleLensImage').attr("data-lens-image" , simpleLensImageUrl );
                $('#simpleLensBigImage').attr("src" , simpleLensImageUrl );




                var maserment="";
                for (let index = 0; index < jsonData[0].maserment.length; index++) {
                    const element =  jsonData[0].maserment[index];
                    checked=""
                    if (index==0) {
                        checked="checked"
                    }else{
                        checked=""
                    }

                    maserment+='<div>';
                    maserment+='<input type="radio" id="'+element.meserment_value+'" name="maserment" '+checked+' value="'+element.meserment_value+'">';
                    maserment+='<label for="'+element.meserment_value+'"><span style="background-color:#000;"></span></label>';
                    maserment+='<span>'+element.meserment_value+'</span>&nbsp;';
                    maserment+='</div>';

                }

                $('.meserment-choose').html(maserment);




                var color="";
                for (let index = 0; index < jsonData[0].color.length; index++) {
                    const elementColor =  jsonData[0].color[index];

                    colorChecked=""
                    if (index==0) {
                        colorChecked="checked"
                    }else{
                        colorChecked=""
                    }
                    color+='<div>';
                    color+='<input type="radio" id="'+elementColor.product_color_code+'" name="color" '+colorChecked+' value="'+elementColor.product_color_code+'">';
                    color+='<label for="'+elementColor.product_color_code+'"><span style="background-color:'+elementColor.product_color_code+';"></span></label>';
                    color+='</div>';

                }

                $('.color-choose').html(color);

                var img="";
                for (let i = 0; i < jsonData[0].img.length; i++) {
                    const elementImg =  jsonData[0].img[i];

                    img+='<a  href="'+elementImg.image_path+'" class="simpleLens-thumbnail-wrapper"  data-lens-image="'+elementImg.image_path+'"  data-big-image="'+elementImg.image_path+'" ><img width="50px" height="50px" src="'+elementImg.image_path+'"></a>';

                }
                $('.simpleLens-thumbnails-container').html(img);


            } else {

            }
        }).catch(function(error) {

        });
}





