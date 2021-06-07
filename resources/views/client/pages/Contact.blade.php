@extends('client.layouts.app')
@section('title', 'Contact')
@section('content')
    <!-- Page Title
      ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Contact</h1>
            <span>Get in Touch with Us</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('client.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact</li>
            </ol>
        </div>

    </section><!-- #page-title end -->
    <!-- Content
      ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row align-items-stretch col-mb-50 mb-0">
                    <!-- Contact Form
          ============================================= -->
                    <div class="col-lg-6">

                        <div class="fancy-title title-border">
                            <h3>Send us an Email</h3>
                        </div>

                        <div class="form-widget">
                            <div class="form-result">
                            </div>
                           @include('client.aboutPartial.ContactForm')
                        </div>

                    </div><!-- Contact Form End -->

                    <!-- Google Map
          ============================================= -->
                    <div class="col-lg-6 min-vh-50">
                        <div>
                            <iframe src="@if ($others)
                            {!! nl2br(e($others->gmap)) !!}
                            @endif" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div><!-- Google Map End -->
                </div>

                <!-- Contact Info
         ============================================= -->
                <div class="row col-mb-50">
                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-map-marker2"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Our Address<span class="subtitle">@if ($others)
                                    {!! nl2br(e($others->address)) !!}
                                    @endif</span></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-phone3"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Speak to Us<span class="subtitle"><a href="tel: @if ($others)
                                    {{$others->phone}}
                                    @endif"> @if ($others)
                                    {{$others->phone}}
                                    @endif</a></span></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-line-facebook"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Follow Us on FaceBook<span class="subtitle"><a href="@if ($socialData)
                                    {{$socialData->facebook}}
                                    @endif">Click Here</a></span></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-line-mail"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Mail Us<span class="subtitle"><a href="mailto: @if ($others)
                                    {{$others->email}}
                                    @endif"> @if ($others)
                                    {{$others->email}}
                                    @endif</a></span></h3>
                            </div>
                        </div>
                    </div>
                </div><!-- Contact Info End -->

            </div>
        </div>
    </section><!-- #content end -->

@endsection

@section('script')
<script>

    $('#contactSubmitBtn').click(function(event) {
        event.preventDefault();
        let name = $('#name').val();
        let email = $('#email').val();
        let subject = $('#subject').val();
        let PhonNumber = $('#PhonNumber').val();
        let massage = $('#massage').val();
        sendContact(name, email, subject, PhonNumber, massage);
    });
    function sendContact(name, email, subject, PhonNumber, massage) {
        if(name.length==0){
          $('#name').attr("placeholder", "Your name is empty!").focus();
        }
        else if(email.length==0){

          $('#email').attr("placeholder", "Your email is empty!").focus();
        }
        else if(subject.length==0){
          $('#subject').attr("placeholder", "Your subject is empty!").focus();
        }
        else if(PhonNumber.length==0){
          $('#PhonNumber').attr("placeholder", "Your PhonNumber is empty!").focus();
        }
        else if(PhonNumber.length<10){
          alert("Please Input Valid Mobile Number")
        }
        else if(massage.length==0){
          $('#massage').attr("placeholder", "Your massage is empty!").focus();
        }
        else {
            $('#contactSubmitBtn').html('Sending....')
            axios.post("{{route('client.contactSend')}}",{
                name: name,
                email: email,
                subject: subject,
                PhonNumber: PhonNumber,
                massage: massage,
            })
                .then(function (response) {

                    $('#name').val('');
                    $('#email').val('');
                    $('#subject').val('');
                    $('#PhonNumber').val('');
                    $('#massage').val('');
                    if(response.status==200){

                        if(response.data==1){
                            toastr.success('Message send Successfully','Success',{
                                                       closeButton: true,
                                                       progressBar: true,
                                                   })
                            $('#contactSubmitBtn').html('Sending Successful....')
                            setTimeout(function () {
                                $('#contactSubmitBtn').html('Send');
                            },3000)
                        }
                        else{
                            $('#contactSubmitBtn').html('Sending Failed.... ')
                            setTimeout(function () {
                                $('#contactSubmitBtn').html('Send');
                            },3000)
                        }
                    }
                    else {
                        $('#contactSubmitBtn').html('Sending Failed. Try Again......')
                        setTimeout(function () {
                            $('#contactSubmitBtn').html('Send');
                        },3000)
                    }
                }).catch(function (error) {
                $('#contactSubmitBtn').html('Sending Failed. Try Again......')
                setTimeout(function () {
                    $('#contactSubmitBtn').html('Send');
                },3000)
            })
        }
    }
















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
