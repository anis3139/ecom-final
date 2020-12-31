@extends('client.layouts.app')
@section('css')

    <style>
        .aa-product-catg-pagination a {
            margin: 0px 10px !important;
            color: #fff;
            background: #FF6666;
            padding: 3px 5px;
            border: 1px solid #FF6666;
            border-radius: 5px;
        }

        .aa-product-catg li figure .aa-add-card-btn {
            width: 100%;
        }

    </style>

@endsection
@section('content')

    <!-- catg header banner section -->
    <section id="aa-catg-head-banner">
        <img src="{{ asset('client') }}/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Fashion</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Women</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- / catg header banner section -->

    <!-- product category -->
    <section id="aa-product-category">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                    <div class="aa-product-catg-content">
                        <div class="aa-product-catg-head">
                            <div class="aa-product-catg-head-left">
                                <form action="" class="aa-sort-form">
                                    <label for="">Sort by</label>
                                    <select name="">
                                        <option value="1" selected="Default">Default</option>
                                        <option value="2">Name</option>
                                        <option value="3">Price</option>
                                        <option value="4">Date</option>
                                    </select>
                                </form>
                                <form action="" class="aa-show-form">
                                    <label for="">Show</label>
                                    <select name="">
                                        <option value="1" selected="12">12</option>
                                        <option value="2">24</option>
                                        <option value="3">36</option>
                                    </select>
                                </form>
                            </div>
                            <div class="aa-product-catg-head-right">
                                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
                            </div>
                        </div>
                        <div class="aa-product-catg-body">
                            <ul class="aa-product-catg">
                                <!-- start single product item -->
                                @foreach ($allProducts as $allProduct)
                                    <li>
                                        <figure>

                                            @php $i= 1; @endphp
                                            @foreach ($allProduct->img as $images)
                                                @if ($i > 0)

                                                    <a class="aa-product-img"
                                                        href="{{ route('client.showProductDetails', ['slug' => $allProduct->product_slug]) }}"><img
                                                            src="{{ $images->image_path }}" alt="polo shirt img"
                                                            width="100%" height="300px"
                                                            style="background-position: center; background-repeat: no-repeat;background-size: cover;"></a>

                                                @endif
                                                @php $i--; @endphp
                                            @endforeach

                                            <form action="{{ route('client.addCart') }}" id="cartForm" method="post">
                                                @csrf
                                                <input type="hidden" id="product_id" name="product_id"
                                                    value="{{ $allProduct->id }}">
                                                <button type="submit" class="aa-add-card-btn"><span
                                                        class="fa fa-shopping-cart" id="CartAddConfirmBtn"></span>Add To
                                                    Cart</button>
                                            </form>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a
                                                        href="#">{{ $allProduct->product_title }}</a></h4>
                                                <span class="aa-product-price">${{ $allProduct->product_price }}</span><span
                                                    class="aa-product-price"><del>${{ $allProduct->product_selling_price }}</del></span>
                                                <p class="aa-product-descrip">{{ $allProduct->product_discription }}</p>
                                            </figcaption>
                                        </figure>
                                        {{-- <div class="aa-product-hvr-content">
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span
                                                    class="fa fa-exchange"></span></a>
                                            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View"
                                                data-toggle="modal" data-target="#quick-view-modal"><span
                                                    class="fa fa-search"></span></a>
                                        </div> --}}
                                        <!-- product badge -->
                                        @if ($allProduct->product_in_stock)
                                            <span class="aa-badge aa-sale" href="#">
                                                SALE!
                                            </span>
                                        @else
                                            <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                                        @endif
                                    </li>
                                @endforeach

                                <!-- start single product item -->

                            </ul>
                            <!-- quick view modal -->
                            <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                            <div class="row">
                                                <!-- Modal view slider -->
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="aa-product-view-slider">
                                                        <div class="simpleLens-gallery-container" id="demo-1">
                                                            <div class="simpleLens-container">
                                                                <div class="simpleLens-big-image-container">
                                                                    <a class="simpleLens-lens-image"
                                                                        data-lens-image="{{ asset('client') }}/img/view-slider/large/polo-shirt-1.png">
                                                                        <img src="{{ asset('client') }}/img/view-slider/medium/polo-shirt-1.png"
                                                                            class="simpleLens-big-image">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="simpleLens-thumbnails-container">
                                                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                                                    data-lens-image="{{ asset('client') }}/img/view-slider/large/polo-shirt-1.png"
                                                                    data-big-image="{{ asset('client') }}/img/view-slider/medium/polo-shirt-1.png">
                                                                    <img
                                                                        src="{{ asset('client') }}/img/view-slider/thumbnail/polo-shirt-1.png">
                                                                </a>
                                                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                                                    data-lens-image="{{ asset('client') }}/img/view-slider/large/polo-shirt-3.png"
                                                                    data-big-image="{{ asset('client') }}/img/view-slider/medium/polo-shirt-3.png">
                                                                    <img
                                                                        src="{{ asset('client') }}/img/view-slider/thumbnail/polo-shirt-3.png">
                                                                </a>

                                                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                                                    data-lens-image="{{ asset('client') }}/img/view-slider/large/polo-shirt-4.png"
                                                                    data-big-image="{{ asset('client') }}/img/view-slider/medium/polo-shirt-4.png">
                                                                    <img
                                                                        src="{{ asset('client') }}/img/view-slider/thumbnail/polo-shirt-4.png">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal view content -->
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="aa-product-view-content">
                                                        <h3>T-Shirt</h3>
                                                        <div class="aa-price-block">
                                                            <span class="aa-product-view-price">$34.99</span>
                                                            <p class="aa-product-avilability">Avilability: <span>In
                                                                    stock</span></p>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Officiis animi, veritatis quae repudiandae quod nulla porro
                                                            quidem, itaque quis quaerat!</p>
                                                        <h4>Size</h4>
                                                        <div class="aa-prod-view-size">
                                                            <a href="#">S</a>
                                                            <a href="#">M</a>
                                                            <a href="#">L</a>
                                                            <a href="#">XL</a>
                                                        </div>
                                                        <div class="aa-prod-quantity">
                                                            <form action="">
                                                                <select name="" id="">
                                                                    <option value="0" selected="1">1</option>
                                                                    <option value="1">2</option>
                                                                    <option value="2">3</option>
                                                                    <option value="3">4</option>
                                                                    <option value="4">5</option>
                                                                    <option value="5">6</option>
                                                                </select>
                                                            </form>
                                                            <p class="aa-prod-category">
                                                                Category: <a href="#">Polo T-Shirt</a>
                                                            </p>
                                                        </div>
                                                        <div class="aa-prod-view-bottom">
                                                            <a href="#" class="aa-add-to-cart-btn"><span
                                                                    class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                            <a href="#" class="aa-add-to-cart-btn">View Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            <!-- / quick view modal -->
                        </div>
                        <div class="aa-product-catg-pagination">
                            {{ $allProducts->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                    <aside class="aa-sidebar">
                        <!-- single sidebar -->
                        <div class="aa-sidebar-widget">
                            <h3>Category</h3>
                            <ul class="aa-catg-nav">
                                @foreach (App\Models\ProductsCategoryModel::orderby('name', 'asc')
                                                                ->where('parent_id', 0)
                                                                ->get()
                                                            as $parentCat)
                                    <li><a href="{{ route('client.category', $parentCat->slug) }}">{{ $parentCat->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- single sidebar -->
                        {{-- <div class="aa-sidebar-widget">
                            <h3>Tags</h3>
                            <div class="tag-cloud">
                                <a href="#">Fashion</a>
                                <a href="#">Ecommerce</a>
                                <a href="#">Shop</a>
                                <a href="#">Hand Bag</a>
                                <a href="#">Laptop</a>
                                <a href="#">Head Phone</a>
                                <a href="#">Pen Drive</a>
                            </div>
                        </div> --}}
                        <!-- single sidebar -->
                        {{-- <div class="aa-sidebar-widget">
                            <h3>Shop By Price</h3>
                            <!-- price range -->
                            <div class="aa-sidebar-price-range">
                                <form action="">
                                    <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                                    </div>
                                    <span id="skip-value-lower" class="example-val">30.00</span>
                                    <span id="skip-value-upper" class="example-val">100.00</span>
                                    <button class="aa-filter-btn" type="submit">Filter</button>
                                </form>
                            </div>

                        </div>
                        <!-- single sidebar -->
                        <div class="aa-sidebar-widget">
                            <h3>Shop By Color</h3>
                            <div class="aa-color-tag">
                                <a class="aa-color-green" href="#"></a>
                                <a class="aa-color-yellow" href="#"></a>
                                <a class="aa-color-pink" href="#"></a>
                                <a class="aa-color-purple" href="#"></a>
                                <a class="aa-color-blue" href="#"></a>
                                <a class="aa-color-orange" href="#"></a>
                                <a class="aa-color-gray" href="#"></a>
                                <a class="aa-color-black" href="#"></a>
                                <a class="aa-color-white" href="#"></a>
                                <a class="aa-color-cyan" href="#"></a>
                                <a class="aa-color-olive" href="#"></a>
                                <a class="aa-color-orchid" href="#"></a>
                            </div>
                        </div> --}}
                        <!-- single sidebar -->
                        {{-- <div class="aa-sidebar-widget">
                            <h3>Popular Product</h3>
                            <div class="aa-recently-views">
                                <ul>
                                    @foreach ($popular_products as $popular_product)
                                        <li>
                                            @php $i= 1; @endphp
                                            @foreach ($popular_product->product->img as $images)
                                                @if ($i > 0)
                                                    <a class="aa-cartbox-img"
                                                        href="{{ route('client.showProductDetails', ['slug' => $popular_product->product->product_slug]) }}"><img
                                                            src="{{ $images->image_path }}" alt="polo shirt img"
                                                            width="100%" height="300px"></a>
                                                @endif
                                                @php $i--; @endphp
                                            @endforeach

                                            <div class="aa-cartbox-info">
                                                <h4><a
                                                        href="{{ route('client.showProductDetails', ['slug' => $popular_product->product->product_slug]) }}">{{ $popular_product->product->product_title }}</a>
                                                </h4>
                                                <p>1 x ${{ $popular_product->product->product_selling_price }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div> --}}
                        <!-- single sidebar -->
                        <div class="aa-sidebar-widget">
                            <h3>Top Rated Products</h3>
                            <div class="aa-recently-views">
                                <ul>
                                    @foreach ($topRatedProducts as $topRatedProduct)
                                        <li>
                                            @php $i= 1; @endphp
                                            @foreach ($topRatedProduct->img as $images)
                                                @if ($i > 0)
                                                    <a class="aa-cartbox-img"
                                                        href="{{ route('client.showProductDetails', ['slug' => $topRatedProduct->product_slug]) }}"><img
                                                            src="{{ $images->image_path }}" alt="polo shirt img"
                                                            width="100%" height="300px"></a>
                                                @endif
                                                @php $i--; @endphp
                                            @endforeach

                                            <div class="aa-cartbox-info">
                                                <h4><a href="#">{{$topRatedProduct->product_title}}</a></h4>
                                                <p>1 x ${{$topRatedProduct->product_price}}</p>
                                            </div>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>

            </div>
        </div>
    </section>
    <!-- / product category -->

@endsection
