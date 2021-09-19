@extends('client.layouts.app')
@section('title', 'About')
@section('css')




@endsection
@section('content')

    <!-- Page Title
                      ============================================= -->
    <section id="page-title" class="page-title-parallax include-header"
        style="padding-top: 150px; background-image: url('@if ($AboutSectionData) {{ $AboutSectionData->image2 }} @endif'); background-size: cover; background-position:
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

    @include('client.component.Scripts')

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
            if (name.length == 0) {
                $('#name').attr("placeholder", "Your name is empty!").focus();
            } else if (email.length == 0) {

                $('#email').attr("placeholder", "Your email is empty!").focus();
            } else if (subject.length == 0) {
                $('#subject').attr("placeholder", "Your subject is empty!").focus();
            } else if (PhonNumber.length == 0) {
                $('#PhonNumber').attr("placeholder", "Your PhonNumber is empty!").focus();
            } else if (PhonNumber.length < 10) {
                alert("Please Input Valid Mobile Number")
            } else if (massage.length == 0) {
                $('#massage').attr("placeholder", "Your massage is empty!").focus();
            } else {
                $('#contactSubmitBtn').html('Sending....')
                axios.post("{{ route('client.contactSend') }}", {
                        name: name,
                        email: email,
                        subject: subject,
                        PhonNumber: PhonNumber,
                        massage: massage,
                    })
                    .then(function(response) {

                        $('#name').val('');
                        $('#email').val('');
                        $('#subject').val('');
                        $('#PhonNumber').val('');
                        $('#massage').val('');
                        if (response.status == 200) {

                            if (response.data == 1) {
                                toastr.success('Message send Successfully', 'Success', {
                                    closeButton: true,
                                    progressBar: true,
                                })
                                $('#contactSubmitBtn').html('Sending Successful....')
                                setTimeout(function() {
                                    $('#contactSubmitBtn').html('Send');
                                }, 3000)
                            } else {
                                $('#contactSubmitBtn').html('Sending Failed.... ')
                                setTimeout(function() {
                                    $('#contactSubmitBtn').html('Send');
                                }, 3000)
                            }
                        } else {
                            $('#contactSubmitBtn').html('Sending Failed. Try Again......')
                            setTimeout(function() {
                                $('#contactSubmitBtn').html('Send');
                            }, 3000)
                        }
                    }).catch(function(error) {
                        $('#contactSubmitBtn').html('Sending Failed. Try Again......')
                        setTimeout(function() {
                            $('#contactSubmitBtn').html('Send');
                        }, 3000)
                    })
            }
        }
    </script>
@endsection
