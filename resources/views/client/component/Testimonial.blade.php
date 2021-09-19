<div class="section footer-stick" style="background-color: #fff !important;">

    <h4 class="text-uppercase center">What <span>Clients</span> Say?</h4>

    <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
        <div class="flexslider">
            <div class="slider-wrap">

                @foreach ($TestimonialDatas as $TestimonialData)
                <div class="slide">
                    <div class="testi-image">
                        <a href="#"><img src="@if($AboutSectionData){{ $TestimonialData->image}}@endif" alt="Customer Testimonails"></a>
                    </div>
                    <div class="testi-content">
                        <p>@if($AboutSectionData){!! nl2br(e( $TestimonialData->description)) !!}@endif</p>
                        <div class="testi-meta">
                            @if($AboutSectionData){{ $TestimonialData->name}}@endif
                            <span>@if($AboutSectionData){{ $TestimonialData->date}}@endif</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
