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
                                <td>&#2547;  {{number_format($order->total_amount, 2)}}</td>
                                <td>&#2547;  {{number_format($order->paid_amount, 2)}}</td>
                                <td><a class="text-primary" href="{{route('client.orderDetails', $order->id)}}">View Details</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection


@section('script')

<script>







    getcartData()

function getcartData() {

    axios.get("{{ route('client.cartData') }}")
        .then(function(response) {

            if (response.status = 200) {
                var dataJSON = response.data;
                var cartData = dataJSON.cart;

                var a = Object.keys(cartData).length;


                $("#cart_quantity").html(a);
                $("#total_cart_price").html(' &#2547; ' + dataJSON.total);

                var imageViewHtml = "";
                $.each(cartData, function (i, item) {

                    imageViewHtml += '<li>';
                    imageViewHtml += '<a class="aa-cartbox-img" href="#"><img src=" ' + cartData[i].image +
                        ' " alt="img"></a>';
                    imageViewHtml += '<div class="aa-cartbox-info"> <h4><a href="#">' + cartData[i].title +
                        '</a> </h4> <p>' + cartData[i].quantity + ' x &#2547; ' + cartData[i].unit_price +
                        '</p>  </div>';
                    imageViewHtml += '<div class="aa-remove-product"><button class="cartDeleteIcon" data-id=' +
                        i +
                        '  style=" display:inline-block" type="submit" class="fa fa-times"><i class="fa fa-remove"></i></button> </div>';
                    imageViewHtml += '</li>';
                });


                $('#headerCart').html(imageViewHtml);

                    console.log(a);

                    if (a == 0) {
                            $("#HeaderPreview").css("display", "none");
                        }else{
                            $("#HeaderPreview").css("display", "block");
                    }


                //Carts click on delete icon
                $(".cartDeleteIcon").click(function() {
                    var id = $(this).data('id');
                    $('#CartsDeleteId').html(id);
                    DeleteDataCart(id);
                })
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function(error) {

            toastr.error('Something Went Wrong...');
        });
}





$('#confirmDeleteCart').click(function() {
    ;
    var id = $(this).data('id');
    DeleteDataCart(id);
})


//delete Cart function
function DeleteDataCart(id) {

    axios.post("{{ route('client.cartRemove') }}", {
            product_id: id
        })
        .then(function(response) {

            if (response.status == 200) {
                toastr.success('Cart Removed Success.');
                getcartData();
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function(error) {

            toastr.error('Something Went Wrong......');
        });
}

</script>

@endsection
