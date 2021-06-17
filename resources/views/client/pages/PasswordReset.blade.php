@extends('client.layouts.app')

@section('title', 'Password Reset')
@section('content')

    <div id="login" class="container">

        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ml-auto">
            <div class="login-card card">
                <div class="card-header border-0 ">
                    <h2 class="text-center" style="margin-top: 20px">Password Reset</h2>
                </div>
                <div class="card-body pt-0">
                    @include('client.component.ErrorMessage')

                    <form action="{{ route('client.passwordUpdate', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group my-4">
                            <label for="email">Email:</label>
                            <input readonly type="text" class="form-control login" name="email" id="email" placeholder="Email"
                                value="{{ $user->email }}">
                        </div>

                        <div class="form-group my-4">
                            <label for="oldPassword">Old Password: </label>
                            <input type="password" class="form-control login" name="oldPassword" id="oldPassword"
                                placeholder="Old Password" value="{{ old('oldPassword') }}">
                        </div>
                        <div class="form-group my-4">
                            <label for="password">New Password: </label>
                            <input type="password" class="form-control login" name="password" id="password"
                                placeholder="New Password">
                        </div>
                        <div class="form-group my-4">
                            <label for="password_confirmation">Conform Password: </label>
                            <input type="password" class="form-control login" name="password_confirmation" id="password_confirmation"
                                placeholder="Conform Password">
                        </div>


                        <div class="form-group text-center my-4">
                            <input type="submit" class="btn btn-primary btn-lg btn-block font-weight-bold"
                                value="Update">
                        </div>
                    </form>




                </div>
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
                var tp = parseFloat(dataJSON.total).toFixed(2);
                $("#total_cart_price").html(' &#2547; ' + tp);

                var imageViewHtml = "";
                $.each(cartData, function(i, item) {
                    imageViewHtml += `<div class="top-cart-item">
                                                                                 <div class="top-cart-item-image">
                                                                                     <a href="#"><img src="${cartData[i].image}"
                                                                                             alt="Blue Round-Neck Tshirt" /></a>
                                                                                 </div>
                                                                                 <div class="top-cart-item-desc">
                                                                                     <div class="top-cart-item-desc-title">
                                                                                         <a href="#">${cartData[i].title}</a>
                                                                                         <span class="top-cart-item-price d-block"> ${cartData[i].quantity} x &#2547; ${cartData[i].unit_price}</span>
                                                                                     </div>
                                                                                     <div class="top-cart-item-quantity"><button class="cartDeleteIcon" data-id="${i}" type="submit"><i class="icon-remove"> </i></button></div>
                                                                                 </div>
                                                                        </div>`
                });


                $('.top-cart-items').html(imageViewHtml);

                console.log(a);

                if (a == 0) {
                    $("#HeaderPreview").css("display", "none");
                } else {
                    $("#HeaderPreview").css("display", "block");
                }


                //Carts click on delete icon
                $(".cartDeleteIcon").click(function() {
                    var id = $(this).data('id');
                    $('#CartsDeleteId').html(id);
                    DeleteDataCart(id);
                })
            } else {
                toastr.error('Something Went Wrong', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });
            }
        }).catch(function(error) {

            toastr.error('Something Went Wrong...', 'Error', {
                closeButton: true,
                progressBar: true,
            });
        });
}



$('#confirmDeleteCart').click(function() {


alert("hello")
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
    toastr.success('Cart Removed Success.', 'Success',{
closeButton: true,
progressBar: true,
});
    getcartData();
} else {
    toastr.error('Something Went Wrong', 'Error',{
closeButton: true,
progressBar: true,
});
}
}).catch(function(error) {

toastr.error('Something Went Wrong......', 'Error',{
closeButton: true,
progressBar: true,
});
});
}
    </script>

@endsection
