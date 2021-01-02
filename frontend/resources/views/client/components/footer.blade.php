@php
$others=App\Models\OthersModel::first();
$socialData=App\Models\SocialModel::first();

@endphp

<!-- footer -->  
<footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="{{ route('client.home') }}">Home</a></li>
                    <li><a href="{{ route('client.shop') }}">Shop</a></li>
                    <li><a href="{{ route('client.shop') }}">About us</a></li>
                    <li><a href="{{ route('client.shop') }}">Contact</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Privecy Policy</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Your Links</h3>
                    <ul class="aa-footer-nav">
                      @auth
                      <li><a href="{{ route('client.profile') }}">My Account</a></li>
                      <li><a href="{{ route('client.logout') }}">Log Out</a></li>
                      @endauth
                      @guest
                      <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                      <li><a href="{{route('client.registration')}}" >Registration</a></li>
                      @endguest
                      <li><a href="{{ route('client.checkout') }}">Checkout</a></li>
                    <li><a href="{{ route('client.showCart') }}">My Cart</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> @if ($others)
                        {!! nl2br(e($others->address)) !!}
                        @endif</p>
                      <p><span class="fa fa-phone"></span><a href="tel: @if ($others)
                        {{$others->phone}}
                        @endif"> @if ($others)
                        {{$others->phone}}
                        @endif</a></p>
                      <p><span class="fa fa-envelope"></span> @if ($others)
                        {{$others->email}}
                        @endif</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="@if ($socialData)
                                   {{$socialData}}
                                   @endif"><span class="fa fa-facebook"></span></a>
                      <a href="@if ($socialData)
                                   {{$socialData->twitter}}
                                   @endif"><span class="fa fa-twitter"></span></a>
                      <a href="@if ($socialData)
                                   {{$socialData->instragram}}
                                   @endif"><span class="fa fa-instagram"></span></a>
                      <a href="@if ($socialData)
                                   {{$socialData->youtube}}
                                   @endif"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Developed by <a href="https://www.facebook.com/anis3139//">Anis Arronno</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->

  