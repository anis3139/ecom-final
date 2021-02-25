@extends('client.layouts.app')

@section('content')
 
  <!-- catg header banner section -->
  @include('client.components.hero')
  <!-- / catg header banner section -->
  
  
  
  @php
$others=App\Models\OthersModel::first();
$socialData=App\Models\SocialModel::first();

@endphp




<!-- start contact section -->
 <section id="aa-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="aa-contact-area">
           <div class="aa-contact-top">
             <h2>We are wating to assist you..</h2>
             <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quos.</p>-->
           </div>
           <!-- contact map -->
           <div class="aa-contact-map">
              <iframe src=" @if ($others)
                        {!! nl2br(e($others->gmap)) !!}
                        @endif" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
           </div>
           <!-- Contact address -->
           <div class="aa-contact-address">
             <div class="row">
               <div class="col-md-8">
                 <div class="aa-contact-address-left">


  @include('client.components.massege')
                        @include('client.components.errorMassage')

                   <form class="comments-form contact-form" action="{{route('client.contactSend')}}" method="post">
                       @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" id="name" name="name" placeholder="Your Name" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" id="subject" name="subject" placeholder="Subject" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" id="PhonNumber" name="PhonNumber" placeholder="Mobile" class="form-control">
                        </div>
                      </div>
                    </div>                  
                     
                    <div class="form-group">                        
                      <textarea class="form-control" id="massage" name="massage" rows="3" placeholder="Message"></textarea>
                    </div>
                    <button typy="submit" id="contactSubmitBtn" class="aa-secondary-btn">Send</button>
                  </form>








                 </div>
               </div>
               <div class="col-md-4">
                 <div class="aa-contact-address-right">
                   <address>
                     <h4>Address</h4>
                     <p>
                         @if ($others)
                        {!! nl2br(e($others->address)) !!}
                        @endif
                        </p>
                     <p><span class="fa fa-phone"></span><a href="tel: @if ($others)
                        {{$others->phone}}
                        @endif"> @if ($others)
                        {{$others->phone}}
                        @endif</a></p>
                     <p><span class="fa fa-envelope"></span><a href="mailto: @if ($others)
                        {{$others->email}}
                        @endif"> @if ($others)
                        {{$others->email}}
                        @endif</a></p>
                   </address>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 
@endsection

@section('script')
<script>

    // $('#contactSubmitBtn').click(function(event) {
    //     event.preventDefault();
    //     var name = $('#name').val();
    //     var email = $('#email').val();
    //     var subject = $('#subject').val();
    //     var PhonNumber = $('#PhonNumber').val();
    //     var massage = $('#massage').val();
    //     sendContact(name, email, subject, PhonNumber, massage);
    // });
    // function sendContact(name, email, subject, PhonNumber, massage) {
    //     if(name.length==0){
    //       $('#name').attr("placeholder", "Your name is empty!").focus();
    //     }
    //     else if(email.length==0){
         
    //       $('#email').attr("placeholder", "Your email is empty!").focus();
    //     }
    //     else if(subject.length==0){
    //       $('#subject').attr("placeholder", "Your subject is empty!").focus();
    //     }
    //     else if(PhonNumber.length==0){
    //       $('#PhonNumber').attr("placeholder", "Your PhonNumber is empty!").focus();
    //     }
    //     else if(massage==null){
    //       $('#massage').attr("placeholder", "Your massage is empty!").focus();
    //     }
    //     else {
    //         $('#contactSubmitBtn').html('Sending....')
    //         axios.post("{{route('client.contactSend')}}",{
    //             name: name,
    //             email: email,
    //             subject: subject,
    //             PhonNumber: PhonNumber,
    //             massage: massage,
    //         })
    //             .then(function (response) {
    //                 console.log(response.data);
    //                 $('#name').val('');
    //                 $('#email').val('');
    //                 $('#subject').val('');
    //                 $('#PhonNumber').val('');
    //                 $('#massage').val('');
    //                 if(response.status==200){
    //                     console.log(response.data);
    //                     if(response.data==1){
    //                         $('#contactSubmitBtn').html('Sending Successful....')
    //                         setTimeout(function () {
    //                             $('#contactSubmitBtn').html('Send');
    //                         },3000)
    //                     }
    //                     else{
    //                         $('#contactSubmitBtn').html('Sending Failed.... ')
    //                         setTimeout(function () {
    //                             $('#contactSubmitBtn').html('Send');
    //                         },3000)
    //                     }
    //                 }
    //                 else {
    //                     $('#contactSubmitBtn').html('Sending Failed. Try Again......')
    //                     setTimeout(function () {
    //                         $('#contactSubmitBtn').html('Send');
    //                     },3000)
    //                 }
    //             }).catch(function (error) {
    //             $('#contactSubmitBtn').html('Sending Failed. Try Again......')
    //             setTimeout(function () {
    //                 $('#contactSubmitBtn').html('Send');
    //             },3000)
    //         })
    //     }
    // }


















    
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