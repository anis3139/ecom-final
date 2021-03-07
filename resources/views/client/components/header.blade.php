@php
$others = App\Models\OthersModel::first();

$cart = session()->has('cart') ? session()->get('cart') : [];
$total = array_sum(array_column($cart, 'total_price'));
$total_tax = array_sum(array_column($cart, 'total_tax'));
$total_delivery_charge = array_sum(array_column($cart, 'total_delivery_charge'));
$total_discount = array_sum(array_column($cart, 'total_discount'));
$total_main_price = array_sum(array_column($cart, 'total_main_price'));

@endphp
<!-- Start header section -->
<header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-top-area">
                        <!-- start header top left -->
                        <div class="aa-header-top-left">
                            <!-- start language -->
                            <div class="aa-language">
                                <div class="dropdown">

                                    <p className="mt-1" id="google_translate_element"></p>
                                </div>
                            </div>
                            <!-- / language -->

                            <!-- start currency -->

                            <!--
                            <div class="aa-currency">
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fa fa-euro"></i>EURO
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                                        <li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
                                    </ul>
                                </div>
                            </div>
                            -->

                            <!-- / currency -->
                            <!-- start cellphone -->
                            <div class="cellphone hidden-xs">
                                <p><span class="fa fa-phone"></span> <a href="tel:@if ($others) {{ $others->phone }} @endif">
                                        @if ($others)
                                            {{ $others->phone }}
                                        @endif
                                    </a></p>
                            </div>
                            <!-- / cellphone -->
                        </div>
                        <!-- / header top left -->
                        <div class="aa-header-top-right">
                            <ul class="aa-head-top-nav-right">
                                <!--<li class="hidden-xs"><a href="#">Wishlist</a></li>-->
                                <li class="hidden-xs"><a href="{{ route('client.showCart') }}">My Cart</a></li>
                                <li class="hidden-xs"><a href="{{ route('client.checkout') }}">Checkout</a></li>
                                @auth
                                    <li><a href="{{ route('client.profile') }}">My Account</a></li>
                                    <li><a href="{{ route('client.logout') }}">Log Out</a></li>
                                @endauth
                                @guest
                                    <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                                    <li><a href="{{ route('client.registration') }}">Registration</a></li>
                                @endguest
                                @php
                                    $host = $_SERVER['HTTP_HOST'];
                                    $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
                                    $location = $protocol . 'admin.' . $host . '/vendor/login';
                                    
                                @endphp
                                <li><a href="{{ route('vendor.login') }}">Seller Point</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-bottom-area">
                        <!-- logo  -->
                        <div class="aa-logo">
                            @if ($others)
                                <a href="{{ route('client.home') }}"><img src="@if ($others) {{ $others->logo }} @endif" alt="logo img" width="100px"
                                        height="60px"></a>
                            @else
                                <!-- Text based logo -->
                                <a href="{{ route('client.home') }}">
                                    <span class="fa fa-shopping-cart"></span>
                                    <p>Rainy<strong>Forest</strong> <span>Your Shopping Partner</span></p>
                                </a>
                                <!-- img based logo -->
                            @endif
                        </div>
                        <!-- / logo  -->
                        <!-- cart box -->

                        <div class="aa-cartbox">
                            <a class="aa-cart-link" href="#">
                                <span class="fa fa-shopping-basket"></span>
                                <span class="aa-cart-title">SHOPPING CART</span>
                                <span class="aa-cart-notify" id="cart_quantity"></span>
                            </a>
                            <div id="HeaderPreview">
                                <div class="aa-cartbox-summary">

                                    <ul id="headerCart">

                                    </ul>
                                    <ul>
                                        <li>
                                            <span class="aa-cartbox-total-title">
                                                Total
                                            </span>
                                            <span class="aa-cartbox-total-price" id="total_cart_price">

                                            </span>
                                        </li>

                                    </ul>
                                    <a class="aa-cartbox-checkout aa-primary-btn"
                                        href="{{ route('client.showCart') }}">Cart</a>
                                    <a class="aa-cartbox-checkout aa-primary-btn"
                                        href="{{ route('client.checkout') }}">Checkout</a>

                                </div>
                            </div>
                        </div>

                        <!-- / cart box -->
                        <!-- search box -->
                        <div class="aa-search-box">
                            <form action="{{ route('client.search') }}" method="post">
                                @csrf
                                <input required type="text" name="key" id="key" placeholder="Search Product">
                                <button type="submit"><span class="fa fa-search"></span></button>
                            </form>
                        </div>
                        <!-- / search box -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header bottom  -->
</header>
<!-- / header section -->
