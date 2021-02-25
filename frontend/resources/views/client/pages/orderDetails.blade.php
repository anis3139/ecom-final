@extends('client.layouts.app')
@section('css')

<style>
.profile{
    margin: 20px 0px!important;
}
.profile-link{
    position: fixed;
    top: 200px;
    right: 5px;
    background-color:#FF6666;
    color:#fff;
    padding: 10px;
    border-radius: 20px;
    display: inline-block;
    animation-name: profile-link;
    animation-duration: 2s;
    animation-iteration-count: infinite;
    }
    @keyframes profile-link {
  0%   {background-color: red;}
  50%  {background-color: #FF6666;}
  100% {background-color: rgb(228, 122, 23);}
}

</style>

@endsection

@section('content')
    <div class="container">
        <div class="col-md-10 offset-md-1">
            <a class="profile-link" href="{{route('client.profile')}}">Go Your Profile</a>
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

                        <th class="text-center">Product Title</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Color</th>
                        <th class="text-center">Maserment</th>
                        <th class="text-center">Total Price</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders->product as $product)
                    @if($product->product)
                        <tr>
                            <td class="text-center">{{$product->product->product_title}}</td>
                            <td class="text-center">{{$product->quantity}}</td>

                            <td style="display:flex; justify-content:center; align-items: center;">
                                @if($product->color)

                               <div style=" width:20px; height:20px; border:1px solid #000; border-radius:50%; background-color: {{$product->color}};"></div>
                                @else
                                {{"N/A"}}
                            @endif

                            </td>
                            <td class="text-center">@if($product->maserment)
                               {{$product->maserment}}
                                @else
                                {{"N/A"}}
                            @endif</td>
                            <td class="text-center">&#2547;  {{number_format($product->price, 2)}}</td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
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
    var id = $('#CartDeleteId').html();
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