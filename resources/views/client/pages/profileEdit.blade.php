@extends('client.layouts.app')

@section('content')


 <!-- catg header banner section -->
 @include('client.components.hero')
  <!-- / catg header banner section -->


<div id="login" class="container">

    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ml-auto">
        <div class="login-card card">
            <div class="card-header border-0 ">
                <h2 class="text-center" style="margin-top: 20px">Profile Update</h2>
            </div>
            <div class="card-body pt-0">
                @include('client.components.massege')
                @include('client.components.errorMassage')

                <form action="{{route('client.upadeteProfile', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <img id="profileImage" style="height: 150px !important; width: 150px !important; height:150px; border-radius:50%; margin:20px auto; display:block;"
                        class="imgPreview mx-auto d-block" src="{{$user->image ?? asset('/default-image.png')}}" />
                    <div class="form-group my-4">

                        <input type="file" class="form-control login" name="image" id="image" >
                    </div>
                    <div class="form-group my-4">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control login" name="name"  placeholder="Name" value="{{$user->name}}">
                    </div>
                    <div class="form-group my-4">
                        <label for="Phone">Mobile:</label>
                        <input type="text" class="form-control login"name="phone_number" placeholder="Phone Number" value="{{$user->phone_number}}">
                    </div>
                    <div class="form-group my-4">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control login" name="email" id="email" placeholder="Email"  value="{{$user->email}}">
                    </div>
                    <div class="form-group my-4">
                            <label for="address">Address:</label>
                        <textarea cols="30" rows="10"  class="form-control login" name="address" id="address" placeholder="Address" >{{$user->address}}</textarea>
                    </div>
                    <div class="form-group my-4">
                        <label for="city">City:</label>
                        <input type="text" class="form-control login" name="city" id="city" placeholder="City"  value="{{$user->city}}">
                    </div>
                    <div class="form-group my-4">
                        <label for="district">District: </label>
                        <input type="text" class="form-control login" name="district" id="district" placeholder="District"  value="{{$user->district}}">
                    </div>
                    <div class="form-group my-4">
                        <label for="postal_code">Zip Code: </label>
                        <input type="text" class="form-control login" name="postal_code" id="postal_code" placeholder="Zip Code"  value="{{$user->postal_code}}">
                    </div>


                    <div class="form-group text-center my-4">
                        <input type="submit" class="btn btn-success btn-disable btn-block p-2 font-weight-bold" value="Update" >
                    </div>
                </form>




            </div>
        </div>
    </div>


</div>
@endsection
 @section('script')

    <script>
          $('#image').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#profileImage').attr('src', ImgSource)
            }
        })
    </script>

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