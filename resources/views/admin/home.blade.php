@extends('admin.Layouts.app')
@section('title','Home')
@section('content')


<div class="container">
	<div class="row">

		<div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalVisitor}}</h3>
					<h3 class="count-card-text">Total Visitor</h3>
				</div>
			</div>
		</div>

		<div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalProduct}}</h3>
					<h3 class="count-card-text">Total Products</h3>
				</div>
			</div>
		</div>

		<div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalCategory}}</h3>
					<h3 class="count-card-text">Total Categories</h3>
				</div>
			</div>
		</div>

		<div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalBrand}}</h3>
					<h3 class="count-card-text">Total Brand</h3>
				</div>
			</div>
		</div>
		<div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalContact}}</h3>
					<h3 class="count-card-text">Total Contacts</h3>
				</div>
			</div>
		</div>


        <div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalCustomer}}</h3>
					<h3 class="count-card-text">Total Customer</h3>
				</div>
			</div>
		</div>
        <div class="col-md-12 text-center p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalSales}}</h3>
					<h3 class="count-card-text">Total Sales</h3>
				</div>
			</div>
		</div>
        <div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalSalesYearly}}</h3>
					<h3 class="count-card-text">This Year({{date('Y')}}) Sales</h3>
				</div>
			</div>
		</div>
        <div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalSalesMonthly}}</h3>
					<h3 class="count-card-text">{{date('F')}} Sales</h3>
				</div>
			</div>
		</div>

		<div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TotalSalesDaily}}</h3>
					<h3 class="count-card-text">Today Sales</h3>
				</div>
			</div>
		</div>

        <div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TodayOrder}}</h3>
					<h3 class="count-card-text">Today Order</h3>
				</div>
			</div>
		</div>
        <div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TodayDeliveredOrder}}</h3>
					<h3 class="count-card-text">Today Delivered Order</h3>
				</div>
			</div>
		</div>
        <div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TodayPendingOrder}}</h3>
					<h3 class="count-card-text">Today Pending Order</h3>
				</div>
			</div>
		</div>





        <div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$Order}}</h3>
					<h3 class="count-card-text">Total Order</h3>
				</div>
			</div>
		</div>
        <div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$DeliveredOrder}}</h3>
					<h3 class="count-card-text">Delivered Order</h3>
				</div>
			</div>
		</div>
		<div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$PendingOrder}}</h3>
					<h3 class="count-card-text">Panding Order</h3>
				</div>
			</div>
		</div>
        <div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TodayProcessingOrder}}</h3>
					<h3 class="count-card-text">Processing Order</h3>
				</div>
			</div>
		</div>

		<div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TodayOnShippingOrder}}</h3>
					<h3 class="count-card-text">On Shipping Order</h3>
				</div>
			</div>
		</div>
		<div class="col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$TodayCancelledOrder}}</h3>
					<h3 class="count-card-text"> Cancelled Order</h3>
				</div>
			</div>
		</div>




	</div>
</div>

@endsection
