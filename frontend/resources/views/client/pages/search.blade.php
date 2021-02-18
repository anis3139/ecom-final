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



    <!-- product category -->
    <section id="aa-product-category">
        <div class="container">
            <div class="row">
                @if($searchProducts->count() == 0)
                <div  style="margin:30px 0px 10px 0px; text-align:center;">
                    <h2 style="background-color:#ebd4d4; padding:20px; color:#000 ">You Search for: <span style="color:#FF6666">{{$key}}</span></h2>
                    <h2 style="margin-top: 20px; color:#000">No products found which match your selection</h2>
                    <h3 style="margin-top: 20px; color:#000">Retarn  <a style="color:#FF6666" href="{{route('client.shop')}}">Shop Page</a></h3>
                </div>
                @else
                <div  style="margin:30px 0px 10px 0px; text-align:center;">
                    <h2 style="background-color:#ebd4d4; padding:20px; color:#000 ">You Search for: <span style="color:#FF6666">{{$key}}</span></h2>

                </div>
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
                                @foreach ($searchProducts as $searchProduct)
                                    <li>
                                        <figure>

                                            @php $i= 1; @endphp
                                            @foreach ($searchProduct->img as $images)
                                                @if ($i > 0)

                                                    <a class="aa-product-img"
                                                        href="{{ route('client.showProductDetails', ['slug' => $searchProduct->product_slug]) }}"><img
                                                            src="{{ $images->image_path }}" alt="polo shirt img"
                                                            width="100%" height="300px"
                                                            style="background-position: center; background-repeat: no-repeat;background-size: cover;"></a>

                                                @endif
                                                @php $i--; @endphp
                                            @endforeach



                                        <a  class="aa-add-card-btn"  onclick="productDetailsModal({{ $searchProduct->id }})"
                                            href="{{ $searchProduct->id }}" data-toggle2="tooltip" data-placement="top"
                                           data-toggle="modal" data-target="#quick-view-modal"><span
                                                        class="fa fa-shopping-cart" id="CartAddConfirmBtn"></span>Add To
                                                    Cart</a>



                                            <figcaption>
                                                <h4 class="aa-product-title"><a
                                                        href="{{ route('client.showProductDetails', ['slug' => $searchProduct->product_slug]) }}">{{ $searchProduct->product_title }}</a>
                                                </h4>
                                                <span class="aa-product-price">&#2547;  
                                                    &nbsp;{{ $searchProduct->product_selling_price }}</span><span
                                                    class="aa-product-price"><del>&#2547;  
                                                        &nbsp;{{ $searchProduct->product_price}}</del></span>
                                                <p class="aa-product-descrip">{!! nl2br(e($searchProduct->product_discription))
                                                    !!}</p>
                                            </figcaption>
                                        </figure>
                                        <div class="aa-product-hvr-content">
                                            {{-- <a href="#" data-toggle="tooltip" data-placement="top"
                                                title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span
                                                    class="fa fa-exchange"></span></a> --}}
                                            <a onclick="productDetailsModal({{ $searchProduct->id }})"
                                                href="{{ $searchProduct->id }}" data-toggle2="tooltip" data-placement="top"
                                                title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span
                                                    class="fa fa-search"></span></a>
                                        </div>
                                        <!-- product badge -->
                                        @if ($searchProduct->product_in_stock)
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
                                                <button type="submit" class="aa-add-to-cart-btn" ><span class="fa fa-shopping-cart"></span>Add To Cart</button>


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
                        <div class="aa-product-catg-pagination">
                            {{ $searchProducts->links() }}
                        </div>
                    </div>
                </div>

            @endif
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
                                    <li><a
                                            href="{{ route('client.category', $parentCat->slug) }}">{{ $parentCat->name }}</a>
                                    </li>
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
                        <div class="aa-sidebar-widget">
                            <h3>Popular Product</h3>
                            <div class="aa-recently-views">
                                <ul>
                                    @foreach ($popular_products as $popular_product)
                                    @if($popular_product->product && $popular_product->product->product_active==1)
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
                                                <p>1 x &#2547;  {{ $popular_product->product->product_selling_price }}
                                                </p>
                                            </div>
                                        </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
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
                                                <h4><a
                                                        href="{{ route('client.showProductDetails', ['slug' => $topRatedProduct->product_slug]) }}">{{ $topRatedProduct->product_title }}</a>
                                                </h4>
                                                <p>1 x &#2547;  {{ $topRatedProduct->product_price }}</p>
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


                        var url= `product/${jsonData[0].product_slug}`;
                        var simpleLensImageUrl = jsonData[0].img[0].image_path;


                        var inStock = '';
                        if (jsonData[0].product_in_stock == 0) {
                            inStock = "STOCK OUT!"
                        } else {
                            inStock = "SALE!"
                        }

                        $('#pdTitle').html(jsonData[0].product_title);
                        $('#pdPrice').html("&#2547;   " + jsonData[0].product_selling_price);
                        $('#inStock').html(inStock);
                        $('#pdCategory').html(jsonData[0].cat.name);
                        $('#product_ids').val(id);
                        $('#modalSingleView').attr("href" , url );
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


                    } else {

                    }
                }).catch(function(error) {

                });
        }

    </script>

@endsection
