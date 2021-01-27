<style>
 .aa-product-catg li figure .aa-add-card-btn {
    width: 100%;
}

</style>

<section id="aa-popular-category">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-popular-category-area">
                        <!-- start prduct navigation -->
                        <ul class="nav nav-tabs aa-products-tab">
                            <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
                            <li><a href="#featured" data-toggle="tab">Featured</a></li>
                            <li><a href="#latest" data-toggle="tab">Latest</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Start men popular category -->
                            <div class="tab-pane fade in active" id="popular">
                                <ul class="aa-product-catg aa-popular-slider">
                                    <!-- start single product item -->

                                    @foreach ($popular_products as $popular_product)
                                        <li>
                                            <figure>
                                                @php $i= 1; @endphp
                                                @foreach ($popular_product->product->img as $images)

                                                    @if ($i > 0)
                                                        <a class="aa-product-img"
                                                            href="{{ route('client.showProductDetails', ['slug' => $popular_product->product->product_slug]) }}"><img
                                                                src="{{ $images['image_path'] }}" alt="polo shirt img"
                                                                width="100%" height="300px"></a>
                                                    @endif
                                                    @php $i--; @endphp
                                                @endforeach

                                                <a  class="aa-add-card-btn"  onclick="productDetailsModal({{ $popular_product->product_id }})"
                                                    href="" data-toggle2="tooltip" data-placement="top"
                                                   data-toggle="modal" data-target="#quick-view-modal"><span
                                                                class="fa fa-shopping-cart" id="CartAddConfirmBtn"></span>Add To
                                                            Cart</a>

                                                <figcaption>
                                                    <h4 class="aa-product-title"><a
                                                            href="{{ route('client.showProductDetails', ['slug' => $popular_product->product->product_slug]) }}">{{ $popular_product->product->product_title }}</a>
                                                    </h4>

                                                    <span class="aa-product-price">&euro; &nbsp;{{$popular_product->product->product_selling_price}}</span> @if($popular_product->product->product_price !=$popular_product->product->product_selling_price)<span class="aa-product-price"><del> &euro; &nbsp;{{ $popular_product->product->product_price}}</del></span>@endif

                                                </figcaption>
                                            </figure>
                                            <div class="aa-product-hvr-content">
                                                {{-- <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Compare"><span class="fa fa-exchange"></span></a> --}}
                                                    <a onclick="productDetailsModal({{ $popular_product->product_id }})"
                                                        data-toggle2="tooltip" data-placement="top"
                                                        title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span
                                                            class="fa fa-search"></span>
                                                    </a>
                                            </div>
                                            <!-- product badge -->
                                            @if ($popular_product->product->product_in_stock)
                                                <span class="aa-badge aa-sale" href="#">
                                                    SALE!
                                                </span>
                                            @else
                                                <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                                            @endif
                                        </li>
                                    @endforeach
                                    <!-- end single product item -->

                                </ul>
                                <a class="aa-browse-btn" href="{{route('client.shop')}}">Browse all Product <span
                                        class="fa fa-long-arrow-right"></span></a>
                            </div>
                            <!-- / popular product category -->

                            <!-- start featured product category -->
                            <div class="tab-pane fade" id="featured">
                                <ul class="aa-product-catg aa-featured-slider">
                                    <!-- start single product item -->
                                    @foreach ($featureProducts as $featureProduct)
                                        <li>
                                            <figure>
                                                @php $i= 1; @endphp
                                                @foreach ($featureProduct->img as $images)
                                                    @if ($i > 0)
                                                        <a class="aa-product-img"
                                                            href="{{ route('client.showProductDetails', ['slug' => $featureProduct->product_slug]) }}"><img
                                                                src="{{ $images->image_path }}" alt="polo shirt img"
                                                                width="100%" height="300px"></a>
                                                    @endif
                                                    @php $i--; @endphp
                                                @endforeach
                                                <a  class="aa-add-card-btn"  onclick="productDetailsModal({{ $featureProduct->id }})"
                                                    href="" data-toggle2="tooltip" data-placement="top"
                                                   data-toggle="modal" data-target="#quick-view-modal"><span
                                                                class="fa fa-shopping-cart" id="CartAddConfirmBtn"></span>Add To
                                                            Cart</a>
                                                <figcaption>
                                                    <h4 class="aa-product-title"><a
                                                            href="{{ $featureProduct->product_slug }}">{{ $featureProduct->product_title }}</a>
                                                    </h4>


                                                        <span class="aa-product-price">&euro; &nbsp;{{ $featureProduct->product_selling_price}}</span> @if($featureProduct->product_price!= $featureProduct->product_selling_price)<span class="aa-product-price"><del> &euro; &nbsp;{{ $featureProduct->product_price}}</del></span>@endif
                                                </figcaption>
                                            </figure>
                                            <div class="aa-product-hvr-content">
                                                {{-- <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Compare"><span class="fa fa-exchange"></span></a> --}}
                                                    <a onclick="productDetailsModal({{ $featureProduct->id }})"
                                                        data-toggle2="tooltip" data-placement="top"
                                                        title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span
                                                            class="fa fa-search"></span></a>
                                            </div>
                                            <!-- product badge -->
                                            @if ($featureProduct->product_in_stock)
                                                <span class="aa-badge aa-sale" href="#">
                                                    SALE!
                                                </span>
                                            @else
                                                <span class="aa-badge aa-sold-out" href="{{route('client.shop')}}">Sold Out!</span>
                                            @endif
                                        </li>
                                        <!-- start single product item -->
                                    @endforeach
                                </ul>
                                <a class="aa-browse-btn" href="#">Browse all Product <span
                                        class="fa fa-long-arrow-right"></span></a>
                            </div>
                            <!-- / featured product category -->

                            <!-- start latest product category -->
                            <div class="tab-pane fade" id="latest">
                                <ul class="aa-product-catg aa-latest-slider">
                                    <!-- start single product item -->
                                    @foreach ($latestProducts as $latestProduct)


                                        <li>
                                            <figure>
                                                @php $i= 1; @endphp
                                                @foreach ($latestProduct->img as $images)
                                                    @if ($i > 0)
                                                        <a class="aa-product-img"
                                                            href="{{ route('client.showProductDetails', ['slug' => $latestProduct->product_slug]) }}"><img
                                                                src="{{ $images->image_path }}" alt="polo shirt img"
                                                                width="100%" height="300px"></a>
                                                    @endif
                                                    @php $i--; @endphp
                                                @endforeach
                                                <a  class="aa-add-card-btn"  onclick="productDetailsModal({{ $latestProduct->id }})"
                                                    href="" data-toggle2="tooltip" data-placement="top"
                                                   data-toggle="modal" data-target="#quick-view-modal"><span
                                                                class="fa fa-shopping-cart" id="CartAddConfirmBtn"></span>Add To
                                                            Cart</a>
                                                <figcaption>
                                                    <h4 class="aa-product-title"><a href="{{ route('client.showProductDetails', ['slug' => $latestProduct->product_slug]) }}">{{ $latestProduct->product_title }}</a></h4>

                                                    <span class="aa-product-price">&euro; &nbsp;{{ $latestProduct->product_selling_price}}</span> @if($latestProduct->product_price!= $latestProduct->product_selling_price)<span class="aa-product-price"><del> &euro; &nbsp;{{ $latestProduct->product_price}}</del></span>@endif




                                                </figcaption>
                                            </figure>
                                            <div class="aa-product-hvr-content">
                                                {{-- <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Compare"><span class="fa fa-exchange"></span></a> --}}
                                                    <a onclick="productDetailsModal({{ $latestProduct->id }})"
                                                        data-toggle2="tooltip" data-placement="top"
                                                        title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span
                                                            class="fa fa-search"></span></a>
                                            </div>
                                            <!-- product badge -->
                                            @if ($latestProduct->product_in_stock)
                                                <span class="aa-badge aa-sale" href="#">
                                                    SALE!
                                                </span>
                                            @else
                                                <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                                            @endif
                                        </li>
                                        <!-- end single product item -->
                                    @endforeach
                                </ul>
                                <a class="aa-browse-btn" href="{{route('client.shop')}}">Browse all Product <span
                                        class="fa fa-long-arrow-right"></span></a>
                            </div>
                            <!-- / latest product category -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
