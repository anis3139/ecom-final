@extends('client.layouts.app')

@section('title', 'Registration')
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



 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="mt-5">
            <div class="row">
              <div class="col-md-8 offset-md-2">
                @include('client.component.Message')
                @include('client.component.ErrorMessage')
                <div class="row mb-3">
                    <div class="col-md-12 text-center">
                        <div class="col-12">
                            <h3>Registration</h3>
                        </div>
                        <a href="{{route('client.SSOLogin', 'facebook')}}" class="button button-large btn-block si-colored si-facebook nott font-weight-normal ls0 center m-0"><i class="icon-facebook-sign"></i> Sign up  with Facebook</a>

                        <a href="{{route('client.SSOLogin', 'google')}}" class=" mt-2 button button-large btn-block si-colored si-google nott font-weight-normal ls0 center m-0"><i class="icon-google"></i> Sign up with Google</a>


                        <a href="{{route('client.SSOLogin', 'github')}}" class=" mt-2 button button-large btn-block si-colored si-github nott font-weight-normal ls0 center m-0"><i class="icon-github"></i> Sign up with Github</a>

                    </div>
                </div>
                <div class="aa-myaccount-register">
                  <form id="login-form" name="login-form" class="row" action="{{ route('client.addUser') }}" method="post">
                    @csrf


                    <div class="col-12 form-group">
                        <label for="login-form-username">Full Name:</label>
                        <input required type="text"   id="login-form-username" name="name"   class="form-control" />
                    </div>
                    <div class="col-12 form-group">
                        <label for="login-form-username">Email:</label>
                        <input required type="email"   id="login-form-username" name="email"  class="form-control" />
                    </div>

                    <div class="col-12 form-group">
                        <label for="login-form-username">Mobile:</label>
                        <input required type="tel"   id="login-form-username" name="phone_number" class="form-control" />
                    </div>

                    <div class="col-12 form-group">
                        <label for="login-form-password"> Password:</label>
                        <input required required type="password" id="login-form-password" name="password" value="" class="form-control" />
                    </div>
                    <div class="col-12 form-group">
                        <label for="login-form-password">Confirm Password:</label>
                        <input  required type="password" id="login-form-password" name="password_confirmation" value="" class="form-control" />
                    </div>

                    <div class="col-12 form-group">
                        <button class="text-light p-1 button button-large si-colored si-github nott font-weight-normal ls0 center " id="login-form-submit" name="login-form-submit" value="login"> Registration </button>
                        <div class="float-right">
                           <span>Have Account?</span> <a href="{{ route('client.login') }}" class="d-block text-primary p-1  text-light p-1 button button-large si-colored si-github nott font-weight-normal ls0 center "> Login </a>
                        </div>

                    </div>


                </form>
                </div>
              </div>
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
                toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
            }
        }).catch(function(error) {

            toastr.error('Something Went Wrong...', 'Error',{
            closeButton: true,
            progressBar: true,
        });
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
