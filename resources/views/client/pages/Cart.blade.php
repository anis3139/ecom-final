@extends('client.layouts.app')
@section('title', 'My Cart')
@section('content')

    <section id="page-title">

        <div class="container">
            <h1>Cart</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('client.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('client.shop') }}">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Cart</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content  ============================================= -->

    @if (empty($cart))

        <div class="alert alert-info alert-block text-center py-5">
            <p>Please Add Some Product On Your Cart. <a class="text-primary" href="{{ route('client.shop') }}"> Go Shop
                    Page</a></p>
        </div>
    @else
        <section id="content">
            <div class="content-wrap">
                <div class="container">

                    <table class="table table-bordered table-striped table-hover cart mb-5">
                        <thead>
                            <tr>
                                <th class="cart-product-remove">&nbsp;</th>
                                <th class="cart-product-thumbnail">Image</th>
                                <th class="cart-product-name">Product</th>
                                <th class="cart-product-price">Unit Price</th>
                                <th class="cart-product-quantity">Quantity</th>
                                <th class="cart-product-color">Color</th>
                                <th class="cart-product-mesement text-center">Measurement</th>
                                <th class="cart-product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $key => $cartItem)
                                <tr class="cart_item">
                                    <td class="cart-product-remove">
                                        <form action="{{ route('client.cartRemove') }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $key }}" name="product_id">
                                            <button class="remove" title="Remove this item" type="submit"
                                                style="border: none; background-color:#fff;"><i
                                                    class="icon-trash2"></i></button>
                                        </form>
                                    </td>

                                    <td class="cart-product-thumbnail">
                                        <a href="#"><img width="64" height="64" src="{{ $cartItem['image'] }}"
                                                alt="Pink Printed Dress"></a>
                                    </td>

                                    <td class="cart-product-name">
                                        <a
                                            href="{{ route('client.showProductDetails', ['slug' => $cartItem['slug']]) }}">{{ $cartItem['title'] }}</a>
                                    </td>

                                    <td class="cart-product-price">
                                        <span class="amount">&#2547;
                                            {{ number_format($cartItem['unit_price']), 2 }}</span>
                                    </td>


                                    <td class="cart-product-quantity">
                                        <div class="quantity">

                                            <form action="{{ route('client.cartUpdate') }}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{ $key }}" name="product_update_id">
                                                <input style="width: 50px" type="number"
                                                    value="{{ $cartItem['quantity'] }}" name="quantity" min="1"
                                                    max="1000"
                                                    onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                                <button type="submit"
                                                    style="background-color: #dad9d1; color:#ff6666; margin:5px 0px 0px 5px;"><i
                                                        style="font-size:15px;" class="icon-ok"></i></button>
                                            </form>
                                        </div>
                                    </td>

                                    <td class="cart-product-color text-center hidden-xs">
                                        @if ($cartItem['color'])
                                            <div class="text-center" >
                                                <p>{{ Str::ucfirst($cartItem['color'])  }}</p>
                                            </div>
                                        @else
                                            {{ 'N/A' }}
                                        @endif
                                    </td>
                                    <td class="cart-product-mesement text-center">
                                        @if ($cartItem['maserment'])
                                            {{ $cartItem['maserment'] }}
                                        @else
                                            {{ 'N/A' }}
                                        @endif
                                    </td>

                                    <td class="cart-product-subtotal">
                                        <span class="amount">&#2547;
                                            {{ number_format($cartItem['total_price'], 2) }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="col-lg-12">
                        <div class="col-12 form-group">
                            <a href="{{ route('client.ClearCart') }}"
                                class="button button-large button-circle text-right button-3d gradient-blue-purple"><i
                                    class="icon-repeat"></i> Clear Cart</a>
                        </div>
                    </div>

                    <div class="row col-mb-30 mt-5">

                        <div class="col-md-6">
                            <div class="col-12 form-group p-3">
                                <form action="{{ route('client.cupon') }}" method="post">
                                    @csrf
                                    <label for="cupon">Have Coupon?</label>
                                    <input required class="form-control" type="text" id="cupon" name="cupon">
                                    <button type="submit"
                                        class="button button-large button-black button-rounded text-right text-light button-3d mt-3">Apply
                                        Coupon</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Cart Totals</h4>
                            <hr>
                            <div class="row">
                                @if (empty($total_cupon_discount))
                                    <div class="col-6">
                                        <h3>Total:</h3>
                                    </div>
                                    <div class="col-6">
                                        <span class="amount color lead"><strong> &#2547;
                                                {{ number_format($total, 2) }}</strong></span>
                                    </div>
                                @else

                                    <div class="col-6">
                                        <h3>Sub Total:</h3>
                                    </div>
                                    <div class="col-6">
                                        <span class="amount color lead"><strong> &#2547;
                                                {{ number_format($total, 2) }}</strong></span>
                                    </div>
                                    <div class="col-6">
                                        <h3>Cupon Discount:</h3>
                                    </div>
                                    <div class="col-6">
                                        <span class="amount color lead"><strong> &#2547;
                                                {{ number_format($total_cupon_discount, 2) }}</strong></span>
                                    </div>
                                    <div class="col-6">
                                        <h3>Total:</h3>
                                    </div>
                                    <div class="col-6">
                                        @php
                                            $grandTotal = $total - $total_cupon_discount;
                                        @endphp
                                        <span class="amount color lead"><strong> &#2547;
                                                {{ number_format($grandTotal, 2) }}</strong></span>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 form-group mt-5">
                                <a href="{{ route('client.checkout') }}"
                                    class="button button-xlarge button-black button-rounded text-right text-light button-3d">Process
                                    Checkout <i class="icon-circle-arrow-right"></i></a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section><!-- #content end -->

    @endif
@endsection
@section('script')
@include('client.component.Scripts')
@endsection
