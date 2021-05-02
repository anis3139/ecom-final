@extends('client.layouts.app')

@section('content')
    <!-- Page Title
                                                          ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1> All Product under  <a href="{{ route('client.category', $category->slug) }}" class="text-primary"> {{ $category->name }}</a> Category</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('client.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                   {{ $category->name }}
                </li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
                                                          ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row gutter-40 col-mb-80">
                    <!-- Post Content
                                                              ============================================= -->
                    <div class="postcontent col-lg-9 order-lg-last">

                        <!-- Shop
                                                               ============================================= -->
                        <div id="shop" class="shop row grid-container gutter-20" data-layout="fitRows">


                            @foreach ($allProducts as $allProduct)
                                <div class="product col-md-4 col-sm-6 col-12">
                                    <div class="grid-inner">
                                        <div class="product-image">
                                            @php $i= 2; @endphp
                                            @foreach ($allProduct->img as $images)
                                                @if ($i > 0)
                                                    <a
                                                        href="{{ route('client.showProductDetails', ['slug' => $allProduct->product_slug]) }}"><img
                                                            src="{{ $images->image_path }}" alt="Checked Short Dress"></a>
                                                @endif
                                                @php $i--; @endphp
                                            @endforeach



                                            @if ($allProduct->product_in_stock)
                                                <div class="sale-flash badge badge-secondary p-2">Sell!</div>
                                            @else
                                                <div class="sale-flash badge badge-secondary p-2">Out of Stock</div>
                                            @endif

                                            <div class="bg-overlay">
                                                <div class="bg-overlay-content align-items-end justify-content-between"
                                                    data-hover-animate="fadeIn" data-hover-speed="400">
                                                    <a href="#" class="btn btn-dark mr-2" data-toggle="modal"
                                                        data-target=".bd-example-modal-lg"
                                                        onclick="productDetailsModal({{ $allProduct->id }})"><i
                                                            class="icon-shopping-cart"></i></a>
                                                    <a href="" class="btn btn-dark" data-toggle="modal"
                                                        data-target=".bd-example-modal-lg"
                                                        onclick="productDetailsModal({{ $allProduct->id }})"><i
                                                            class="icon-line-expand"></i></a>
                                                </div>
                                                <div class="bg-overlay-bg bg-transparent"></div>
                                            </div>
                                        </div>
                                        <div class="product-desc">
                                            <div class="product-title">
                                                <h3><a
                                                        href="{{ route('client.showProductDetails', ['slug' => $allProduct->product_slug]) }}">{{ $allProduct->product_title }}</a>
                                                </h3>
                                            </div>
                                            <div class="product-price">
                                                @if ($allProduct->product_price != $allProduct->product_selling_price)
                                                    <del>&#2547;
                                                        {{ $allProduct->product_selling_price }}</del>
                                                @endif<ins>&#2547;
                                                    {{ $allProduct->product_price }}</ins>
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


                        </div><!-- #shop end -->
                        <div class="d-block m-5">

                            {{ $allProducts->links('vendor.pagination.simple-bootstrap-4') }}

                        </div>
                    </div><!-- .postcontent end -->

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

                            <div class="widget clearfix">

                                <h4>Recent Items</h4>
                                <div class="posts-sm row col-mb-30" id="recent-shop-list-sidebar">

                                    @foreach ($recentProducts as $recentProduct)


                                        <div class="entry col-12">
                                            <div class="grid-inner row no-gutters">
                                                <div class="col-auto">
                                                    <div class="entry-image">
                                                        @php $i= 1; @endphp
                                                        @foreach ($recentProduct->img as $images)
                                                            @if ($i > 0)
                                                                <a class="aa-cartbox-img"
                                                                    href="{{ route('client.showProductDetails', ['slug' => $recentProduct->product_slug]) }}"><img
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
                                                        <h4><a href="{{ route('client.showProductDetails', ['slug' => $recentProduct->product_slug]) }}">{{ $recentProduct->product_title }}</a></h4>
                                                    </div>
                                                    <div class="entry-meta no-separator">
                                                        <ul>
                                                            <li class="color">&#2547; {{ $recentProduct->product_price }}
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

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
    </section><!-- #content end -->


















    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="single-product shop-quick-view-ajax">
                    <div class="ajax-modal-title text-center w-100">
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
                                        <span class="posted_in">Category: <a href="#" rel="tag" id="pdCategory"></a> &nbsp; &nbsp;  <a href="" id="modalSingleView" class="add-to-cart button m-0">View Details</a></span>
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
        function productDetailsModal(id) {

            let url = "{{ route('client.getsingleProductdata') }}";
            axios.post(url, {
                    id: id
                })
                .then(function(response) {
                    console.log(response.data);
                    if (response.status == 200) {
                        var jsonData = response.data;

                          let domain=window.location.origin
                        var url = `${domain}/product/${jsonData[0].product_slug}`;



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
                    toastr.success('Product Add Successfully');
                    getcartData()
                } else {
                    toastr.error('Product not Added ! Try Again');
                }

            }).catch(function(error) {
                toastr.error('Product not Added  ! Something Error');
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

    </script>
@endsection
