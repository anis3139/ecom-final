<footer id="footer" class=" border-0" style="background-color: #cfcece; color:#000;">

    <div class="container clearfix">

        <!-- Footer Widgets
    ============================================= -->
        <div class="footer-widgets-wrap pb-3 border-bottom clearfix">

            <div class="row">
                <div class="col-lg-2 col-md-2 col-6">
                    <div class="widget clearfix">

                        <h4 class="ls0 mb-3 nott">Menu</h4>

                        <ul class="list-unstyled iconlist ml-0">
                            <li><a href="{{ route('client.home') }}">Home</a></li>
                            <li><a href="{{ route('client.about') }}">About</a></li>
                            <li><a href="{{ route('client.shop') }}">Shop</a></li>
                            <li><a href="{{ route('client.contact') }}">Contact</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-6">
                    <div class="widget clearfix">

                        <h4 class="ls0 mb-3 nott">Meta</h4>

                        <ul class="list-unstyled iconlist ml-0">
                            @auth()
                                <li><a href="{{ route('client.logout') }}">Logout</a></li>

                                <li><a href="{{ route('client.profile') }}">My Account</a></li>
                            @endauth
                            @guest
                                <li><a href="{{ route('client.login') }}">Login</a></li>
                            @endguest
                            <li><a href="{{ route('client.showCart') }}">My Cart</a></li>
                            <li><a href="{{ route('client.checkout') }}">Checkout</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-6">
                    <div class="widget clearfix">

                        <h4 class="ls0 mb-3 nott">All Pages</h4>

                        <ul class="list-unstyled iconlist ml-0">
                            @if (count($pages)>0)
                                @foreach ($pages as $page)
                                    <li><a
                                            href="{{ route('client.pages', $page->slug) }}">{{ $page->title }}</a>
                                    </li>
                                @endforeach
                            @else
                            <li class="text-danger">Pages not created </li>
                            @endif
                        </ul>

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="widget clearfix">
                        <h4 class="ls0 mb-3 nott">Contact Us</h4>

                        <div class="widget subscribe-widget mt-2 clearfix">
                            <p class="mb-1">
                                @if ($setting)
                                    {!! nl2br(e($setting->address)) !!}
                                @endif
                            </p>

                            <p class="mb-1 ">
                                @if ($setting)
                                    <i class="icon-call" style="font-size: 15px"></i> &nbsp; <a
                                        href="tel:{{ $setting->phone }}">{!! nl2br(e($setting->phone)) !!}</a>
                                @endif
                            </p>
                            <p class="mb-1 d-none d-md-block">
                                @if ($setting)
                                    <i class="icon-email" style="font-size: 15px"></i> &nbsp; <a
                                        href="mailto:{{ $setting->email }}">{!! nl2br(e($setting->email)) !!}</a>
                                @endif
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-6 text-center d-none d-md-block">
                    <div class="widget clearfix">
                        <h4 class="ls0 mb-3 nott">About us</h4>

                        <div class="widget subscribe-widget mt-2 clearfix">
                            <div class="text-center">
                                <a href="{{ route('client.about') }}"><img src=" @if ($setting) {{ $setting->logo }} @endif" alt=""
                                        width="120px" height="auto"></a>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div><!-- .footer-widgets-wrap end -->

    </div>

    <!-- Copyrights
   ============================================= -->
    <div id="copyrights" class="bg-dark text-light">

        <div class="container clearfix">

            <div class="row justify-content-between align-items-center">
                <div class="col-md-6">
                    <p>Copyrights &copy; {{ date('Y') }} {{env('APPLICATION_NAME')}}. &nbsp;All Rights Reserved. </p>

                </div>

                <div class="col-md-6 d-md-flex flex-md-column align-items-md-end mt-4 mt-md-0">
                    <div class="copyrights-menu copyright-links clearfix text-light">
                        <a class="text-light" href="{{ route('client.about') }}">About</a>/
                        <a class="text-light" href="{{ route('client.showCart') }}">My Cart</a>/
                        <a class="text-light" href="{{ route('client.checkout') }}">Checkout</a>/
                        <a class="text-light" href="{{ route('client.contact') }}">Contact</a>
                    </div>
                </div>
            </div>

        </div>

    </div><!-- #copyrights end -->

</footer>
