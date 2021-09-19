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
                            <th class="cart-product-quantity">Paid Amount</th>
                            <th class="cart-product-quantity">Date</th>
                            <th class="cart-product-quantity">Status</th>
                            <th class="cart-product-subtotal">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="cart_item">
                                <td class="cart-product-name">{{ $order->order_id }}</td>
                                <td class="cart-product-name">{{ $order->customer_name }}</td>
                                <td class="cart-product-name">{{ $order->customer_phone_number }}</td>
                                <td class="cart-product-name">&#2547; {{ number_format($order->paid_amount, 2) }}</td>
                                <td class="cart-product-name"> {{ date('j F, Y', strtotime($order->created_at)) }}</td>
                                @if ($order->delivery_status==="Cancelled")
                                <td class="cart-product-name"><span class=" btn btn-large btn-danger">{{ $order->delivery_status }}</span></td>
                                @elseif ($order->delivery_status==="Delivered")
                                <td class="cart-product-name"><span class=" btn btn-large btn-primary">{{ $order->delivery_status }}</span></td>
                                @elseif ($order->delivery_status==="Processing")
                                <td class="cart-product-name"><span class=" btn btn-large btn-success">{{ $order->delivery_status }}</span></td>
                                @elseif ($order->delivery_status==="On Shipping")
                                <td class="cart-product-name"><span class=" btn btn-large btn-info">{{ $order->delivery_status }}</span></td>
                                @else
                                <td class="cart-product-name">{{ $order->delivery_status }}</td>
                                @endif
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

@include('client.component.Scripts')
@endsection
