@extends('client.layouts.app')
@section('title', 'Search')
@section('css')
    @include('client.component.Style')

@endsection
@section('content')
    <!-- Page Title  ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Search Page</h1>
            {{-- <span>Start Buying your Favourite Theme</span> --}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('client.home')}}">Home</a></li>
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

                                            @php
                                                $imageOne=$searchProduct->img[0]->image_path?? '';
                                                $imageTwo=$searchProduct->img[1]->image_path?? $searchProduct->img[0]->image_path;
                                                
                                            @endphp

                                            <a href="{{ route('client.showProductDetails', ['slug' => $searchProduct->slug]) }}">
                                                <img src="{{ $imageOne }}" alt="" />
                                                  <img class="hoverimage" src="{{ $imageTwo }}" alt="" />
                                               
                                                  @if ($searchProduct->category->slug === "customized-jewelry")
                                                  <div class="sale-flash badge badge-primary p-2">Pre Order</div>
                                                  @elseif($searchProduct->stock > 0)
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
                                                                            })" class="btn btn-dark"><i class="icon-heart3"></i> <span> ({{ $searchProduct->favorite_to_users->count() }})</span>
                                                                        </a>
                                                                    @else
                                                                        <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $searchProduct->id }}').submit();"
                                                                            class="{{ !Auth::user()->favorite_product->where('pivot.product_id',$searchProduct->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="icon-heart3"></i><span class="text-dark">(<span class="favorite_posts">{{ $searchProduct->favorite_to_users->count() }}</span>)</span>
                                                                        </a>

                                                                        <form id="favorite-form-{{ $searchProduct->id }}" method="POST" action="{{ route('client.favorite',$searchProduct->id) }}" style="display: none;">
                                                                            @csrf
                                                                        </form>
                                                                    @endguest
                                                        </div>
                                                        <div class="buttonaction right">
                                                                    <a href="{{  $imageTwo }}" class="btn btn-dark" data-toggle="modal"
                                                                        data-target=".bd-example-modal-lg"
                                                                        onclick="productDetailsModal({{ $searchProduct->id }})"><i
                                                                            class="icon-line-expand"></i>
                                                                    </a>
                                                                
                                                        </div>
                                                            
                                                </div>
                                              
                                            </a>
                                            
                                           
                                        </div>
                                            <div class="product-desc">
                                                <div class="product-title">
                                                    <h3><a
                                                            href="{{ route('client.showProductDetails', ['slug' => $searchProduct->slug]) }}">{{ $searchProduct->name }}</a>
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
                                        @foreach (App\Models\Category::orderby('name', 'asc')->where('parent_id', null)->get()
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
                                                                            href="{{ route('client.showProductDetails', ['slug' => $topRatedProduct->slug]) }}"><img
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
                                                                        href="{{ route('client.showProductDetails', ['slug' => $topRatedProduct->slug]) }}">{{ $topRatedProduct->name }}</a>
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
@include('client.component.Scripts')

@endsection
