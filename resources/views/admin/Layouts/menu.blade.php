@php
$usr = Auth::guard('admin')->user();
@endphp
<div id="main-wrapper">
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto mt-md-0">
                    <li class="nav-item "> <a class="nav-link nav-toggler  hidden-md-up  waves-effect waves-dark"
                            href="javascript:void(0)"><i class="fas  fa-bars"></i></a></li>
                    <li class="nav-item m-l-10"> <a
                            class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                            href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li>
                    <li class="nav-item mt-3">{{ $usr ->name }}</li>
                    <li class="nav-item mt-3"> &nbsp; ({{ ucfirst($usr ->getRoleNames()[0]) }})</li>

                </ul>
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item"><a href="{{ route('admin.logout') }}"
                            class="btn btn-sm btn-danger">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="left-sidebar">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-devider mt-0" style="margin-bottom: 5px"></li>
                    @if ($usr->can('home.view'))
                        <li> <a href="{{ route('admin.adminHome') }}"><span> <i class="fas fa-home"></i> </span><span
                                    class="hide-menu">Home</span></a></li>
                    @endif
                    <li> <a href="{{ route('client.home') }}" target="_blank"><span> <i class="fas fa-globe"></i>
                            </span><span class="hide-menu">Visit Site</span></a></li>

                    @if ($usr->can('visitor.view'))
                        <li> <a href="{{ route('admin.VisitorIndex') }}"><span> <i class="fas fa-users"></i>
                                </span><span class="hide-menu">Visitor</span></a></li>
                    @endif

                    @if ($usr->can('admin.view'))
                        <li> <a href="{{ route('admin.adminPannel') }}"><span> <i class="fas fa-user"></i>
                                </span><span class="hide-menu">Admin</span></a></li>
                    @endif
                    @if ($usr->can('vendor.view'))
                        <li> <a href="{{ route('admin.vendorPannel') }}"><span> <i
                                        class="fas fa-user-friends"></i></span><span class="hide-menu">Vendor</span></a>
                        </li>
                    @endif

                    @if ($usr->can('user.view'))
                        <li> <a href="{{ route('admin.userPannel') }}"><span> <i class="fas fa-users"></i>
                                </span><span class="hide-menu">Customer</span></a></li>
                    @endif
                    @if ($usr->can('order.view'))
                        <li> <a href="{{ route('admin.ordeIndex') }}"><span> <i class="fas fa-cart-arrow-down"></i>
                                </span><span class="hide-menu">Order</span></a></li>
                    @endif
                   
                    @if ($usr->can('contact.view'))
                        <li> <a href="{{ route('admin.contact') }}"><span> <i class="fas fa-mail-bulk"></i>
                                </span><span class="hide-menu">Contact</span></a></li>
                    @endif
                    @if ($usr->can('category.view'))
                        <li> <a href="{{ route('admin.categories') }}"><span> <i class="fas fa-server"></i>
                                </span><span class="hide-menu">Category</span></a></li>
                    @endif
                    @if ($usr->can('brand.view'))
                        <li> <a href="{{ route('admin.brands') }}"><span> <i class="fas fa-suitcase"></i>
                                </span><span class="hide-menu">Brand</span></a></li>
                    @endif
                    @if ($usr->can('product.view'))
                        <li> <a href="{{ route('admin.products') }}"><span> <i class="fas fa-plus-circle"></i>
                                </span><span class="hide-menu">Products</span></a></li>
                    @endif
                    @if ($usr->can('rating.view'))
                        <li> <a href="{{ route('admin.review') }}"><span><i class="far fa-comments"></i> </span><span
                                    class="hide-menu">Review</span></a></li>
                    @endif

                    @if ($usr->can('pages.view'))
                        <li> <a href="{{ route('admin.pages') }}"><span><i class="fas fa-book-open"></i></span><span
                                    class="hide-menu">Pages</span></a></li>
                    @endif
                    @if ($usr->can('blog.view'))
                        <li> <a href="{{ route('admin.blog') }}"><span><i class="fas fa-blog"></i></span><span
                                    class="hide-menu">Blog</span></a></li>
                    @endif
                    @if ($usr->can('about.view'))
                        <li> <a href="{{ route('admin.homePage') }}"><span> <i class="fas fa-sliders-h"></i>
                                </span><span class="hide-menu">About Page</span></a></li>
                    @endif
                    @if ($usr->can('slider.view'))
                        <li> <a href="{{ route('admin.slider') }}"><span> <i class="fas fa-image"></i> </span><span
                                    class="hide-menu">Slider</span></a></li>
                    @endif
                    @if ($usr->can('setting.view'))
                        <li> <a href="{{ route('admin.setting') }}"><span> <i class="fas fa-cog"></i> </span><span
                                    class="hide-menu">Generale Settings</span></a></li>
                    @endif

                    @if ($usr->can('social.view'))
                        <li> <a href="{{ route('admin.social') }}"><span> <i class="fas fa-thumbs-up"></i>
                                </span><span class="hide-menu">Social Settings</span></a></li>
                    @endif
                    @if ($usr->can('order-settings.view'))
                    <li> <a href="{{ route('admin.orderSettings') }}"><span> <i class="fas fa-cog"></i>
                            </span><span class="hide-menu">Order Settings</span></a></li>
                @endif

                </ul>
            </nav>
        </div>
    </aside>
    <div class="page-wrapper">
