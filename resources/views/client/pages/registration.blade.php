@extends('client.layouts.app')
@section('css')

<style>
    .aa-login-form input[type="email"], .aa-login-form input[type="number"]{
    border: 1px solid #ccc;
    font-size: 16px;
    height: 40px;
    margin-bottom: 15px;
    padding: 10px;
    width: 100%;
    }
}
</style>

@endsection
@section('content')

 <!-- catg header banner section -->
 @include('client.components.hero')
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">
            <div class="row">
              <div class="col-md-12">
                @include('client.components.massege')
                @include('client.components.errorMassage')
                <div class="aa-myaccount-register">
                 <h4>Register</h4>
                 <form action="{{route('client.addUser')}}" class="aa-login-form registration" method="post">
                    @csrf
                    <label for="">Full Name<span>*</span></label>
                    <input required name="name" type="text" placeholder="Name" value="{{old('name')}}">
                    <label for="phone">Phone Number<span>*</span></label>
                    <input required name="phone_number" type="number" placeholder="Phone Number" value="{{old('phone_number')}}">
                    <label for="">Email address<span>*</span></label>
                    <input required name="email" type="email" placeholder="Email" value="{{old('email')}}">
                    <label for="">Password<span>*</span></label>
                    <input required name="password" type="password" placeholder="Password">
                    <label for="">Confirm Password<span>*</span></label>
                    <input required name="password_confirmation" type="password" placeholder="Confirm Password">
                    <button type="submit" class="aa-browse-btn">Register</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="row">
                @guest
                    <div class="col-md-12"  style="margin-top: 20px !important">
                        <p>Have Account? Please <a class="text-primary" href="{{route('client.login')}}"> Login </a> Now</p>
                    </div>
                @endguest
            </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
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