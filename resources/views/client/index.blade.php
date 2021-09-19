@extends('client.layouts.app')
@section('css')
    @include('client.component.Style')
    <style>
        .product .product-image {
            width: 100%;  
            height: 220px;
            
        }
    </style>
@endsection
@section('title')
@if ($setting) {{ $setting->title }} @endif
@endsection
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


                    <div class="clear"></div>

                    <!-- Brands ============================================= -->

                    @include('client.partials.Brand')
                </div>

                <div class="clear"></div>

                <!-- App Buttons  ============================================= -->


                @include('client.partials.SpecialOffer')

                <!-- Last Section ============================================= -->

            </div>
        </section><!-- #content end -->

        <!-- Footer
                                                                                                                                                                          ============================================= -->


        <!-- #footer end -->

    </div><!-- #wrapper end -->

    @include('client.component.Modal')




@endsection
@section('script')
    @include('client.component.Scripts')


@endsection
