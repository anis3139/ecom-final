@if ($sliders)

<section id="slider" class="slider-element swiper_wrapper" data-autoplay="6000" data-speed="800" data-loop="true" data-grab="true" data-effect="fade" data-arrow="false" style="height: 600px;">

			<div class="swiper-container swiper-parent">
				<div class="swiper-wrapper">
				
					 @foreach ( $sliders as $slider)
					<div class="swiper-slide dark">
						<div class="container">
							<div class="slider-caption slider-caption-center">
								<div>
									<div class="h5 mb-2 font-secondary">{{$slider->title }}</div>
									<h2 class="bottommargin-sm text-white">{{$slider->sub_title }}</h2>
									<a href="#" class="button bg-white text-dark button-light">Shop Menswear</a>
								</div>
							</div>
						</div>
						<div class="swiper-slide-bg" style="background-image:url('{{$slider->image }}')"></div>
					</div>
					@endforeach
					
				</div>
				<div class="swiper-pagination"></div>
			</div>

		</section>
@endif