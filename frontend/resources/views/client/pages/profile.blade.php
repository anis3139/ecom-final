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
        <div class="row">
            <div class="col-md-12">
                <img  src="{{auth()->user()->image ?? asset('/default-image.png')}}" alt="{{auth()->user()->name}}" width="150px" height="150px" style="border-radius:50%; margin:20px  auto !important; display:block;">
                <table class="table table-borderless table-hover" style="padding:10px;">
                    <tr>
                        <td>name:</td>
                        <td>{{auth()->user()->name}}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{{auth()->user()->email}}</td>
                    </tr>
                    <tr>
                        <td>Mobile:</td>
                        <td>{{auth()->user()->phone_number}}</td>
                    </tr>
                    <tr>
                        <td>Adress:</td>
                        <td>{{auth()->user()->address}}</td>
                    </tr>
                    <tr>
                        <td>City:</td>
                        <td>{{auth()->user()->city}}</td>
                    </tr>
                    <tr>
                        <td>District:</td>
                        <td>{{auth()->user()->district}}</td>
                    </tr>
                    <tr>
                        <td>Zip code:</td>
                        <td>{{auth()->user()->postal_code}}</td>
                    </tr>
                    <tr>

                        <td colspan="2"><a class="btn btn-success" href="{{route('client.profileEdit', auth()->user()->id)}}" style="margin:20px  auto !important; display:block;"><h4>Profile Edit</h4></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 text-center">

                <table class="table table-bordered table-hover" style="padding:10px; margin-top:20px;">
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
                                <td>&#2547; {{number_format($order->total_amount, 2)}}</td>
                                <td>&#2547; {{number_format($order->paid_amount, 2)}}</td>
                                <td><a class="text-primary" href="{{route('client.orderDetails', $order->id)}}">View Details</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
