@extends('client.layouts.app')
@section('css')
<style>
    @media only screen and (max-width: 600px) {
  #cartTable {
        overflow:auto;
        display:block;
        min-width:300px;
  }
  .cart-view-total a{
      display: block;
      margin: 20px;
      padding: 10px;
      font-size: 15px;
      float: none;

  }


}
</style>


@endsection
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
                                    <table class="table table-bordered" id="cartTable">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Image</th>
                                                <th>Product</th>
                                                <th>Unit Price</th>
                                                <th>Quantity</th>
                                                <th>Color</th>
                                                <th>Meserment</th>
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
                                                    <td style="display:flex; justify-content:center; align-items: center; height:20vh;">
                                                        @if( $cartItem['maserment'])

                                                        <div style=" width:20px; height:20px; border:1px solid #000; border-radius:50%; background-color: {{ $cartItem['color'] }};"></div>
                                                        @else
                                                        {{"N/A"}}
                                                    @endif
                                                    </td>
                                                    <td>@if( $cartItem['maserment'])
                                                        {{ $cartItem['maserment'] }}
                                                        @else
                                                        {{"N/A"}}
                                                    @endif</td>

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
                                                <td colspan="6" style="font-weight: bold; text-align:center;">
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
