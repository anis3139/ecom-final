@php
$others = App\Models\OthersModel::first();
@endphp

<header id="header" class="full-header header-size-md">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row justify-content-lg-between">

                <!-- Logo
 ============================================= -->
                <div id="logo" class="mr-lg-4">
                    <a href="{{ route('client.home') }}" class="standard-logo"><img src="@if ($others) {{ $others->logo }} @endif" alt="Canvas Logo"></a>
                    <a href="{{ route('client.home') }}" class="retina-logo"><img src="@if ($others) {{ $others->logo }} @endif" alt="Canvas Logo"></a>


                </div><!-- #logo end -->

                <div class="header-misc">

                    <!-- Top Search
  ============================================= -->
                    <div id="top-account">
                        @guest
                            <a href="#modal-register" data-lightbox="inline"><i
                                    class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i><span
                                    class="d-none d-sm-inline-block font-primary font-weight-medium">Login</span></a>
                        @endguest

                        @auth
                            <a href="{{ route('client.logout') }}"><i
                                    class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i><span
                                    class="d-none d-sm-inline-block font-primary font-weight-medium">Logout</span></a>
                        @endauth
                    </div><!-- #top-search end -->

                    <!-- Top Cart
  ============================================= -->
                    <div id="top-cart" class="header-misc-icon d-none d-sm-block">
                        <a href="#" id="top-cart-trigger"><i class="icon-line-bag"></i><span class="top-cart-number"
                                id="cart_quantity"></span></a>
                        <div class="top-cart-content">
                            <div class="top-cart-title">
                                <h4>Shopping Cart</h4>
                            </div>
                            <div class="top-cart-items">


                            </div>
                            <div class="top-cart-action">
                                <span class="top-checkout-price" id="total_cart_price"></span>
                                <a href="{{ route('client.showCart') }}"
                                    class="button button-3d button-small m-0">View Cart</a>
                            </div>
                        </div>
                    </div><!-- #top-cart end -->

                    <!-- Top Search
  ============================================= -->
                    <div id="top-search" class="header-misc-icon">
                        <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i
                                class="icon-line-cross"></i></a>
                    </div><!-- #top-search end -->

                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100">
                        <path
                            d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                        </path>
                        <path d="m 30,50 h 40"></path>
                        <path
                            d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                        </path>
                    </svg>
                </div>

                <!-- Primary Navigation
 ============================================= -->
                @include('client.component.Menu')
                <!-- #primary-menu end -->

                <form class="top-search-form" action="search.html" method="get">
                    <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.."
                        autocomplete="off">
                </form>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #header end -->
