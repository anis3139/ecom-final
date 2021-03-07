@extends('client.layouts.app')

@section('content')
    <div id="wrapper" class="clearfix">


        <!-- Slider
          ============================================= -->
        @include('client.component.Slider')

        <!-- #Slider End -->

        <!-- Content
          ============================================= -->
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">

                    @include('client.partials.HomeCategory')
                    @include('client.partials.WeeklyFeaturedItems')
                    

                </div>

                <!-- New Arrival Section ============================================= -->
                @include('client.partials.FreshArrivalPromo')


                <div class="clear"></div>

                <!-- New Arrivals Men
            ============================================= -->
               @include('client.partials.NewArrivalProduct')

                <!-- Sign Up
            ============================================= -->
                
 				@include('client.partials.Signup')
 				
                <div class="container">

                    <!-- Features  ============================================= -->
                    @include('client.partials.ServiceOffer')

                    <div class="clear"></div>

                    <!-- Brands ============================================= -->
                   
 					@include('client.partials.Brand')
                </div>

                <div class="clear"></div>

                <!-- App Buttons  ============================================= -->
                
					@include('client.partials.MobileApp')
					@include('client.partials.SpecialOffer')

                <!-- Last Section ============================================= -->
                
            </div>
        </section><!-- #content end -->

        <!-- Footer
          ============================================= -->


        <!-- #footer end -->

    </div><!-- #wrapper end -->

@endsection
