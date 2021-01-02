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
        <div class="col-md-10 offset-md-1 text-center">
            <h2 class=" profile"> Profile as {{auth()->user()->name}}</h2>
            <table class="table table-bordered table-hover" style="padding:10px;">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer name</th>
                        <th class="hidden-xs">Customer Phone Number</th>
                        <th>Total Amount</th>
                        <th>Paid Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->customer_name}}</td>
                            <td class="hidden-xs">{{$order->customer_phone_number}}</td>
                            <td>{{number_format($order->total_amount, 2)}}</td>
                            <td>{{number_format($order->paid_amount, 2)}}</td>
                            <td><a class="text-primary" href="{{route('client.orderDetails', $order->id)}}">View Details</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
