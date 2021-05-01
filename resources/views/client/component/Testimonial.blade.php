@php
 $HomeTestimonialDatas= json_decode(App\Models\TestimonialModel::orderBy('id', 'desc')->limit(3)->get());
@endphp


  <div class="section footer-stick">

    <h4 class="text-uppercase center">What <span>Clients</span> Say?</h4>

    <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
        <div class="flexslider">
            <div class="slider-wrap">

                @foreach ($HomeTestimonialDatas as $HomeTestimonialData)
                <div class="slide">
                    <div class="testi-image">
                        <a href="#"><img src="@if($HomeAboutSectionData){{ $HomeTestimonialData->image}}@endif" alt="Customer Testimonails"></a>
                    </div>
                    <div class="testi-content">
                        <p>@if($HomeAboutSectionData){!! nl2br(e( $HomeTestimonialData->description)) !!}@endif</p>
                        <div class="testi-meta">
                            @if($HomeAboutSectionData){{ $HomeTestimonialData->name}}@endif
                            <span>@if($HomeAboutSectionData){{ $HomeTestimonialData->date}}@endif</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
