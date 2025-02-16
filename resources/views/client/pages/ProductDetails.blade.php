@extends('client.layouts.app')
@section('title')
    {{ $productDetails->name }}
@endsection
@section('css')
    @include('client.component.Style')

@endsection
@php
$arr = $productDetails->rating;
$sum = 0;
foreach ($arr as $item) {
    $sum += $item['star_reating'];
}

if (count($arr) > 0) {
    $average = $sum / count($arr);
    $ratingValue = round(intval($average));
} else {
    $ratingValue = 0;
}

@endphp
@section('content')
    <!-- Page Title
                                                                                                                                  ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>{!! $productDetails->name !!}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('client.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('client.shop') }}">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">{!! $productDetails->name !!}</li>
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
                                                                src="{{ $images->image_path }}" alt="Pink Printed Dress"
                                                                class="pinterest-img"></a></div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @if ($productDetails->category->slug === 'customized-jewelry')
                                        <div class="sale-flash badge badge-primary p-2">Pre Order</div>
                                    @elseif($productDetails->stock > 0)
                                        <div class="sale-flash badge badge-secondary p-2">In Stock</div>
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
                                            @if ($ratingValue > 0)
                                                @for ($i = 0; $i < $ratingValue; $i++)
                                                    <i class="icon-star3"></i>
                                                @endfor
                                                @php
                                                    $emptyValue = 5 - $ratingValue;
                                                @endphp
                                                @for ($i = 0; $i < $emptyValue; $i++)
                                                    <i class="icon-star-empty"></i>
                                                @endfor
                                            @else
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                            @endif




                                        </div><!-- Product Single - Rating End -->

                                        @guest
                                            <a href="javascript:void(0);" onclick="toastr.info('To add Favorite List. You need to login first.','Info',{
                                                                                           closeButton: true,
                                                                                           progressBar: true,
                                                                                       })"
                                                class="btn btn-sm btn-secondary ml-3"><i class="icon-heart3"></i> <span>
                                                    ({{ $productDetails->favorite_to_users->count() }})</span></a>
                                        @else
                                            <a href="javascript:void(0);"
                                                onclick="document.getElementById('favorite-form-{{ $productDetails->id }}').submit();"
                                                class="{{ !Auth::user()->favorite_product->where('pivot.product_id', $productDetails->id)->count() == 0
    ? 'favorite_posts'
    : '' }}  btn btn-secondary ml-3">
                                                <i class="icon-heart"></i><span class="text-dark">&nbsp;(<span
                                                        class="favorite_posts">{{ $productDetails->favorite_to_users->count() }}</span>)</span></a>

                                            <form id="favorite-form-{{ $productDetails->id }}" method="POST"
                                                action="{{ route('client.favorite', $productDetails->id) }}"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        @endguest
                                    </div>

                                </div>

                                <div class="line"></div>

                                <!-- Product Single - Quantity & Cart Button
                                                                                                                                         ============================================= -->

                                <form id="cartForm2" method="post">
                                    @if ($productDetails->stock > 0)
                                        <div class="cart mb-0 d-flex justify-content-between align-items-center">
                                            <div class="quantity clearfix">
                                                <input type="button" value="-" class="minus">
                                                <input type="number" step="1" min="1" name="quantity" id="quantity"
                                                    value="1" title="Qty" class="qty" />
                                                <input type="button" value="+" class="plus">
                                            </div>
                                            <input type="hidden" id="product_id" name="product_id"
                                                value="{{ $productDetails->id }}">


                                            <button type="submit" class="add-to-cart button m-0">Add to cart</button>
                                        </div>
                                    @endif
                                    <!-- Product Single - Quantity & Cart Button End -->

                                    @if ($productDetails->category->slug === 'customized-jewelry')
                                        <div class="line"></div>
                                        <div class="row mt-3">
                                            <div class="col-md-6 form-group">
                                                <label for="note1">Name</label>
                                                <input required type="text" class="form-control" id="note1" name="note1">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="note1">Chain Type</label>

                                                <select class="form-control" id="note2" name="note2" required>
                                                    <option value=""> Choose an option</option>
                                                    <option value="black">Default Chain</option>
                                                    <option value="gold">Thick Round Chain</option>
                                                    <option value="rose gold">Box chain</option>
                                                    <option value="silver">Ball Chain</option>
                                                    <option value="Curb Chain">Curb Chain</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="line"></div>
                                    @endif

                                    <!-- Product Single - Short Description  -->
                                    <p>{!! \Illuminate\Support\Str::words($productDetails->description, 50, '...') !!}</p>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <span class="text-muted">Category:</span><span
                                                class="text-dark font-weight-semibold">{{ $productDetails->category->name }}</span>
                                        </li>
                                        @if ($productDetails->color)
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                <span class="text-muted">Color:</span><span
                                                    class="text-dark font-weight-semibold">
                                                    <!-- Product Color -->


                                                    <div class="color-choose">
                                                        @php
                                                            $colors = json_decode($productDetails->color, true);
                                                           
                                                        @endphp
                                                        @foreach ($colors as $color)
                                                            <div>
                                                                <input type="radio" id="{{ $color }}"
                                                                    name="color" @if ($loop->first) {{ 'checked' }} @endif
                                                                    value="{{ $color }}">
                                                                <label for="{{ $color }}"><span
                                                                        style="background-color:{{ $color }} "></span></label>
                                                                        <span>{{ Str::ucfirst( $color) }}</span>&ensp;
                                                            </div>
                                                        @endforeach

                                                    </div>

                                                </span>
                                            </li>
                                        @endif
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
                                        <a href="#" class="social-icon si-borderless si-facebook facebook-btn">
                                            <i class="icon-facebook"></i>
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-twitter twitter-btn">
                                            <i class="icon-twitter"></i>
                                            <i class="icon-twitter"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-pinterest pinterest-btn">
                                            <i class="icon-pinterest"></i>
                                            <i class="icon-pinterest"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-gplus linkedin-btn">
                                            <i class="icon-linkedin"></i>
                                            <i class="icon-linkedin"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-rss  whatsapp-btn">
                                            <i class="icon-whatsapp"></i>
                                            <i class="icon-whatsapp"></i>
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
                                            <p>{!! $productDetails->description !!}</p>

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
                                                    @if ($productDetails->color)
                                                        <tr>
                                                            <td>Color</td>
                                                            <td>
                                                                <!-- Product Color -->


                                                                <div class="color-choose">
                                                                    @php
                                                                        $colors = json_decode($productDetails->color, true);
                                                                    @endphp
                                                                    @foreach ($colors as $color)


                                                                        <div>
                                                                            <input type="radio" id="{{ $color }}"
                                                                                name="color" @if ($loop->first) {{ 'checked' }} @endif
                                                                                value="{{ $color }}">
                                                                            <label for="{{ $color }}"><span
                                                                                    style="background-color:{{ $color }} "></span></label>
                                                                                    <span>{{ Str::ucfirst( $color) }}</span>&ensp;
                                                                        </div>
                                                                    @endforeach

                                                                </div>



                                                            </td>
                                                        </tr>
                                                    @endif

                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="tab-content clearfix" id="tabs-3">

                                            <div id="reviews" class="clearfix">



                                                <div class="aa-product-review-area">
                                                    <h4> <span id="reviewCount"
                                                            style="font-weight:bold; color:red; font-size:30px;">
                                                        </span> Reviews for {!! $productDetails->name !!}</h4>
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
                        $relProducts = App\Models\Product::with('img')
                            ->where('category_id', $productDetails->category_id)
                            ->where('status', 1)
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

                                        @php
                                            $imageOne=$relProduct->img[0]->image_path??'';
                                            $imageTwo=$relProduct->img[1]->image_path?? $relProduct->img[0]->image_path;
                                            
                                        @endphp

                                        <a href="{{ route('client.showProductDetails', ['slug' => $relProduct->slug]) }}">
                                            <img src="{{ $imageOne }}" alt="" />
                                              <img class="hoverimage" src="{{ $imageTwo }}" alt="" />
                                           
                                              @if ($relProduct->category->slug === "customized-jewelry")
                                              <div class="sale-flash badge badge-primary p-2">Pre Order</div>
                                              @elseif($relProduct->stock > 0)
                                              <div class="sale-flash badge badge-secondary p-2">In Stock</div>
                                              @else
                                                  <div class="sale-flash badge badge-danger p-2">Out of Stock!</div>
                                              @endif
  
                                            
                                            <div class="hoverbuttonbox" >
                                                    <div class="buttonaction"
                                                            data-hover-animate="fadeIn" data-hover-speed="400">
                                                                @guest
                                                                    <a href="javascript:void(0);" onclick="toastr.info('To add Favorite List. You need to login first.','Info',{
                                                                         closeButton: true,
                                                                        progressBar: true,
                                                                        })" class="btn btn-dark"><i class="icon-heart3"></i> <span> ({{ $relProduct->favorite_to_users->count() }})</span>
                                                                    </a>
                                                                @else
                                                                    <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $relProduct->id }}').submit();"
                                                                        class="{{ !Auth::user()->favorite_product->where('pivot.product_id',$relProduct->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="icon-heart3"></i><span class="text-dark">(<span class="favorite_posts">{{ $relProduct->favorite_to_users->count() }}</span>)</span>
                                                                    </a>

                                                                    <form id="favorite-form-{{ $relProduct->id }}" method="POST" action="{{ route('client.favorite',$relProduct->id) }}" style="display: none;">
                                                                        @csrf
                                                                    </form>
                                                                @endguest
                                                    </div>
                                                    <div class="buttonaction right">
                                                                <a href="{{  $imageTwo }}" class="btn btn-dark" data-toggle="modal"
                                                                    data-target=".bd-example-modal-lg"
                                                                    onclick="productDetailsModal({{ $relProduct->id }})"><i
                                                                        class="icon-line-expand"></i>
                                                                </a>
                                                            
                                                    </div>
                                                        
                                            </div>
                                          
                                        </a>
                                        
                                       
                                    </div>
                                    <div class="product-desc center">
                                        <div class="product-title">
                                            <h3><a
                                                    href="{{ route('client.showProductDetails', ['slug' => $relProduct->slug]) }}">{!! $relProduct->name !!}</a>
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
                                            @php
                                                $arr = $relProduct->rating;
                                                $sum = 0;
                                                foreach ($arr as $item) {
                                                    $sum += $item['star_reating'];
                                                }

                                                if (count($arr) > 0) {
                                                    $average = $sum / count($arr);
                                                    $ratingValue = round(intval($average));
                                                } else {
                                                    $ratingValue = 0;
                                                }
                                            @endphp
                                            @if ($ratingValue > 0)
                                                @for ($i = 0; $i < $ratingValue; $i++)
                                                    <i class="icon-star3"></i>
                                                @endfor
                                                @php
                                                    $emptyValue = 5 - $ratingValue;
                                                @endphp
                                                @for ($i = 0; $i < $emptyValue; $i++)
                                                    <i class="icon-star-empty"></i>
                                                @endfor
                                            @else
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                            @endif
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




    @include('client.component.Modal')



@endsection


@section('script')
    @include('client.component.Scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        const facebookBtn = document.querySelector(".facebook-btn");
        const twitterBtn = document.querySelector(".twitter-btn");
        const pinterestBtn = document.querySelector(".pinterest-btn");
        const linkedinBtn = document.querySelector(".linkedin-btn");
        const whatsappBtn = document.querySelector(".whatsapp-btn");

        function init() {
            const pinterestImg = document.querySelector(".pinterest-img");

            let postUrl = encodeURI(document.location.href);
            let postTitle = encodeURI("Hi everyone, please check this out: ");
            let postImg = encodeURI(pinterestImg.src);

            facebookBtn.setAttribute(
                "href",
                `https://www.facebook.com/sharer.php?u=${postUrl}`
            );

            twitterBtn.setAttribute(
                "href",
                `https://twitter.com/share?url=${postUrl}&text=${postTitle}`
            );

            pinterestBtn.setAttribute(
                "href",
                `https://pinterest.com/pin/create/bookmarklet/?media=${postImg}&url=${postUrl}&description=${postTitle}`
            );

            linkedinBtn.setAttribute(
                "href",
                `https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`
            );

            whatsappBtn.setAttribute(
                "href",
                `https://wa.me/?text=${postTitle} ${postUrl}`
            );
        }

        init();




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



        $('#cartForm2').on('submit', function(event) {
            event.preventDefault();
            let quantity = $('#quantity').val();
            let product_ids = $('#product_id').val();
            let note1 = $('#note1').val();
            let note2 = $('#note2').val();
            let color = $("input[name=color]").val();
            let meserment = $("input[name=maserment]").val();

            let url = "{{ route('client.addCart') }}";
            axios.post(url, {
                meserment: meserment,
                color: color,
                quantity: quantity,
                product_id: product_ids,
                note2: note2,
                note1: note1,
            }).then(function(response) {

                if (response.status == 200 && response.data == 1) {
                    $('.bd-example-modal-lg').modal('hide');
                    toastr.success('Product Add Successfully', 'Success', {
                        closeButton: true,
                        progressBar: true,
                    });
                    getcartData()
                } else {
                    toastr.error('Product not Added ! Try Again', 'Error', {
                        closeButton: true,
                        progressBar: true,
                    });
                }

            }).catch(function(error) {
                toastr.error('Product not Added  ! Try Again');
            })


        })
    </script>
@endsection
