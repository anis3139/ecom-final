@extends('client.layouts.app')
@section('css')

<style>
.profile{
    margin: 20px 0px!important;
}
</style>

@endsection

@section('content')
    <div class="container">
        <div class="col-md-10 offset-md-1">
            <h2 class=" profile  text-center">Order id: {{ $orders->id }}</h2>
            @include('client.components.massege')
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>

                        <th>Title</th>
                        <th>Details</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders->toArray() as $column => $value)
                    @if (is_string($value))


                    @if($column=='user_id') @continue
                    @elseif ($column=='id') @continue
                    @elseif ($column=='order_product_id') @continue
                    @elseif ($column=='product_owner_id') @continue
                    @endif
                        <tr>
                            <td>{{ucwords(str_replace('_',' ', $column))}}</td>
                            <td>{{$value}}</td>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-10 offset-md-1">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>

                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Total Price</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders->product as $product)

                        <tr>


                            <td>{{$product->product->product_title}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{number_format($product->price, 2)}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
