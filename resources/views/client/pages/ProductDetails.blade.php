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
        <div id="rateYo"></div>
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
                                                    class="d-none d-md-inline-block"> Reviews ( <span
                                                        id="reviewCount"></span> )</span></a></li>
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



                                                <div class="aa-product-review-area">
                                                    <h4> <span id="reviewCount"
                                                            style="font-weight:bold; color:red; font-size:30px;">
                                                        </span> Reviews for {!! $productDetails->product_title !!}</h4>
                                                    <ul class="aa-review-nav" id="reviewResult"
                                                        style="max-height: 500px; overflow:scroll; overflow-x:hidden;">


                                                    </ul>
                                                    @auth
                                                        <h4>Add a review</h4>
                                                        <div class="aa-your-rating">
                                                            <p>Your Rating</p>
                                                            <div id="rateYo"></div>
                                                        </div>
                                                        <!-- review form -->

                                                        <form action="" class="aa-review-form" id="reating">
                                                            <div class="form-group">
                                                                <label for="message" id="reviewEmpty">Your Review <span
                                                                        style="color:red">*</span></label>
                                                                <textarea class="form-control" rows="3" id="massage"
                                                                    wrap="hard"></textarea>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-primary add-to-cart button m-0">Submit</button>
                                                            <p id="messegeview"></p>
                                                        </form>
                                                    @endauth
                                                    @guest

                                                        <h2 style="color: #FF6666; font-weight:bold; text-align:center;">Please
                                                            <a href="{{ route('client.login') }}"
                                                                class="text-center text-decoration-none text-primary">Login</a>
                                                            For Reating
                                                            And Review
                                                        </h2>

                                                    @endguest
                                                </div>

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
                                                    {{ $relProduct->product_selling_price }}</del>
                                            @endif<ins>&#2547;
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>


        $(function() {

            $("#rateYo").rateYo({

                rating: 5.00,
                spacing: "5px",
                halfStar: true,
                multiColor: {

                    "startColor": "#FF0000", //RED
                    "endColor": "#00FF00" //GREEN
                }
            });

        });






        $('#reating').submit(function(e) {
            e.preventDefault();
            var $rateYo = $("#rateYo").rateYo();
            var rating = $rateYo.rateYo("rating");
            var review = $('#massage').val();
            var product_id = $('#product_id').val();



            if (review.length == 0) {

                $('#massage').focus();
                var html = "";

                html += '<p class="text-capitalize" style="color:red">Please Type Your Review *</p>';

                $('#reviewEmpty').html(html,
                    setTimeout(function() {
                        $('#reviewEmpty').html("Your Review <span style='color:red'> *</span>");
                    }, 3000)
                );


            } else {
                axios.post("{{ route('clint.reatingReview') }}", {
                    rating: rating,
                    review: review,
                    product_id: product_id
                }).then(function(response) {


                    if (response.data) {

                        var html = "";

                        html +=
                            '<div class="alert alert-success" role="alert"><p class="text-capitalize">Thanks for your rate and review.</p></div>';

                        $('#messegeview').html(html,
                            setTimeout(function() {
                                $('#messegeview').html("");
                            }, 5000)
                        );

                        $('#reating')[0].reset();
                        getReviewData();

                    } else {
                        html += '<div class="alert alert-danger" role="alert">Incomplete Review</div>';

                        $('#messegeview').html(html,
                            setTimeout(function() {
                                $('#messegeview').html("");
                            }, 5000)
                        );

                    }
                }).catch(function(error) {
                    console.log(error);
                })
            }

        });


        $(document).ready(function() {
            getReviewData();
        });




        function getReviewData() {
            var product_id = $('#product_id').val();
            axios.post("{{ route('getproductreating') }}", {
                product_id: product_id
            }).then(function(respones) {

                var jsonData = respones.data.review;
                $('#reviewCount').html(jsonData.length);
                var html = "";
                for (let rv = 0; rv < jsonData.length; rv++) {
                    const element = jsonData[rv];
                    var date = new Date(element.review_date);
                    var convertedDate = date.toLocaleDateString('es-ES');
                    var reviewData = element.product_review.substring(0, 200).replace(/\r?\n/g, '<br />');
                    var userImage = element.image != null ? element.image : window.location.protocol + "//" + window
                        .document.location.host + "/default-image.png";


                    html += '<li>';
                    html += '<div class="media">';
                    html += '<div class="media-left">';
                    html += '<a href="#"><img class="media-object" src="' + userImage +
                        '" alt="Profile Image" style=" border-radius:50%; width:100px; height:100px;"></a>';
                    html += '</div>';
                    html += '<div class="media-body">';
                    html += '<h4 class="media-heading"><strong>' + element.name + '</strong> - <span> ' +
                        convertedDate + ' </span></h4>';
                    html += '<div class="aa-product-rating' + rv + '" style="padding:0px"> </div>';
                    html += '<p>' + reviewData + '</p>';
                    html += '</div>';
                    html += '</div>';
                    html += '</li>';
                }

                $('#reviewResult').html(html);
                for (let rate = 0; rate < jsonData.length; rate++) {
                    const element2 = jsonData[rate];

                    $(".aa-product-rating" + rate).rateYo({
                        rating: element2.star_reating,
                        readOnly: true,
                        starWidth: "15px"
                    });
                }
            }).catch(function(error) {
                console.log(error);
            });
        }


















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
