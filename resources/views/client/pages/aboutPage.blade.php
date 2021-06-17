@extends('client.layouts.app')
@section('title', 'About')
@section('css')




@endsection
@section('content')
    @php

    $HomeAboutSectionData = json_decode(
        App\Models\HomeAboutSecTionModel::orderBy('id', 'desc')
            ->get()
            ->first(),
    );
    @endphp



    <!-- Page Title
                  ============================================= -->
    <section id="page-title" class="page-title-parallax include-header"
        style="padding-top: 150px; background-image: url('@if ($HomeAboutSectionData) {{ $HomeAboutSectionData->image2 }} @endif'); background-size: cover; background-position:
        center center;" data-bottom-top="background-position:0px 400px;" data-top-bottom="background-position:0px -500px;">

        @include('client.aboutPartial.AboutIntro')

    </section><!-- #page-title end -->

    <!-- Content
                  ============================================= -->
    <section id="content">
        <div class="content-wrap">


            @include('client.component.SpecialFeatureSection')



            @include('client.component.Testimonial')


        </div>
        <div class="col-md-8 offset-md-2 mt-5">
            <div class="fancy-title title-border">
                <h3>Send us an Email</h3>
            </div>

            <div class="form-widget">
                @include('client.aboutPartial.ContactForm')
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














        let sortBtn = document.querySelector('.filter-menu').children;
        let sortItem = document.querySelector('.filter-item').children;

        for (let i = 0; i < sortBtn.length; i++) {
            sortBtn[i].addEventListener('click', function() {
                for (let j = 0; j < sortBtn.length; j++) {
                    sortBtn[j].classList.remove('current');
                }

                this.classList.add('current');


                let targetData = this.getAttribute('data-target');

                for (let k = 0; k < sortItem.length; k++) {
                    sortItem[k].classList.remove('active');
                    sortItem[k].classList.add('delete');

                    if (sortItem[k].getAttribute('data-item') == targetData || targetData == "all") {
                        sortItem[k].classList.remove('delete');
                        sortItem[k].classList.add('active');
                    }
                }
            });
        }

    </script>
@endsection
