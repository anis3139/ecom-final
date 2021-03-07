@extends('client.layouts.app')

@section('css')

    <style>
        #orderFormGest input,
        #orderFormGest select {
            margin: 15px auto;
        }

    </style>

@endsection


@section('content')



    <!-- catg header banner section -->
    @include('client.components.hero')
    <!-- / catg header banner section -->

    <!-- Cart view section -->
    <section id="checkout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="checkout-area">
                        @include('client.components.massege')
                        @include('client.components.errorMassage')
                        <div class="row">
                            @guest
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="{{ route('client.processOrder') }}" method="post" id="orderFormGest">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" placeholder="Name*" value="" class="form-control"
                                                            name="customer_name">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="tel" placeholder="Phone*" name="customer_phone_number"
                                                            class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="aa-checkout-single-bill">
                                                        <textarea cols="8" rows="3" class="form-control" name="address"
                                                            placeholder="Address*"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <select name="country" class="form-control">
                                                            <option value="Bangladesh" selected>Bangladesh</option>
                                                            <option value="Spain">Spain</option>
                                                            <option value="China">China</option>
                                                            <option value="India">India</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="UAE">UAE</option>
                                                            <option value="UK">UK</option>
                                                            <option value="USA">USA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" placeholder="City / Town*" class="form-control"
                                                            name="city" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" placeholder="District*" class="form-control"
                                                            name="district" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" placeholder="Postcode / ZIP*" class="form-control"
                                                            name="postal_code" value="">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="checkout-right">
                                            <h4>Order Summary</h4>
                                            <div class="aa-order-summary-area">
                                                <table class="table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($cart as $key => $product)

                                                            <tr>
                                                                <td>
                                                                    {{ $product['title'] }} <strong>
                                                                        ({{ $product['main_price'] }}x
                                                                        {{ $product['quantity'] }})</strong>
                                                                </td>
                                                                <td>
                                                                    &#2547;
                                                                    {{ number_format($product['main_price'] * $product['quantity'], 2) }}
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Total Price</th>
                                                            <td>&#2547; {{ number_format($total_main_price, 2) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total Discount</th>
                                                            <td>&#2547; {{ number_format($total_discount, 2) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Subtotal (After Discount)</th>
                                                            <td>&#2547; {{ number_format($total, 2) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tax</th>
                                                            <td>&#2547; {{ number_format($total_tax, 2) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Delivery Charge</th>
                                                            <td id="deliveryCharge">
                                                            </td>
                                                            <input type="hidden" placeholder="Name*" value="" class="form-control"
                                                            name="total_delivery_charge" id="total_delivery_charge">
                                                        </tr>

                                                        <tr>
                                                            <th>Total Paid Amount</th>
                                                            <input id="taxAndTotal" type="hidden"
                                                                value="{{ $total + $total_tax }}">
                                                            <input type="hidden" placeholder="Name*" value="" class="form-control"
                                                            name="total_main_price" id="total_main_price">
                                                            <td id="totalCharge">

                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <h4>Delivery Zone</h4>
                                            <div class="aa-payment-method" style="margin-bottom: 20px;">
                                                <label for="cashdelivery">
                                                    <input type="radio" id="in_dhaka" checked value="50" name="in_dhaka">
                                                    Inside Dhaka
                                                </label>
                                                <label for="paypal">
                                                    <input type="radio" id="in_dhaka" value="80" name="in_dhaka"> Out side of
                                                    Dhaka
                                                </label>

                                            </div>
                                            <h4>Payment Method</h4>
                                            <div class="aa-payment-method">
                                                <label for="cashdelivery">
                                                    <input type="radio" id="cashdelivery" checked value="cashdelivery"
                                                        name="payment_details"> Cash on Delivery
                                                </label>
                                                <label for="paypal">
                                                    <input type="radio" id="paypal" value="Bkash" name="payment_details"> Via
                                                    Bkash
                                                </label>


                                                @IF($total>0)
                                                    <input type="submit" value="Place Order" class="aa-browse-btn">
                                                @ELSE
                                                    <input readonly type="text" value="Your Cart is empty"
                                                        class="aa-browse-btn">
                                                @ENDIF
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                </form>
            @endguest
            @auth
                <div class="col-md-12">
                    <h1>You ordering as {{ auth()->user()->name }} </a></h1>
                </div>
            @endauth

        </div>
        @auth()


            <form action="{{ route('client.processOrder') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout-left">
                            <div class="panel-group" id="accordion">
                                <!-- Billing Details -->
                                <div class="panel panel-default aa-checkout-billaddress">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                Billing Details
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" placeholder="Name*"
                                                            value="{{ auth()->user()->name }}" name="customer_name">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="tel" placeholder="Phone*" name="customer_phone_number"
                                                            value="{{ auth()->user()->phone_number }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="aa-checkout-single-bill">
                                                        <textarea cols="8" rows="3" name="address"
                                                            placeholder="Address*">{{ auth()->user()->address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <select name="country">
                                                            <option value="Bangladesh" selected>Bangladesh</option>
                                                            <option value="Spain">Spain</option>
                                                            <option value="China">China</option>
                                                            <option value="India">India</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="UAE">UAE</option>
                                                            <option value="UK">UK</option>
                                                            <option value="USA">USA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" placeholder="City / Town*" name="city"
                                                            value="{{ auth()->user()->city }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" placeholder="District*" name="district"
                                                            value="{{ auth()->user()->district }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" placeholder="Postcode / ZIP*" name="postal_code"
                                                            value="{{ auth()->user()->postal_code }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Shipping Address -->
                                <div class="panel panel-default aa-checkout-billaddress">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                                Shippping Address
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" placeholder="Name*" value=""
                                                            name="shipping_customer_name">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="tel" placeholder="Phone*"
                                                            name="shipping_customer_phone_number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="aa-checkout-single-bill">
                                                        <textarea cols="8" rows="3" name="shipping_address"
                                                            placeholder="Shipping Address*"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <select name="shipping_country">
                                                            <option value="Bangladesh" selected>Bangladesh</option>
                                                            <option value="Spain">Spain</option>
                                                            <option value="China">China</option>
                                                            <option value="India">India</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="UAE">UAE</option>
                                                            <option value="UK">UK</option>
                                                            <option value="USA">USA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" placeholder="City / Town*" name="shipping_city">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" placeholder="District*" name="shipping_district">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" placeholder="Postcode / ZIP*"
                                                            name="shipping_postal_code">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkout-right">
                            <h4>Order Summary</h4>
                            <div class="aa-order-summary-area">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $key => $product)

                                            <tr>
                                                <td>
                                                    {{ $product['title'] }} <strong> ({{ $product['main_price'] }}x
                                                        {{ $product['quantity'] }})</strong>
                                                </td>
                                                <td>
                                                    &#2547;
                                                    {{ number_format($product['main_price'] * $product['quantity'], 2) }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Total Price</th>
                                            <td>&#2547; {{ number_format($total_main_price, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total Discount</th>
                                            <td>&#2547; {{ number_format($total_discount, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Subtotal (After Discount)</th>
                                            <td>&#2547; {{ number_format($total, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            <td>&#2547; {{ number_format($total_tax, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Delivery Charge</th>
                                            <td id="deliveryCharge">
                                            </td>
                                            <input type="hidden" placeholder="Name*" value="" class="form-control"
                                            name="total_delivery_charge" id="total_delivery_charge">
                                        </tr>

                                        <tr>
                                            <th>Total Paid Amount</th>
                                            <input id="taxAndTotal" type="hidden"
                                                value="{{ $total + $total_tax }}">
                                            <input type="hidden" placeholder="Name*" value="" class="form-control"
                                            name="total_main_price" id="total_main_price">
                                            <td id="totalCharge">

                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <h4>Delivery Zone</h4>
                            <div class="aa-payment-method">
                                <label for="cashdelivery">
                                    <input type="radio" id="in_dhaka" checked value="50" name="in_dhaka">
                                    Inside Dhaka
                                </label>
                                <label for="paypal">
                                    <input type="radio" id="out_dhaka" value="80" name="in_dhaka"> Out side of Dhaka
                                </label>
                            </div>

                            <h4>Payment Method</h4>
                            <div class="aa-payment-method">
                                <label for="cashdelivery">
                                    <input type="radio" id="cashdelivery" checked value="cashdelivery" name="payment_details">
                                    Cash on Delivery
                                </label>
                                <label for="paypal">
                                    <input type="radio" id="paypal" value="Bkash" name="payment_details"> Via Bkash
                                </label>


                                @IF($total>0)
                                    <input type="submit" value="Place Order" class="aa-browse-btn">
                                @ELSE
                                    <input readonly type="text" value="Your Cart is empty" class="aa-browse-btn">
                                @ENDIF
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="cart-view-total" style="margin:0px auto; display:block; width:auto; float:left;">
                <a href="{{ route('client.shop') }}" class="aa-cart-view-btn"
                    style="background-color:#FF6666 !important;">Continue Shoping</a>
            </div>
        @endauth

        </div>
        </div>
        </div>
        </div>
    </section>
    <!-- / Cart view section -->
@endsection


@section('script')

    <script>
        getcartData()

        function getcartData() {

            axios.get("{{ route('client.cartData') }}")
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
        });




    </script>

@endsection
