@extends('client.layouts.app')
@section('css')
<style>
    @media only screen and (max-width: 600px) {
  #cartTable {
        overflow:auto;
        display:block;
        min-width:300px;
  }
 
  .cart-view-total {
    margin:0 auto !important;  position:static; width:250px; float: none;
}
}


.cart-view-total {
    margin:10px 20px !important;  position:static; width:250px; float: right;
}
.update-cart>a{
    margin:10px 20px !important;  position:static; width:250px;
}
.aa-cart-view-btn{
    margin:10px 20px !important;  position:static; width:250px; 
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
                                                <th style="width: 50px">Action</th>
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
                                                            <button type="submit" class="fa fa-times">
                                                               
                                                            </button>
                                                        </form>
                                                    </td>

                                                    <td><img src="{{ $cartItem['image'] }}" alt=""></td>


                                                    <td><a class="aa-cart-title" href="{{ route('client.showProductDetails', ['slug' => $cartItem['slug']]) }}">{{ $cartItem['title'] }}</a></td>

                                                    <td>&#2547; {{ number_format($cartItem['unit_price']), 2 }} </td>

                                                    <td> 
                                                        
                                                        <form action="{{route('client.cartUpdate')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{ $key }}" name="product_update_id">
                                                             <input style="width: 50px" type="number" value="{{ $cartItem['quantity'] }}" name="quantity"  min="1" max="1000" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))"> 
                                                             <button type="submit" style="background-color: #dad9d1; color:#ff6666; margin:5px 0px 0px 5px;"><i style="font-size:20px;" class="fa fa-check fa-2x"></i></button>
                                                        </form>
                                                    
                                                    </td>


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

                                                    <td>&#2547; {{ number_format($cartItem['total_price'], 2) }}
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td style="font-weight: bold; text-align:center; width: 30px !important; overflow:hidden;">
                                                    <a href="{{ route('client.ClearCart') }}" class="btn btn-danger">Clear All</a>
                                                </td>
                                                <td colspan="6" style="font-weight: bold; text-align:center;">
                                                    Total
                                                </td>
                                                <td style="font-weight: bold; text-align:center;">
                                                    &#2547; {{ number_format($total, 2) }}
                                                </td>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="update-cart">
                                    
                                    
                                    <div class="cart-view-total" >
                                        <a href="{{route('client.checkout')}}"   class="aa-cart-view-btn"> Checkout</a>
                                    </div>
    
                            @endif
                                    <!-- Cart Total -->
                                    <div class="cart-view-total" >
                                        <a href="{{route('client.shop')}}" class="aa-cart-view-btn" >Continue Shoping</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->
@endsection
