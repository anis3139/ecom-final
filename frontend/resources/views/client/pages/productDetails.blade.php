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
                                            <span class="aa-product-view-price">&#2547;  {{ $productDetails->product_selling_price}}</span>&nbsp; @if($productDetails->product_price!= $productDetails->product_selling_price)<span class="aa-product-view-price"><del> &#2547;   {{ $productDetails->product_price}}</del></span>@endif
                                            
                                            <p class="aa-product-avilability">Avilability: <span>
                                                    @if ($productDetails->product_in_stock == 1)
                                                        {{ 'In Stock' }}
                                                    @else
                                                        {{ 'Stock Out' }}
                                                    @endif
                                                </span></p>
                                        </div>
                                        <p> {!! nl2br(e( $productDetails->product_discription)) !!}</p>


                         <form  id="cartForm2" method="post">


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
                                        <form  id="cartForm"
                                            method="post">
                                           
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
                                        {!! nl2br(e( $productDetails->product_discription)) !!}

                                    </p>
                                </div>
                                <div class="tab-pane fade " id="review">
                                    <div class="aa-product-review-area">
                                        <h4> <span id="reviewCount" style="font-weight:bold; color:red; font-size:30px;"> </span>  Reviews for {!! $productDetails->product_title !!}</h4>
                                        <ul class="aa-review-nav" id="reviewResult" style="max-height: 500px; overflow:scroll; overflow-x:hidden;">


                                        </ul>
                                        @auth
                                        <h4>Add a review</h4>
                                        <div class="aa-your-rating">
                                            <p>Your Rating</p>
                                            <div id="rateYo"></div>
                                        </div>
                                        <!-- review form -->

                                        <form action="" class="aa-review-form"  id="reating">
                                            <div class="form-group">
                                                <label for="message" id="reviewEmpty">Your Review <span style="color:red">*</span></label>
                                                <textarea class="form-control" rows="3" id="massage"  wrap="hard"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                                            <p id="messegeview"></p>
                                        </form>
                                        @endauth
                                        @guest

                                            <h2 style="color: #FF6666; font-weight:bold; text-align:center;">Please <a href="{{ route('client.login') }}" class="text-center text-decoration-none text-primary" >Login</a>  For Reating And Review</h2>

                                        @endguest
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
                                                <span class="aa-product-price">&#2547;  {{ $relProduct->product_price }}</span><span
                                                    class="aa-product-price"><del>&#2547;  {{ $relProduct->product_selling_price }}</del></span>
                                            </figcaption>
                                        </figure>
                                        <div class="aa-product-hvr-content">
                                            {{-- <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span
                                                    class="fa fa-exchange"></span></a> --}}
                                                    <a onclick="productQuickOrder({{ $relProduct->id }})"
                                                        href="{{ $relProduct->id }}" data-toggle2="tooltip" data-placement="top"
                                                         data-toggle="modal" data-target="#quick-order"><span>Quick Order</span></a>
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
                                                         <form  id="cartForm" method="post">
                                                           
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














                               <!-- quick view modal -->
                               <div class="modal fade" id="quick-order" tabindex="-1" role="dialog"
                               aria-labelledby="myModalLabel" aria-hidden="true">
                               <div class="modal-dialog">
                                   <div class="modal-content">
                                       <div class="modal-body">
                                           <button type="button" class="close" data-dismiss="modal"
                                               aria-hidden="true">&times;</button>
                                           <div class="row">
                                             <form id="quick-order-form" method="post">
                    
                                               <!-- Modal view content -->
                                               <div class="col-md-6 col-sm-6 col-xs-12">
                                                   <div class="aa-product-view-content">
                                                      
                                                       <!-- Cable Configuration -->
                                                    <p> Product Name: <span id="pdTitles" style="font-size: 20px;"></span></p>
                                                    <p> Product Price: <span id="pdPricesShow" style="font-size: 20px;"></span></p>

                                                            <input type="hidden" id="pdTitle_order" name="product_titles">
                                                           <div class="product-color">
                                                               <span>Mezerment:</span>
                                                               <div class="meserment-choose mt-5" id="meserment-chooses">
                                                               </div>
                                                           </div>
                                                           <div class="product-color">
                                                               <span>Color</span>
                                                               <div class="color-choose mt-5" id="color-chooses">
                                                               </div>
                                                           </div>

                                                           <div class="aa-prod-quantity">
                                                               <select name="quantity" id="quantitys">
                                                                   <option value="1" selected>1</option>
                                                                   <option value="2">2</option>
                                                                   <option value="3">3</option>
                                                                   <option value="4">4</option>
                                                                   <option value="5">5</option>
                                                                   <option value="10">10</option>
                                                               </select>
                                                           </div>
                                                          
                                                        </div>
                                                    </div>

                                                                               <!-- Modal view slider -->
                                               <div class="col-md-6 col-sm-6 col-xs-12">
                                                   <label for="customer_name">Name:</label>
                                                    <input type="text" class="form-control"name="customer_name" id="customer_name">
                                                    <label for="customer_phone_number">Nobile Number:</label>
                                                    <input type="text" class="form-control" name="customer_phone_number" id="customer_phone_number">
                                                    <div class="aa-prod-view-bottom" style="margin-top: 10px;">
                                                        <input type="hidden" name="pdPrices" id="pdPrices">
                                                           <button type="submit" class="aa-add-to-cart-btn"><span
                                                                   class="fa fa-shopping-cart"></span>Confirm Order</button>
                                                       </div>
                                                </div>

                                                </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
    $(function () {

$("#rateYo").rateYo({
starWidth: "22px",
ratedFill: "#FF6600",
rating:5.00,
halfStar:true,

});

});




$('#reating').submit(function(e){
    e.preventDefault();
    var $rateYo = $("#rateYo").rateYo();
    var rating = $rateYo.rateYo("rating");
    var review= $('#massage').val();
    var product_id=$('#product_id').val();



if(review.length == 0){

    $('#massage').focus();
    var html="";

    html+='<p class="text-capitalize" style="color:red">Please Type Your Review *</p>';

    $('#reviewEmpty').html(html,
        setTimeout(function(){
            $('#reviewEmpty').html("Your Review <span style='color:red'> *</span>");
        },3000)
    );


}else{ axios.post("{{ route('clint.reatingReview' )}}",{
                    rating:rating,
                    review:review,
                    product_id:product_id
                }).then(function(response) {


                    if (response.data) {

                        var html="";

                        html+='<div class="alert alert-success" role="alert"><p class="text-capitalize">Thanks for your rate and review.</p></div>';

                        $('#messegeview').html(html,
                            setTimeout(function(){
                                $('#messegeview').html("");
                            },5000)
                        );

                        $('#reating')[0].reset();
                        getReviewData();

                    } else {
                        html+='<div class="alert alert-danger" role="alert">Incomplete Review</div>';

                        $('#messegeview').html(html,
                            setTimeout(function(){
                                $('#messegeview').html("");
                            },5000)
                        );

                    }
                }).catch(function(error){
                    console.log(error);
                })
}

});


$(document).ready(function(){
getReviewData();
});




function getReviewData() {
     var product_id=$('#product_id').val();
            axios.post("{{route('getproductreating')}}",{
                product_id:product_id
            }).then(function(respones){

                var jsonData=respones.data.review;
                $('#reviewCount').html(jsonData.length);
                var html="";
                for (let rv = 0; rv < jsonData.length; rv++) {
                    const element = jsonData[rv];
                    var date=new Date(element.review_date);
                    var convertedDate=date.toLocaleDateString('es-ES');
                    var reviewData=element.product_review.substring(0,100).replace(/\r?\n/g, '<br />');
                    var userImage=element.image!=null?element.image:window.location.protocol +  "//" + window.document.location.host + "/default-image.png";


                    html+='<li>';
                    html+='<div class="media">';
                    html+='<div class="media-left">';
                    html+='<a href="#"><img class="media-object" src="'+userImage+'" alt="Profile Image" style=" border-radius:50%;"></a>';
                    html+='</div>';
                    html+='<div class="media-body">';
                    html+='<h4 class="media-heading"><strong>'+element.name+'</strong> - <span> '+convertedDate+' </span></h4>';
                    html+='<div class="aa-product-rating'+rv+'" style="padding:0px"> </div>';
                    html+='<p>'+reviewData+'</p>';
                    html+='</div>';
                    html+='</div>';
                    html+='</li>';
                }

                $('#reviewResult').html(html);
                for (let rate = 0; rate < jsonData.length; rate++) {
                    const element2 = jsonData[rate];

                    $(".aa-product-rating"+rate).rateYo({
                        rating: element2.star_reating,
                        readOnly: true,
                        starWidth: "15px"
                    });
                }
            }).catch(function(error){
                console.log(error);
            });
}

        


        $('#cartForm').on('submit',function (event) {
        event.preventDefault();
        let formData=$(this).serializeArray();
        let meserment=formData[0]['value'];
        let color=formData[1]['value'];
        let quantity=formData[2]['value'];
        let product_ids=formData[3]['value'];
            
        let url="{{route('client.addCart')}}";
        axios.post(url,{
            meserment:meserment,
            color:color,
            quantity:quantity,
            product_id:product_ids
        }).then(function (response) {
          console.log(response.data);
           if(response.status==200 && response.data==1){
            $('#quick-view-modal').modal('hide');
            toastr.success('Product Add Successfully');
            getcartData()
}
           else{
               toastr.error('Product not Added ! Try Again');
           }

        }).catch(function (error) {
            toastr.error('Product not Added  ! Try Again');
        })


    })


        $('#cartForm2').on('submit',function (event) {
            
        event.preventDefault();
        let formData=$(this).serializeArray();
        let color=formData[0]['value'];
        let meserment=formData[1]['value'];
        let quantity=formData[2]['value'];
        let product_ids=formData[3]['value'];
            console.log();
        let url="{{route('client.addCart')}}";
        axios.post(url,{
            meserment:meserment,
            color:color,
            quantity:quantity,
            product_id:product_ids
        }).then(function (response) {
          console.log(response.data);
           if(response.status==200 && response.data==1){
            $('#quick-view-modal').modal('hide');
            toastr.success('Product Add Successfully');
            getcartData()
}
           else{
               toastr.error('Product not Added ! Try Again');
           }

        }).catch(function (error) {
            toastr.error('Product not Added  ! Try Again');
        })


    })










        
getcartData()

function getcartData() {

    axios.get("{{ route('client.cartData') }}")
        .then(function(response) {

            if (response.status = 200) {
                var dataJSON = response.data;
                var cartData = dataJSON.cart;

                var a = Object.keys(cartData).length;
               

                $("#cart_quantity").html(a);
                $("#total_cart_price").html(' &#2547; ' + dataJSON.total);
                
                var imageViewHtml = "";
                $.each(cartData, function (i, item) {
                    
                    imageViewHtml += '<li>';
                    imageViewHtml += '<a class="aa-cartbox-img" href="#"><img src=" ' + cartData[i].image +
                        ' " alt="img"></a>';
                    imageViewHtml += '<div class="aa-cartbox-info"> <h4><a href="#">' + cartData[i].title +
                        '</a> </h4> <p>' + cartData[i].quantity + ' x &#2547; ' + cartData[i].unit_price +
                        '</p>  </div>';
                    imageViewHtml += '<div class="aa-remove-product"><button class="cartDeleteIcon" data-id=' +
                        i +
                        '  style=" display:inline-block" type="submit" class="fa fa-times"><i class="fa fa-remove"></i></button> </div>';
                    imageViewHtml += '</li>';
                });


                $('#headerCart').html(imageViewHtml);

                    console.log(a);

                    if (a == 0) {
                            $("#HeaderPreview").css("display", "none");
                        }else{
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
    ;
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













    </script>

@endsection
