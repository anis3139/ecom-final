@extends('client.layouts.app')

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
                                <div class="col-md-12 text-center">
                                    <h1>You need to <a style="color: #FF6666" href="{{ route('client.login') }}"> Login </a>First
                                    </h1>
                                    <h3>If you are not registerd <a style="color: #FF6666" href="{{ route('client.registration') }}"> Registration  </a>Now
                                    </h3>
                                </div>
                            @endguest
                            @auth
                                <div class="col-md-12">
                                    <h1>You ordering as {{ auth()->user()->name }} </a></h1>
                                </div>
                            @endauth

                        </div>
                        @auth()


                            <form action="{{route('client.processOrder')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="checkout-left">
                                            <div class="panel-group" id="accordion">
                                                <!-- Billing Details -->
                                                <div class="panel panel-default aa-checkout-billaddress">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion"
                                                                href="#collapseOne">
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
                                                                            value="{{ auth()->user()->name }}"
                                                                            name="customer_name">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <input type="tel" placeholder="Phone*"
                                                                            name="customer_phone_number"
                                                                            value="{{ auth()->user()->phone_number }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <textarea cols="8" rows="3"
                                                                            name="address" placeholder="Address*">{{ auth()->user()->address }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <select name="country">
                                                                            <option value="Span" selected>Span</option>
                                                                            <option value="Bangladesh">Bangladesh</option>
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
                                                                        <input type="text" placeholder="City / Town*"
                                                                            name="city" value="{{ auth()->user()->city }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <input type="text" placeholder="District*"
                                                                            name="district" value="{{ auth()->user()->district }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <input type="text" placeholder="Postcode / ZIP*"
                                                                            name="postal_code" value="{{ auth()->user()->postal_code}}">
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
                                                            <a data-toggle="collapse" data-parent="#accordion"
                                                                href="#collapseFour">
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
                                                                        <textarea cols="8" rows="3"
                                                                            name="shipping_address" placeholder="Shipping Address*"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <select name="shipping_country">
                                                                            <option value="Span" selected>Span</option>
                                                                            <option value="Bangladesh">Bangladesh</option>
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
                                                                        <input type="text" placeholder="City / Town*"
                                                                            name="shipping_city">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <input type="text" placeholder="District*"
                                                                            name="shipping_district">
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
                                                                    {{ $product['title'] }} <strong> ({{ $product['main_price'] }}x {{ $product['quantity'] }})</strong>
                                                                </td>
                                                                <td>
                                                                    &euro;  {{  number_format($product['main_price'] * $product['quantity'],2)  }}
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Total Price</th>
                                                            <td>&euro;  {{ number_format($total_main_price, 2)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total Discount</th>
                                                            <td>&euro;  {{ number_format($total_discount, 2)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Subtotal (After Discount)</th>
                                                            <td>&euro;  {{ number_format($total, 2)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tax</th>
                                                            <td>&euro;  {{ number_format($total_tax, 2)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Delivery Charge</th>
                                                            <td>&euro;  {{ number_format($total_delivery_charge, 2) }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Total Paid Amount</th>
                                                            <td>&euro;  {{ number_format( $total+ $total_tax + $total_delivery_charge , 2) }}</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <h4>Payment Method</h4>
                                            <div class="aa-payment-method">
                                                <label for="cashdelivery">
                                                    <input type="radio" id="cashdelivery" checked   value="cashdelivery" name="payment_details"> Cash on Delivery
                                                </label>
                                                <label for="paypal">
                                                    <input type="radio" id="paypal"  value="paypal" name="payment_details"> Via Paypal
                                                </label>
                                                <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg"
                                                    border="0" alt="PayPal Acceptance Mark">

                                                @IF($total>0)
                                                <input type="submit" value="Place Order" class="aa-browse-btn">
                                                @ELSE
                                                 <input readonly type="text"  value="Your Cart is empty" class="aa-browse-btn">
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
