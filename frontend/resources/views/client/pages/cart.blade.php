@extends('client.layouts.app')

@section('content')
    <!-- catg header banner section -->
  @include('client.components.hero')
    <!-- / catg header banner section -->


    <!-- Cart view section -->
    <section id="cart-view" style="margin:0px 0px 20px 0px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="cart-view-area">
                        <div class="cart-view-table">
                            @include('client.components.massege')



                            @if (empty($cart))
                                <div class="table-responsive">
                                    <div class="alert alert-info alert-block">
                                        <p>Please Add Some Product On Your Cart. <a class="text-primary" href="{{route('client.shop')}}"> Go Shop Page</a></p>
                                    </div>
                                @else
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Image</th>
                                                <th>Product</th>
                                                <th>Unit Price</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $key => $cartItem)

                                                <tr>
                                                    <td style="width: 50px">
                                                        <form action="{{ route('client.cartRemove') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{ $key }}" name="product_id">
                                                            <button type="submit" class="btn btn-warning">
                                                                Remove
                                                            </button>
                                                        </form>
                                                    </td>

                                                    <td><img src="{{ $cartItem['image'] }}" alt=""></td>


                                                    <td><a class="aa-cart-title" href="#">{{ $cartItem['title'] }}</a></td>

                                                    <td>&euro; &nbsp;{{ number_format($cartItem['unit_price']) }} </td>

                                                    <td>{{ $cartItem['quantity'] }}</td>

                                                    <td>&euro; &nbsp;{{ number_format($cartItem['total_price'], 2) }}
                                                    </td>

                                                </tr>
                                            @endforeach



                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td style="font-weight: bold; text-align:center;">
                                                    <a href="{{ route('client.ClearCart') }}" class="btn btn-danger">Clear All Cart</a>
                                                </td>
                                                <td colspan="4" style="font-weight: bold; text-align:center;">
                                                    Total
                                                </td>
                                                <td style="font-weight: bold; text-align:center;">
                                                    &euro; &nbsp;{{ number_format($total, 2) }}
                                                </td>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>




                                    <!-- Cart Total view -->
                                    <div class="cart-view-total">
                                        <a href="{{route('client.checkout')}}" class="aa-cart-view-btn">Proced to Checkout</a>
                                    </div>


                                <!-- Cart Clear -->



                            @endif


                                    <!-- Cart Total -->
                                    <div class="cart-view-total" style="margin:0px auto; display:block; width:auto; float:left;">
                                        <a href="{{route('client.shop')}}" class="aa-cart-view-btn" style="background-color:#FF6666 !important;">Continue Shoping</a>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->
@endsection
