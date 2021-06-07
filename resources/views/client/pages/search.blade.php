@extends('client.layouts.app')
@section('title', 'Search')
@section('content')
    <!-- Page Title  ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Search Page</h1>
            <span>Start Buying your Favourite Theme</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Search</li>
            </ol>
        </div>

    </section>
    <!-- #page-title end -->


    <!-- Content============================================= -->
    @if ($searchProducts->count() == 0)

        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h1 class="mt-5"> You Search for: <span class="text-danger">{{ $key }}</span> </h1>
                    <h2 class="m-3">No products found which match your selection</h2>
                </div>
            </div>
        </div>




    @else

        <section id="content">
            <div class="content-wrap">
                <h1 class="pb-3 text-center"> You Search for: <span class="text-danger">{{ $key }}</span> </h1>
                <div class="container clearfix">

                    <div class="row gutter-40 col-mb-80">
                        <!-- Post Content
                                                                                                                                                                                  ============================================= -->
                        <div class="postcontent col-lg-9 order-lg-last">

                            <!-- Shop
                                                                                                                                                                                   ============================================= -->
                            <div id="shop" class="shop row grid-container gutter-20" data-layout="fitRows">


                                @foreach ($searchProducts as $searchProduct)
                                    <div class="product col-md-4 col-sm-6 col-12">
                                        <div class="grid-inner">
                                            <div class="product-image">
                                                @php $i= 2; @endphp
                                                @foreach ($searchProduct->img as $images)
                                                    @if ($i > 0)
                                                        <a
                                                            href="{{ route('client.showProductDetails', ['slug' => $searchProduct->product_slug]) }}"><img
                                                                src="{{ $images->image_path }}"
                                                                alt="Checked Short Dress"></a>
                                                    @endif
                                                    @php $i--; @endphp
                                                @endforeach



                                                @if ($searchProduct->product_in_stock)
                                                    <div class="sale-flash badge badge-secondary p-2">Sell!</div>
                                                @else
                                                    <div class="sale-flash badge badge-secondary p-2">Out of Stock</div>
                                                @endif

                                                <div class="bg-overlay">
                                                    <div class="bg-overlay-content align-items-end justify-content-between"
                                                        data-hover-animate="fadeIn" data-hover-speed="400">
                                                        @guest
                                                        <a href="javascript:void(0);" onclick="toastr.info('To add Favorite List. You need to login first.','Info',{
                                                           closeButton: true,
                                                           progressBar: true,
                                                       })" class="btn btn-dark mr-2"><i class="icon-heart3"></i> <span> ({{ $searchProduct->favorite_to_users->count() }})</span></a>
                                                    @else
                                                        <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $searchProduct->id }}').submit();"
                                                           class="{{ !Auth::user()->favorite_product->where('pivot.product_id',$searchProduct->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="icon-heart3"></i><span class="text-dark">(<span class="favorite_posts">{{ $searchProduct->favorite_to_users->count() }}</span>)</span></a>

                                                        <form id="favorite-form-{{ $searchProduct->id }}" method="POST" action="{{ route('client.favorite',$searchProduct->id) }}" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    @endguest
                                                        <a href="" class="btn btn-dark" data-toggle="modal"
                                                            data-target=".bd-example-modal-lg"
                                                            onclick="productDetailsModal({{ $searchProduct->id }})"><i
                                                                class="icon-line-expand"></i></a>
                                                    </div>
                                                    <div class="bg-overlay-bg bg-transparent"></div>
                                                </div>
                                            </div>
                                            <div class="product-desc">
                                                <div class="product-title">
                                                    <h3><a
                                                            href="{{ route('client.showProductDetails', ['slug' => $searchProduct->product_slug]) }}">{{ $searchProduct->product_title }}</a>
                                                    </h3>
                                                </div>
                                                <div class="product-price">
                                                    @if ($searchProduct->product_price != $searchProduct->product_selling_price)
                                                        <del>&#2547;
                                                            {{ $searchProduct->product_selling_price }}</del>
                                                    @endif<ins>&#2547;
                                                        {{ $searchProduct->product_price }}</ins>
                                                </div>
                                                <div class="product-rating">
                                                    @php
                                                        $arr = $searchProduct->rating;
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
                            <div class="d-block m-5">

                                {{ $searchProducts->links('vendor.pagination.simple-bootstrap-4') }}

                            </div>

                            <!-- #shop end -->

                        </div>



                        <!-- .postcontent end -->

                        <!-- Sidebar
                                                                                                                                                                                  ============================================= -->
                        <div class="sidebar col-lg-3">
                            <div class="sidebar-widgets-wrap">

                                <div class="widget widget_links clearfix">

                                    <h4>Shop Categories</h4>
                                    <ul>
                                        @foreach (App\Models\ProductsCategoryModel::orderby('name', 'asc')->where('parent_id', 0)->get()
        as $parentCat)
                                            <li><a
                                                    href="{{ route('client.category', $parentCat->slug) }}">{{ $parentCat->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>



                                @if ($topRatedProducts)


                                    <div class="widget clearfix">

                                        <h4>Top Rated Items</h4>
                                        <div class="posts-sm row col-mb-30" id="popular-shop-list-sidebar">
                                            @foreach ($topRatedProducts as $topRatedProduct)
                                                <div class="entry col-12">
                                                    <div class="grid-inner row no-gutters">
                                                        <div class="col-auto">
                                                            <div class="entry-image">


                                                                @php $i= 1; @endphp
                                                                @foreach ($topRatedProduct->img as $images)
                                                                    @if ($i > 0)
                                                                        <a class="aa-cartbox-img"
                                                                            href="{{ route('client.showProductDetails', ['slug' => $topRatedProduct->product_slug]) }}"><img
                                                                                src="{{ $images->image_path }}"
                                                                                alt="polo shirt img" width="100%"
                                                                                height="300px"></a>
                                                                    @endif
                                                                    @php $i--; @endphp
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col pl-3">
                                                            <div class="entry-title">
                                                                <h4><a
                                                                        href="{{ route('client.showProductDetails', ['slug' => $topRatedProduct->product_slug]) }}">{{ $topRatedProduct->product_title }}</a>
                                                                </h4>
                                                            </div>
                                                            <div class="entry-meta no-separator">
                                                                <ul>
                                                                    <li class="color"> &#2547;
                                                                        {{ $topRatedProduct->product_price }}</li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                @endif





                            </div>
                        </div><!-- .sidebar end -->
                    </div>

                </div>
            </div>
        </section>

    @endif

    <!-- #content end -->







    @include('client.component.Modal')
@endsection

@section('script')
    <script>
        function productDetailsModal(id) {

            let url = "{{ route('client.getsingleProductdata') }}";
            axios.post(url, {
                    id: id
                })
                .then(function(response) {
                    console.log(response.data);
                    if (response.status == 200) {
                        var jsonData = response.data;

                        let domain = window.location.origin
                        var url = `${domain}/product/${jsonData[0].product_slug}`;

                        let imgSingle = jsonData[0].img[0].image_path

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
                        $('#modalSingleImage').attr("src", imgSingle);



                        // var imageDiv = "";
                        // for (let index = 0; index < jsonData[0].img.length; index++) {
                        //     const element = jsonData[0].img[index];
                        //     imageDiv += '<div  class="slide">';
                        //     imageDiv += '<a href="#" title="Pink Printed Dress - Front View">';
                        //     imageDiv += '<img src="' + element.image_path + '" alt="Pink Printed Dress">';
                        //     imageDiv += '</a>';
                        //     imageDiv += '</div>';

                        // }

                        // $('.slider-wrap').html(imageDiv);

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













        // Add to cart


        $('#cartForm').on('submit', function(event) {
            event.preventDefault();
            let formData = $(this).serializeArray();
            let meserment = formData[0]['value'];
            let color = formData[1]['value'];
            let quantity = formData[2]['value'];
            let product_ids = formData[3]['value'];
            console.log(formData);
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
                         toastr.success('Product Add Successfully', 'Success',{
            closeButton: true,
            progressBar: true,
        });
                    getcartData()
                } else {
                    toastr.error('Product not Added ! Try Again', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                }

            }).catch(function(error) {
                toastr.error('Product not Added  ! Something Error', 'Error',{
            closeButton: true,
            progressBar: true,
        });
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
                        var tp = parseFloat(dataJSON.total).toFixed(2);
                        $("#total_cart_price").html(' &#2547; ' + tp);

                        var imageViewHtml = "";
                        $.each(cartData, function(i, item) {
                            imageViewHtml +=
                                `<div class="top-cart-item">
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
                        toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                    }
                }).catch(function(error) {

                    toastr.error('Something Went Wrong...', 'Error',{
            closeButton: true,
            progressBar: true,
        });
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
                        toastr.success('Cart Removed Success.', 'Success',{
            closeButton: true,
            progressBar: true,
        });
                        getcartData();
                    } else {
                        toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                    }
                }).catch(function(error) {

                    toastr.error('Something Went Wrong......', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                });
        }

    </script>
@endsection
