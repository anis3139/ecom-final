
 @php
 $HomeAboutSectionData= json_decode(App\Models\HomeAboutSecTionModel::orderBy('id', 'desc')->get()->first());
@endphp
<section id="aa-testimonial" style="background-image: url('@if($HomeAboutSectionData){{$HomeAboutSectionData->exp_image}}@endif')">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-testimonial-area">
            <ul class="aa-testimonial-slider">
              @php
                    $HomeTestimonialDatas= json_decode(App\Models\TestimonialModel::orderBy('id', 'desc')->limit(3)->get());
              @endphp
              <!-- single slide -->
              @foreach ($HomeTestimonialDatas as $HomeTestimonialData)
                  
          
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="@if($HomeAboutSectionData){{ $HomeTestimonialData->image}}@endif" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>@if($HomeAboutSectionData){!! nl2br(e( $HomeTestimonialData->description)) !!}@endif</p>
                  <div class="aa-testimonial-info">
                    <p>@if($HomeAboutSectionData){{ $HomeTestimonialData->name}}@endif</p>
                    <span>@if($HomeAboutSectionData){{ $HomeTestimonialData->date}}@endif</span>
                    
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Testimonial -->
