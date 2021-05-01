@extends('client.layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <style>
        /* Product Color */
        .product-color {
            margin-bottom: 20px;
        }

        .color-choose div {
            display: inline-block;
            margin-top: 10px;
        }

        .color-choose input[type="radio"] {
            display: none;
        }

        .color-choose input[type="radio"]+label span {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin: -1px 4px 0 0;
            vertical-align: middle;
            cursor: pointer;
            border-radius: 50%;
        }

        .color-choose input[type="radio"]+label span {
            border: 2px solid #FFFFFF;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
        }



        .color-choose input[type="radio"]:checked+label span {
            background-image: url(/client/img/check-icn.svg);
            background-repeat: no-repeat;
            background-position: center;
        }





        /* Product Size */
        .product-color {
            margin-bottom: 20px;
        }

        .meserment-choose div {
            display: inline-block;
            margin-top: 10px;
        }

        .meserment-choose input[type="radio"] {
            display: none;
        }

        .meserment-choose input[type="radio"]+label span {
            display: inline-block;
            width: 30px;
            height: 30px;
            margin: -1px 4px 0 0;
            vertical-align: middle;
            cursor: pointer;
            border-radius: 50%;
        }

        .meserment-choose input[type="radio"]+label span {
            border: 2px solid #FFFFFF;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
        }



        .meserment-choose input[type="radio"]:checked+label span {
            background-image: url(/client/img/check-icn.svg);
            background-size: 15px;
            background-repeat: no-repeat;
            background-position: center;
        }

    </style>

@endsection
@section('content')
    <!-- Page Title
                                  ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>{!! $productDetails->product_title !!}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('client.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('client.shop') }}">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop Single</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
                                  ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="single-product">
                    <div class="product">
                        <div class="row gutter-40">

                            <div class="col-md-6">

                                <!-- Product Single - Gallery
                                         ============================================= -->
                                <div class="product-image">
                                    <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                        <div class="flexslider">
                                            <div class="slider-wrap" data-lightbox="gallery">
                                                @foreach ($productDetails->img as $images)
                                                    <div class="slide" data-thumb="{{ $images->image_path }}"><a
                                                            href="{{ $images->image_path }}"
                                                            title="Pink Printed Dress - Front View"
                                                            data-lightbox="gallery-item"><img
                                                                src="{{ $images->image_path }}"
                                                                alt="Pink Printed Dress"></a></div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @if ($productDetails->product_in_stock)
                                        <div class="sale-flash badge badge-danger p-2">Sale!</div>
                                    @else
                                        <div class="sale-flash badge badge-danger p-2">Out of Stock!</div>
                                    @endif
                                </div><!-- Product Single - Gallery End -->

                            </div>

                            <div class="col-md-6 product-desc">

                                <div class="d-flex align-items-center justify-content-between">

                                    <!-- Product Single - Price
                                          ============================================= -->
                                    <div class="product-price">
                                        @if ($productDetails->product_price != $productDetails->product_selling_price)
                                            <del>&#2547; {{ $productDetails->product_price }}</del>
                                        @endif <ins>&#2547;
                                            {{ $productDetails->product_selling_price }}</ins>
                                    </div><!-- Product Single - Price End -->

                                    <!-- Product Single - Rating
                                          ============================================= -->
                                    <div class="d-flex align-items-center">
                                        <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-half-full"></i>
                                            <i class="icon-star-empty"></i>
                                        </div><!-- Product Single - Rating End -->
                                        <button type="button" class="btn btn-sm btn-secondary ml-3"><i
                                                class="icon-heart"></i></button>
                                    </div>

                                </div>

                                <div class="line"></div>

                                <!-- Product Single - Quantity & Cart Button
                                         ============================================= -->

                                <form id="cartForm2" method="post">

                                    <div class="cart mb-0 d-flex justify-content-between align-items-center">
                                        <div class="quantity clearfix">
                                            <input type="button" value="-" class="minus">
                                            <input type="number" step="1" min="1" name="quantity" id="quantity" value="1"
                                                title="Qty" class="qty" />
                                            <input type="button" value="+" class="plus">
                                        </div>
                                        <input type="hidden" id="product_id" name="product_id"
                                            value="{{ $productDetails->id }}">
                                        <button type="submit" class="add-to-cart button m-0">Add to cart</button>
                                    </div>
                                    <!-- Product Single - Quantity & Cart Button End -->

                                    <div class="line"></div>

                                    <!-- Product Single - Short Description  -->
                                    <p>{!! $productDetails->product_discription !!}</p>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <span class="text-muted">Category:</span><span
                                                class="text-dark font-weight-semibold">{{ $productDetails->category->name }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <span class="text-muted">Color:</span><span
                                                class="text-dark font-weight-semibold">
                                                @if (count($productDetails->color) > 0)
                                                    <!-- Product Color -->


                                                    <div class="color-choose">
                                                        @foreach ($productDetails->color as $color)
                                                            <div>
                                                                <input type="radio" id="{{ $color->product_color_code }}"
                                                                    name="color" @if ($loop->first) {{ 'checked' }} @endif
                                                                    value="{{ $color->product_color_code }}">
                                                                <label for="{{ $color->product_color_code }}"><span
                                                                        style="background-color:{{ $color->product_color_code }} "></span></label>
                                                            </div>
                                                        @endforeach



                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <span class="text-muted">Size:</span><span
                                                class="text-dark font-weight-semibold">
                                                @if (count($productDetails->maserment) > 0)
                                                    <div class="meserment-choose">
                                                        @foreach ($productDetails->maserment as $maserment)
                                                            <div>
                                                                <input type="radio"
                                                                    id="{{ $maserment->meserment_value }}"
                                                                    name="maserment" @if ($loop->first) {{ 'checked' }} @endif
                                                                    value="{{ $maserment->meserment_value }}">
                                                                <label for="{{ $maserment->meserment_value }}"><span
                                                                        style="background-color:#000;"></span></label>
                                                                <span>{{ $maserment->meserment_value }}</span>&ensp;
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <span class="text-muted">Quantity:</span><span
                                                class="text-dark font-weight-semibold">{{ $productDetails->product_quantity }}
                                                Pcs</span>
                                        </li>

                                    </ul>
                                </form>
                                <!-- Product Single - Share
                                         ============================================= -->


                                <div class="si-share d-flex justify-content-between align-items-center mt-4">
                                    <span>Share:</span>
                                    <div>
                                        <a href="#" class="social-icon si-borderless si-facebook">
                                            <i class="icon-facebook"></i>
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-twitter">
                                            <i class="icon-twitter"></i>
                                            <i class="icon-twitter"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-pinterest">
                                            <i class="icon-pinterest"></i>
                                            <i class="icon-pinterest"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-gplus">
                                            <i class="icon-gplus"></i>
                                            <i class="icon-gplus"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-rss">
                                            <i class="icon-rss"></i>
                                            <i class="icon-rss"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-email3">
                                            <i class="icon-email3"></i>
                                            <i class="icon-email3"></i>
                                        </a>
                                    </div>
                                </div>


                                <!-- Product Single - Share End -->

                            </div>

                            <div class="w-100"></div>

                            <div class="col-12 mt-5">

                                <div class="tabs clearfix mb-0" id="tab-1">

                                    <ul class="tab-nav clearfix">
                                        <li><a href="#tabs-1"><i class="icon-align-justify2"></i><span
                                                    class="d-none d-md-inline-block"> Description</span></a></li>
                                        <li><a href="#tabs-2"><i class="icon-info-sign"></i><span
                                                    class="d-none d-md-inline-block"> Additional Information</span></a></li>
                                        <li><a href="#tabs-3"><i class="icon-star3"></i><span
                                                    class="d-none d-md-inline-block"> Reviews (2)</span></a></li>
                                    </ul>

                                    <div class="tab-container">

                                        <div class="tab-content clearfix" id="tabs-1">
                                            <p>{!! $productDetails->product_discription !!}</p>

                                        </div>
                                        <div class="tab-content clearfix" id="tabs-2">

                                            <table class="table table-striped table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>Size</td>
                                                        <td>
                                                            @if (count($productDetails->maserment) > 0)
                                                                <div class="meserment-choose">
                                                                    @foreach ($productDetails->maserment as $maserment)
                                                                        <div>
                                                                            <input type="radio"
                                                                                id="{{ $maserment->meserment_value }}"
                                                                                name="maserment" @if ($loop->first) {{ 'checked' }} @endif
                                                                                value="{{ $maserment->meserment_value }}">
                                                                            <label
                                                                                for="{{ $maserment->meserment_value }}"><span
                                                                                    style="background-color:#000;"></span></label>
                                                                            <span>{{ $maserment->meserment_value }}</span>&ensp;
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Color</td>
                                                        <td>
                                                            @if (count($productDetails->color) > 0)
                                                                <!-- Product Color -->


                                                                <div class="color-choose">
                                                                    @foreach ($productDetails->color as $color)
                                                                        <div>
                                                                            <input type="radio"
                                                                                id="{{ $color->product_color_code }}"
                                                                                name="color" @if ($loop->first) {{ 'checked' }} @endif
                                                                                value="{{ $color->product_color_code }}">
                                                                            <label
                                                                                for="{{ $color->product_color_code }}"><span
                                                                                    style="background-color:{{ $color->product_color_code }} "></span></label>
                                                                        </div>
                                                                    @endforeach



                                                            @endif
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="tab-content clearfix" id="tabs-3">

                                            <div id="reviews" class="clearfix">

                                                <ol class="commentlist clearfix">

                                                    <li class="comment even thread-even depth-1" id="li-comment-1">
                                                        <div id="comment-1" class="comment-wrap clearfix">

                                                            <div class="comment-meta">
                                                                <div class="comment-author vcard">
                                                                    <span class="comment-avatar clearfix">
                                                                        <img alt='Image'
                                                                            src='https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60'
                                                                            height='60' width='60' /></span>
                                                                </div>
                                                            </div>

                                                            <div class="comment-content clearfix">
                                                                <div class="comment-author">John Doe<span><a href="#"
                                                                            title="Permalink to this comment">April 24, 2021
                                                                            at 10:46AM</a></span></div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                    Quo perferendis aliquid tenetur. Aliquid, tempora, sit
                                                                    aliquam officiis nihil autem eum at repellendus facilis
                                                                    quaerat consequatur commodi laborum saepe non nemo nam
                                                                    maxime quis error tempore possimus est quasi
                                                                    reprehenderit fuga!</p>
                                                                <div class="review-comment-ratings">
                                                                    <i class="icon-star3"></i>
                                                                    <i class="icon-star3"></i>
                                                                    <i class="icon-star3"></i>
                                                                    <i class="icon-star3"></i>
                                                                    <i class="icon-star-half-full"></i>
                                                                </div>
                                                            </div>

                                                            <div class="clear"></div>

                                                        </div>
                                                    </li>

                                                    <li class="comment even thread-even depth-1" id="li-comment-2">
                                                        <div id="comment-2" class="comment-wrap clearfix">

                                                            <div class="comment-meta">
                                                                <div class="comment-author vcard">
                                                                    <span class="comment-avatar clearfix">
                                                                        <img alt='Image'
                                                                            src='https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60'
                                                                            height='60' width='60' /></span>
                                                                </div>
                                                            </div>

                                                            <div class="comment-content clearfix">
                                                                <div class="comment-author">Mary Jane<span><a href="#"
                                                                            title="Permalink to this comment">June 16, 2021
                                                                            at 6:00PM</a></span></div>
                                                                <p>Quasi, blanditiis, neque ipsum numquam odit asperiores
                                                                    hic dolor necessitatibus libero sequi amet voluptatibus
                                                                    ipsam velit qui harum temporibus cum nemo iste aperiam
                                                                    explicabo fuga odio ratione sint fugiat consequuntur
                                                                    vitae adipisci delectus eum incidunt possimus tenetur
                                                                    excepturi at accusantium quod doloremque reprehenderit
                                                                    aut expedita labore error atque?</p>
                                                                <div class="review-comment-ratings">
                                                                    <i class="icon-star3"></i>
                                                                    <i class="icon-star3"></i>
                                                                    <i class="icon-star3"></i>
                                                                    <i class="icon-star-empty"></i>
                                                                    <i class="icon-star-empty"></i>
                                                                </div>
                                                            </div>

                                                            <div class="clear"></div>

                                                        </div>
                                                    </li>

                                                </ol>

                                                <!-- Modal Reviews
                                             ============================================= -->
                                                <a href="#" data-toggle="modal" data-target="#reviewFormModal"
                                                    class="button button-3d m-0 float-right">Add a Review</a>

                                                <div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="reviewFormModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="reviewFormModalLabel">Submit a
                                                                    Review</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="row mb-0" id="template-reviewform"
                                                                    name="template-reviewform" action="#" method="post">

                                                                    <div class="col-6 mb-3">
                                                                        <label for="template-reviewform-name">Name
                                                                            <small>*</small></label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text"><i
                                                                                        class="icon-user"></i></div>
                                                                            </div>
                                                                            <input type="text" id="template-reviewform-name"
                                                                                name="template-reviewform-name" value=""
                                                                                class="form-control required" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-6 mb-3">
                                                                        <label for="template-reviewform-email">Email
                                                                            <small>*</small></label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">@</div>
                                                                            </div>
                                                                            <input type="email"
                                                                                id="template-reviewform-email"
                                                                                name="template-reviewform-email" value=""
                                                                                class="required email form-control" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="w-100"></div>

                                                                    <div class="col-12 mb-3">
                                                                        <label
                                                                            for="template-reviewform-rating">Rating</label>
                                                                        <select id="template-reviewform-rating"
                                                                            name="template-reviewform-rating"
                                                                            class="form-control">
                                                                            <option value="">-- Select One --</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="w-100"></div>

                                                                    <div class="col-12 mb-3">
                                                                        <label for="template-reviewform-comment">Comment
                                                                            <small>*</small></label>
                                                                        <textarea class="required form-control"
                                                                            id="template-reviewform-comment"
                                                                            name="template-reviewform-comment" rows="6"
                                                                            cols="30"></textarea>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <button class="button button-3d m-0" type="submit"
                                                                            id="template-reviewform-submit"
                                                                            name="template-reviewform-submit"
                                                                            value="submit">Submit Review</button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <!-- Modal Reviews End -->

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="line"></div>

                <div class="w-100">

                    <h4>Related Products</h4>
                    @php
                        $relProducts = App\Models\product_table::with('img')
                            ->where('product_category_id', $productDetails->product_category_id)
                            ->where('product_active', 1)
                            ->take(12)
                            ->inRandomOrder()
                            ->get();

                    @endphp
                    <div class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false"
                        data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">

                        @foreach ($relProducts as $relProduct)
                            <div class="oc-item">
                                <div class="product">
                                    <div class="product-image">

                                        @php $i= 2; @endphp
                                        @foreach ($relProduct->img as $images)
                                            @if ($i > 0)
                                                <a
                                                    href="{{ route('client.showProductDetails', ['slug' => $relProduct->product_slug]) }}"><img
                                                        src="{{ $images->image_path }}" alt="Checked Short Dress"></a>
                                            @endif
                                            @php $i--; @endphp
                                        @endforeach


                                        <div class="badge badge-success p-2">50% Off*</div>
                                        <div class="bg-overlay">
                                            <div class="bg-overlay-content align-items-end justify-content-between"
                                                data-hover-animate="fadeIn" data-hover-speed="400">
                                                <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"
                                                    onclick="productDetailsModal({{ $relProduct->id }})"
                                                    class="btn btn-dark mr-2"><i class="icon-shopping-cart"></i></a>
                                                <a href="" data-toggle="modal" data-target=".bd-example-modal-lg"
                                                    onclick="productDetailsModal({{ $relProduct->id }})"
                                                    class="btn btn-dark"><i class="icon-line-expand"></i></a>
                                            </div>
                                            <div class="bg-overlay-bg bg-transparent"></div>
                                        </div>
                                    </div>
                                    <div class="product-desc center">
                                        <div class="product-title">
                                            <h3><a
                                                    href="{{ route('client.showProductDetails', ['slug' => $relProduct->product_slug]) }}">{!! $relProduct->product_title !!}</a>
                                            </h3>
                                        </div>
                                        <div class="product-price">
                                            @if ($relProduct->product_price != $relProduct->product_selling_price)
                                                <del>&#2547;
                                                    {{ $relProduct->product_selling_price }}</del> @endif<ins>&#2547;
                                                {{ $relProduct->product_price }}</ins>
                                        </div>
                                        <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-half-full"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </section><!-- #content end -->




    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="single-product shop-quick-view-ajax">
                    <div class="ajax-modal-title text-center">
                        <h2 id="pdTitle"></h2>
                    </div>

                    <div class="product modal-padding">

                        <div class="row col-mb-50">
                            <div class="col-md-6">
                                <div class="product-image">
                                    <div class="fslider" data-pagi="false">
                                        <div class="flexslider">
                                            <div class="slider-wrap">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="sale-flash badge badge-danger p-2" id="inStock"></div>

                                </div>
                            </div>
                            <div class="col-md-6 product-desc">
                                <div class="product-price"><del id="pdMainPrice"></del> <ins class="font-weight-semibold"
                                        id="pdPrice"></ins></div>

                                <div class="clear"></div>
                                <div class="line"></div>
                                <form class="cart mb-0" method="post" enctype='multipart/form-data' id="cartForm">

                                    <div class="product-color">
                                        <span>Mezerment:</span>
                                        <div class="meserment-choose">

                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="line"></div>
                                    <div class="product-color">
                                        <span>Color:</span>
                                        <div class="color-choose">
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="line"></div>


                                    <div class="quantity clearfix">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" step="1" min="1" name="quantity" id="quantity" value="1"
                                            title="Qty" class="qty" size="4" />
                                        <input type="button" value="+" class="plus">
                                    </div>

                                    <input type="hidden" id="product_ids" name="product_ids">
                                    <button type="submit" class="add-to-cart button m-0">Add to cart</button>
                                </form>

                                <div class="clear"></div>
                                <div class="line"></div>
                                <p id="pDescription"></p>

                                <div class="card product-meta mb-0">
                                    <div class="card-body">
                                        <span class="posted_in">Category: <a href="#" rel="tag" id="pdCategory"></a>.</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('script')


    <script>
        getcartData()

        function getcartData() {

            axios.get("{{ route('client.cartData') }}")
                .then(function(response) {

                    if (response.status = 200) {
                        var dataJSON = response.data;
                        var cartData = dataJSON.cart;

                        var a = Object.keys(cartData).length;


                        $("#cart_quantity").html(a);
                        var tp = parseFloat(dataJSON.total).toFixed(2);
                        $("#total_cart_price").html(' &#2547; ' + tp);

                        var imageViewHtml = "";
                        $.each(cartData, function(i, item) {
                            imageViewHtml += `<div class="top-cart-item">
                                                                                 <div class="top-cart-item-image">
                                                                                     <a href="#"><img src="${cartData[i].image}"
                                                                                             alt="Blue Round-Neck Tshirt" /></a>
                                                                                 </div>
                                                                                 <div class="top-cart-item-desc">
                                                                                     <div class="top-cart-item-desc-title">
                                                                                         <a href="#">${cartData[i].title}</a>
                                                                                         <span class="top-cart-item-price d-block"> ${cartData[i].quantity} x &#2547; ${cartData[i].unit_price}</span>
                                                                                     </div>
                                                                                     <div class="top-cart-item-quantity"><button class="cartDeleteIcon" data-id="${i}" type="submit"><i class="icon-remove"> </i></button></div>
                                                                                 </div>
                                                                        </div>`
                        });


                        $('.top-cart-items').html(imageViewHtml);

                        console.log(a);

                        if (a == 0) {
                            $("#HeaderPreview").css("display", "none");
                        } else {
                            $("#HeaderPreview").css("display", "block");
                        }


                        //Carts click on delete icon
                        $(".cartDeleteIcon").click(function() {
                            var id = $(this).data('id');
                            $('#CartsDeleteId').html(id);
                            DeleteDataCart(id);
                        })
                    } else {
                        toastr.error('Something Went Wrong');
                    }
                }).catch(function(error) {

                    toastr.error('Something Went Wrong...');
                });
        }












        $('#confirmDeleteCart').click(function() {


            alert("hello")
            var id = $(this).data('id');
            DeleteDataCart(id);
        })


        //delete Cart function
        function DeleteDataCart(id) {

            axios.post("{{ route('client.cartRemove') }}", {
                    product_id: id
                })
                .then(function(response) {

                    if (response.status == 200) {
                        toastr.success('Cart Removed Success.');
                        getcartData();
                    } else {
                        toastr.error('Something Went Wrong');
                    }
                }).catch(function(error) {

                    toastr.error('Something Went Wrong......');
                });
        }








        $('#cartForm').on('submit', function(event) {
            event.preventDefault();
            let formData = $(this).serializeArray();
            let meserment = formData[0]['value'];
            let color = formData[1]['value'];
            let quantity = formData[2]['value'];
            let product_ids = formData[3]['value'];

            let url = "{{ route('client.addCart') }}";
            axios.post(url, {
                meserment: meserment,
                color: color,
                quantity: quantity,
                product_id: product_ids
            }).then(function(response) {
                console.log(response.data);
                if (response.status == 200 && response.data == 1) {
                    $('.bd-example-modal-lg').modal('hide');
                    toastr.success('Product Add Successfully');
                    getcartData()
                } else {
                    toastr.error('Product not Added ! Try Again');
                }

            }).catch(function(error) {
                toastr.error('Product not Added  ! Try Again');
            })


        })


        $('#cartForm2').on('submit', function(event) {
            event.preventDefault();
            let formData = $(this).serializeArray();
            console.log(formData);
            let quantity = formData[0]['value'];
            let product_ids = formData[1]['value'];
            let color = formData[2]['value'];
            let meserment = formData[3]['value'];
            console.log();
            let url = "{{ route('client.addCart') }}";
            axios.post(url, {
                meserment: meserment,
                color: color,
                quantity: quantity,
                product_id: product_ids
            }).then(function(response) {
                console.log(response.data);
                if (response.status == 200 && response.data == 1) {
                    $('.bd-example-modal-lg').modal('hide');
                    toastr.success('Product Add Successfully');
                    getcartData()
                } else {
                    toastr.error('Product not Added ! Try Again');
                }

            }).catch(function(error) {
                toastr.error('Product not Added  ! Try Again');
            })


        })















        // Single product Show in modal

        function productDetailsModal(id) {

            let url = "{{ route('client.getsingleProductdata') }}";
            axios.post(url, {
                    id: id
                })
                .then(function(response) {
                    console.log(response.data);
                    if (response.status == 200) {
                        var jsonData = response.data;


                        var url = `product/${jsonData[0].product_slug}`;



                        var inStock = '';
                        if (jsonData[0].product_in_stock == 0) {
                            inStock = "STOCK OUT!"
                        } else {
                            inStock = "SALE!"
                        }

                        $('#pdTitle').html(jsonData[0].product_title);
                        $('#pdPrice').html("&#2547;   " + jsonData[0].product_selling_price);
                        $('#pdMainPrice').html("&#2547;   " + jsonData[0].product_price);
                        $('#inStock').html(inStock);
                        $('#pdCategory').html(jsonData[0].cat.name);
                        $('#pDescription').html(jsonData[0].product_discription);
                        $('#product_ids').val(id);
                        $('#modalSingleView').attr("href", url);




                        var imageDiv = "";
                        for (let index = 0; index < jsonData[0].img.length; index++) {
                            const element = jsonData[0].img[index];
                            imageDiv += '<div  class="slide">';
                            imageDiv += '<a href="#" title="Pink Printed Dress - Front View">';
                            imageDiv += '<img src="' + element.image_path + '" alt="Pink Printed Dress">';
                            imageDiv += '</a>';
                            imageDiv += '</div>';

                        }

                        $('.slider-wrap').html(imageDiv);

                        var maserment = "";
                        for (let index = 0; index < jsonData[0].maserment.length; index++) {
                            const element = jsonData[0].maserment[index];
                            checked = ""
                            if (index == 0) {
                                checked = "checked"
                            } else {
                                checked = ""
                            }

                            maserment += '<div>';
                            maserment += '<input type="radio" id="' + element.meserment_value + '" name="maserment" ' +
                                checked + ' value="' + element.meserment_value + '">';
                            maserment += '<label for="' + element.meserment_value +
                                '"><span style="background-color:#000;"></span></label>';
                            maserment += '<span>' + element.meserment_value + '</span>&nbsp;';
                            maserment += '</div>';

                        }

                        $('.meserment-choose').html(maserment);




                        var color = "";
                        for (let index = 0; index < jsonData[0].color.length; index++) {
                            const elementColor = jsonData[0].color[index];

                            colorChecked = ""
                            if (index == 0) {
                                colorChecked = "checked"
                            } else {
                                colorChecked = ""
                            }
                            color += '<div>';
                            color += '<input type="radio" id="' + elementColor.product_color_code + '" name="color" ' +
                                colorChecked + ' value="' + elementColor.product_color_code + '">';
                            color += '<label for="' + elementColor.product_color_code +
                                '"><span style="background-color:' + elementColor.product_color_code +
                                ';"></span></label>';
                            color += '</div>';

                        }

                        $('.color-choose').html(color);




                    } else {

                    }
                }).catch(function(error) {

                });
        }

    </script>
@endsection
