@extends('client.layouts.app')
@section('css')

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

    .color-choose input[type="radio"] + label span {
      display: inline-block;
      width: 40px;
      height: 40px;
      margin: -1px 4px 0 0;
      vertical-align: middle;
      cursor: pointer;
      border-radius: 50%;
    }

    .color-choose input[type="radio"] + label span {
      border: 2px solid #FFFFFF;
      box-shadow: 0 1px 3px 0 rgba(0,0,0,0.33);
    }



    .color-choose input[type="radio"]:checked + label span {
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

    .meserment-choose input[type="radio"] + label span {
      display: inline-block;
      width: 30px;
      height: 30px;
      margin: -1px 4px 0 0;
      vertical-align: middle;
      cursor: pointer;
      border-radius: 50%;
    }

    .meserment-choose input[type="radio"] + label span {
      border: 2px solid #FFFFFF;
      box-shadow: 0 1px 3px 0 rgba(0,0,0,0.33);
    }



    .meserment-choose input[type="radio"]:checked + label span {
      background-image: url(/client/img/check-icn.svg);
     background-size: 15px;
      background-repeat: no-repeat;
      background-position: center;
    }




    </style>

@endsection
@section('content')
    <!-- catg header banner section -->
   @include('client.components.hero')
    <!-- / catg header banner section -->

    <!-- product category -->
    <section id="aa-product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-product-details-area">



                        <div class="aa-product-details-content">
                            <div class="row">
                                <!-- Modal view slider -->
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="aa-product-view-slider">
                                        <div id="demo-1" class="simpleLens-gallery-container">

                                            <div class="simpleLens-container">
                                                <div class="simpleLens-big-image-container">
                                                    @foreach ($productDetails->img as $images)
                                                        @if ($loop->first)

                                                            <a data-lens-image="{{ $images->image_path }}"
                                                                class="simpleLens-lens-image"><img
                                                                    src="{{ $images->image_path }}"
                                                                    class="simpleLens-big-image">
                                                            </a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="simpleLens-thumbnails-container">
                                                @foreach ($productDetails->img as $images)
                                                    <a data-big-image="{{ $images->image_path }}"
                                                        data-lens-image="{{ $images->image_path }}"
                                                        class="simpleLens-thumbnail-wrapper" href="#">
                                                        <img width="50px" height="50px" src="{{ $images->image_path }}">
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal view content -->
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="aa-product-view-content">
                                        <h3>{!! $productDetails->product_title !!}</h3>
                                        <div class="aa-price-block">
                                            <span class="aa-product-view-price">&euro; &nbsp;{{ $productDetails->product_price }}</span>
                                            <p class="aa-product-avilability">Avilability: <span>
                                                    @if ($productDetails->product_in_stock == 1)
                                                        {{ 'In Stock' }}
                                                    @else
                                                        {{ 'Stock Out' }}
                                                    @endif
                                                </span></p>
                                        </div>
                                        <p> {!! nl2br(e( $productDetails->product_discription)) !!}</p>


                         <form action="{{ route('client.addCart') }}" id="cartForm" method="post">


                                   @if(count($productDetails->color)>0)
                                        <!-- Product Color -->
                                        <div class="product-color">
                                            <span >Color</span>

                                            <div class="color-choose mt-5">
                                                @foreach ($productDetails->color as $color)
                                                <div>
                                                    <input type="radio" id="{{$color->product_color_code}}" name="color" @if($loop->first){{"checked"}} @endif value="{{$color->product_color_code}}" >
                                                    <label for="{{$color->product_color_code}}"><span  style="background-color:{{$color->product_color_code}} "></span></label>
                                                </div>
                                                @endforeach


                                        </div>
                                    @endif

                                    <!-- Cable Configuration -->
                                    @if(count($productDetails->maserment)>0)
                                    <div class="product-color">
                                        <span >Mezerment</span>

                                        <div class="meserment-choose mt-5">
                                            @foreach ($productDetails->maserment as $maserment)
                                            <div>
                                                <input type="radio" id="{{$maserment->meserment_value}}" name="maserment" @if($loop->first){{"checked"}} @endif value="{{$maserment->meserment_value}}" >
                                                <label for="{{$maserment->meserment_value}}"><span style="background-color:#000;"></span></label>
                                                <span >{{$maserment->meserment_value}}</span>&ensp;
                                            </div>
                                            @endforeach
                                    </div>
                                    @endif

                                        <div class="aa-prod-quantity">
                                            <label for="quantity">Quantity:&ensp;</label>
                                                <select id="quantity" name="quantity">
                                                    <option value="1" selected>1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                </select>

                                            <p class="aa-prod-category">
                                                Category: <a href="#">{{ $productDetails->cat->name }}</a>
                                            </p>
                                        </div>
                                        <div class="aa-prod-view-bottom">
                                        <form action="{{ route('client.addCart') }}" id="cartForm"
                                            method="post">
                                            @csrf
                                            <input type="hidden" id="product_id" name="product_id"
                                                value="{{ $productDetails->id }}">
                                            <button type="submit" class="aa-add-to-cart-btn">Add To Cart</button>




                        </form>


                                            {{-- <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                                            <a class="aa-add-to-cart-btn" href="#">Compare</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="aa-product-details-bottom">
                            <ul class="nav nav-tabs" id="myTab2">
                                <li><a href="#description" data-toggle="tab">Description</a></li>
                                <li><a href="#review" data-toggle="tab">Reviews</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="description">
                                    <p>

                                        {!! $productDetails->product_discription !!}
                                    </p>
                                </div>
                                <div class="tab-pane fade " id="review">
                                    <div class="aa-product-review-area">
                                        <h4>2 Reviews for T-Shirt</h4>
                                        <ul class="aa-review-nav">
                                            <li>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object"
                                                                src="{{ asset('client') }}/img/testimonial-img-3.jpg"
                                                                alt="girl image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March
                                                                26, 2016</span></h4>
                                                        <div class="aa-product-rating">
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star-o"></span>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object"
                                                                src="{{ asset('client') }}/img/testimonial-img-3.jpg"
                                                                alt="girl image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March
                                                                26, 2016</span></h4>
                                                        <div class="aa-product-rating">
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star-o"></span>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <h4>Add a review</h4>
                                        <div class="aa-your-rating">
                                            <p>Your Rating</p>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </div>
                                        <!-- review form -->
                                        <form action="" class="aa-review-form">
                                            <div class="form-group">
                                                <label for="message">Your Review</label>
                                                <textarea class="form-control" rows="3" id="message"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="example@gmail.com">
                                            </div>

                                            <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Related product -->
                        <div class="aa-product-related-item">
                            <h3>Related Products</h3>


                            <ul class="aa-product-catg aa-related-item-slider">
                                <!-- start single product item -->
                                @php
                                $relProducts=App\Models\product_table::with('img')->where('product_category_id',
                                $productDetails->product_category_id)->where('product_active',
                                1)->take(12)->inRandomOrder()->get();
                                @endphp

                                @foreach ($relProducts as $relProduct)
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="{{ route('client.showProductDetails', ['slug' => $relProduct->product_slug]) }}">

                                                @php  $i= 1; @endphp

                                            @foreach ($relProduct->img as $images)
                                               @if ($i > 0)

                                               <img src="{{$images->image_path}}" alt="polo shirt img" width="250px" height="300px">

                                               @endif
                                               @php $i--; @endphp
                                            @endforeach


                                            </a>

                                        <a  class="aa-add-card-btn"  onclick="productDetailsModal({{ $relProduct->id }})"
                                            href="" data-toggle2="tooltip" data-placement="top"
                                           data-toggle="modal" data-target="#quick-view-modal"><span
                                                        class="fa fa-shopping-cart" id="CartAddConfirmBtn"></span>Add To
                                                    Cart</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a
                                                        href="{{ route('client.showProductDetails', ['slug' => $relProduct->product_slug]) }}">{!!
                                                        $relProduct->product_title !!}</a></h4>
                                                <span class="aa-product-price">&euro; &nbsp;{{ $relProduct->product_price }}</span><span
                                                    class="aa-product-price"><del>&euro; &nbsp;{{ $relProduct->product_selling_price }}</del></span>
                                            </figcaption>
                                        </figure>
                                        <div class="aa-product-hvr-content">
                                            {{-- <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span
                                                    class="fa fa-exchange"></span></a> --}}
                                                    <a onclick="productDetailsModal({{ $relProduct->id }})"
                                                        data-toggle2="tooltip" data-placement="top"
                                                        title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span
                                                            class="fa fa-search"></span></a>
                                        </div>
                                        <!-- product badge -->
                                        @if ($relProduct->product_in_stock)
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
                                                                    <a class="simpleLens-lens-image" id="simpleLensImage"
                                                                        data-lens-image="">
                                                                        <img src=""
                                                                            class="simpleLens-big-image" id="simpleLensBigImage">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="simpleLens-thumbnails-container">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal view content -->
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="aa-product-view-content">
                                                        <h3 id="pdTitle"></h3>
                                                        <div class="aa-price-block">
                                                            <span id="pdPrice" class="aa-product-view-price"></span>
                                                            <p class="aa-product-avilability">Avilability: <span
                                                                    id="inStock"></span></p>
                                                        </div>

                                                        <!-- Cable Configuration -->
                                            <form action="{{ route('client.addCart') }}" id="cartForm" method="post">
                                                @csrf
                                                        <div class="product-color">
                                                            <span>Mezerment:</span>
                                                            <div class="meserment-choose mt-5">

                                                            </div>
                                                        </div>

                                                        <div class="product-color">
                                                            <span >Color</span>

                                                            <div class="color-choose mt-5">



                                                                </div>



                                                        </div>

                                                        <div class="aa-prod-quantity">

                                                                <select name="quantity" id="quantity">
                                                                    <option value="1" selected>1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="10">10</option>
                                                                </select>

                                                            <p class="aa-prod-category">
                                                                Category: <a href="#" id="pdCategory"></a>
                                                            </p>
                                                        </div>
                                                        <div class="aa-prod-view-bottom">
                                                <input type="hidden" id="product_ids" name="product_id" value="" >
                                                <button type="submit" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</button>


                                                <a href="" id="modalSingleView" class="aa-add-to-cart-btn">View Details</a>
                                                        </div>
                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            <!-- / quick view modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / product category -->

@endsection

@section('script')

    <script>
        //each Slider  Details data show for edit
        function productDetailsModal(id) {

            axios.post('{{ route('client.getsingleProductdata') }}', {
                        id: id
                    })
                .then(function(response) {
                    if (response.status == 200) {
                        var jsonData = response.data;





                        var simpleLensImageUrl = jsonData[0].img[0].image_path;


                        var inStock = '';
                        if (jsonData[0].product_in_stock == 0) {
                            inStock = "STOCK OUT!"
                        } else {
                            inStock = "SALE!"
                        }

                        $('#pdTitle').html(jsonData[0].product_title);
                        $('#pdPrice').html("&euro; " + jsonData[0].product_selling_price);
                        $('#inStock').html(inStock);
                        $('#pdCategory').html(jsonData[0].cat.name);
                        $('#product_ids').val(id);
                        $('#simpleLensImage').attr("data-lens-image" , simpleLensImageUrl );
                        $('#simpleLensBigImage').attr("src" , simpleLensImageUrl );




                        var maserment="";
                        for (let index = 0; index < jsonData[0].maserment.length; index++) {
                            const element =  jsonData[0].maserment[index];
                            checked=""
                            if (index==0) {
                                checked="checked"
                            }else{
                                checked=""
                            }

                            maserment+='<div>';
                            maserment+='<input type="radio" id="'+element.meserment_value+'" name="maserment" '+checked+' value="'+element.meserment_value+'">';
                            maserment+='<label for="'+element.meserment_value+'"><span style="background-color:#000;"></span></label>';
                            maserment+='<span>'+element.meserment_value+'</span>&nbsp;';
                            maserment+='</div>';

                        }

                        $('.meserment-choose').html(maserment);




                        var color="";
                        for (let index = 0; index < jsonData[0].color.length; index++) {
                            const elementColor =  jsonData[0].color[index];

                            colorChecked=""
                            if (index==0) {
                                colorChecked="checked"
                            }else{
                                colorChecked=""
                            }
                            color+='<div>';
                            color+='<input type="radio" id="'+elementColor.product_color_code+'" name="color" '+colorChecked+' value="'+elementColor.product_color_code+'">';
                            color+='<label for="'+elementColor.product_color_code+'"><span style="background-color:'+elementColor.product_color_code+';"></span></label>';
                            color+='</div>';

                        }

                        $('.color-choose').html(color);

                        var img="";
                        for (let i = 0; i < jsonData[0].img.length; i++) {
                            const elementImg =  jsonData[0].img[i];

                            img+='<a  href="'+elementImg.image_path+'" class="simpleLens-thumbnail-wrapper"  data-lens-image="'+elementImg.image_path+'"  data-big-image="'+elementImg.image_path+'" ><img width="50px" height="50px" src="'+elementImg.image_path+'"></a>';

                        }
                        $('.simpleLens-thumbnails-container').html(img);




                        var SingleUrl= document.location.href("{{ route('client.getsingleProductdata') }}?slug="+jsonData[0].product_slug);
                        
                        $('#modalSingleView').attr("href" , SingleUrl );


                    } else {

                    }
                }).catch(function(error) {

                });
        }

    </script>

@endsection
