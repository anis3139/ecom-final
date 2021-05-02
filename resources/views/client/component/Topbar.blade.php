@php
		$others = App\Models\OthersModel::first();
		$socialData=App\Models\SocialModel::first();
@endphp
<div id="top-bar" class="dark" style="background-color: #a3a5a7;">
			<div class="container">

				<div class="row justify-content-between align-items-center">

					<div class="col-12 col-lg-auto">
						<p class="mb-0 d-flex justify-content-center justify-content-lg-start py-3 py-lg-0"><strong>@if ($others)
                        {{$others->title}}
                        @endif</strong></p>
					</div>

					<div class="col-12 col-lg-auto d-none d-lg-flex">

						<!-- Top Links
						============================================= -->
						<div class="top-links">
							<ul class="top-links-container">
                                @auth()
								<li class="top-links-item"><a href="{{route('client.profile')}}">My Account</a></li>
                                @endauth
								<li class="top-links-item"><a href="{{route('client.showCart')}}">My Cart</a></li>
								<li class="top-links-item"><a href="{{ route('client.checkout') }}">Checkout</a></li>
								<li class="top-links-item"><a href="#">EN</a>
									<ul class="top-links-sub-menu">
										<li class="top-links-item"><a href="#"><img src="{{asset('client')}}/images/icons/flags/french.png" alt="French"> FR</a></li>
										<li class="top-links-item"><a href="#"><img src="{{asset('client')}}/images/icons/flags/italian.png" alt="Italian"> IT</a></li>
										<li class="top-links-item"><a href="#"><img src="{{asset('client')}}/images/icons/flags/german.png" alt="German"> DE</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- .top-links end -->

						<!-- Top Social
						============================================= -->
						<ul id="top-social">
							<li><a href="@if ($socialData)
                                   {{$socialData->facebook}}
                                   @endif" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
							<li><a href="@if ($socialData)
                                   {{$socialData->twitter}}
                                   @endif" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
							<li><a href="tel:@if ($others) {{ $others->phone }} @endif" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text">@if ($others) {{ $others->phone }} @endif</span></a></li>
							<li><a href="mailto: @if ($others)
                        {{$others->email}}
                        @endif" class="si-email3"><span class="ts-icon"><i class="icon-envelope-alt"></i></span><span class="ts-text"> @if ($others)
                        {{$others->email}}
                        @endif</span></a></li>
						</ul><!-- #top-social end -->

					</div>
				</div>

			</div>
		</div>
