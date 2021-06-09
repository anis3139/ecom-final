@extends('client.layouts.app')
@section('title', 'My Profile')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="display-block text-center">

                        <a class="btn btn-primary reset-password m-2" title="Profile Update?"
                        href="{{ route('client.profileEdit', auth()->user()->id) }}"><i class="icon-line-edit "></i>Profile Update</a>
                    <img src="{{ auth()->user()->image ?? asset('/default-image.png') }}"
                        alt="{{ auth()->user()->name }}" width="150px" height="150px"
                        style="border-radius:50%; margin:20px  auto !important;">
                    <a class="btn btn-primary reset-password m-2" title="Reset Password?"
                        href="{{ route('client.passwordReset', auth()->user()->id) }}"><i class="icon-line-edit "></i>Pasword Update</a>
                </div>

                <table class="table table-borderless table-hover" style="padding:10px;">
                    <tr>
                        <td>name:</td>
                        <td>{{ auth()->user()->name }}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{{ auth()->user()->email }}</td>
                    </tr>
                    <tr>
                        <td>Mobile:</td>
                        <td>{{ auth()->user()->phone_number }}</td>
                    </tr>
                    <tr>
                        <td>Adress:</td>
                        <td>{{ auth()->user()->address }}</td>
                    </tr>
                    <tr>
                        <td>City:</td>
                        <td>{{ auth()->user()->city }}</td>
                    </tr>
                    <tr>
                        <td>District:</td>
                        <td>{{ auth()->user()->district }}</td>
                    </tr>
                    <tr>
                        <td>Zip code:</td>
                        <td>{{ auth()->user()->postal_code }}</td>
                    </tr>

                </table>
            </div>
            <div class="col-md-12 text-center">

                <table class="table table-bordered table-striped table-hover cart mb-5">
                    <thead>
                        <tr>
                            <th class="cart-product-remove">Order ID</th>
                            <th class="cart-product-thumbnail">Customer name</th>
                            <th class="cart-product-name">Phone Number</th>
                            <th class="cart-product-price">Total Amount</th>
                            <th class="cart-product-quantity">Paid Amount</th>
                            <th class="cart-product-subtotal">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="cart_item">
                                <td class="cart-product-name">{{ $order->id }}</td>
                                <td class="cart-product-name">{{ $order->customer_name }}</td>
                                <td class="cart-product-name">{{ $order->customer_phone_number }}</td>
                                <td class="cart-product-name">&#2547; {{ number_format($order->total_amount, 2) }}</td>
                                <td class="cart-product-name">&#2547; {{ number_format($order->paid_amount, 2) }}</td>
                                <td class="cart-product-name"><a class="text-primary"
                                        href="{{ route('client.orderDetails', $order->id) }}">View
                                        Details</a></td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>


    </div>
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

    </script>

@endsection
