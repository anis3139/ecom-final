@extends('client.layouts.app')

@section('content')


@include('client.partials.slider')
@include('client.partials.promo')
@include('client.partials.products')


  @include('client.partials.promoOne')

  @include('client.partials.popularProducts')


  @include('client.components.specialFeatureSection')
 
  @include('client.components.testimonial')




<!--@include('client.components.client')-->


@endsection


@section('script')

    <script>

        
        $('#cartForm').on('submit',function (event) {
        event.preventDefault();
        let formData=$(this).serializeArray();
        let meserment=formData[0]['value'];
        let color=formData[1]['value'];
        let quantity=formData[2]['value'];
        let product_ids=formData[3]['value'];
            
        let url="{{route('client.addCart')}}";
        axios.post(url,{
            meserment:meserment,
            color:color,
            quantity:quantity,
            product_id:product_ids
        }).then(function (response) {
          console.log(response.data);
           if(response.status==200 && response.data==1){
            $('#quick-view-modal').modal('hide');
            toastr.success('Product Add Successfully');
            getcartData()
        }
           else{
               toastr.error('Product not Added ! Try Again');
           }

        }).catch(function (error) {
            toastr.error('Product not Added  ! Something Error');
        })


    })







getcartData()

function getcartData() {

    axios.get("{{ route('client.cartData') }}")
        .then(function(response) {

            if (response.status = 200) {
                var dataJSON = response.data;
                var cartData = dataJSON.cart;

                var a = Object.keys(cartData).length;
               

                $("#cart_quantity").html(a);
                var tp=parseFloat(dataJSON.total).toFixed(2);
                $("#total_cart_price").html(' &#2547; ' + tp);
                
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
