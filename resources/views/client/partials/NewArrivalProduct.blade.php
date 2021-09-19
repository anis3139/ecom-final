@foreach ($categories as $catItem)

    <div class="container clearfix">

        <div class="fancy-title title-border topmargin-sm mb-4 title-center">
            <h4>New Arrivals: {{ $catItem->name }}</h4>
        </div>

        <div class="row grid-6">
            @php
                $products = App\Models\Product::with(['img'])
                    ->where('category_id', $catItem->id)
                    ->where('status', 1)
                    ->where('deleted_at', null)
                    ->take(8)
                    ->get();

            @endphp

            @foreach ($products as $product)

                <div class="col-lg-2 col-md-3 col-6 px-2">
                    <div class="product">
                        <div class="product-image">

                            @php
                                $imageOne=$product->img[0]->image_path??'';
                                $imageTwo=$product->img[1]->image_path?? $product->img[0]->image_path;
                                
                            @endphp

                            <a href="{{ route('client.showProductDetails', ['slug' => $product->slug]) }}">
                                <img src="{{ $imageOne }}" alt="" />
                                  <img class="hoverimage" src="{{ $imageTwo }}" alt="" />
                               
                                  @if ($product->category->slug === "customized-jewelry")
                                  <div class="sale-flash badge badge-primary p-2">Pre Order</div>
                                  @elseif($product->stock > 0)
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
                                                            })" class="btn btn-dark"><i class="icon-heart3"></i> <span> ({{ $product->favorite_to_users->count() }})</span>
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $product->id }}').submit();"
                                                            class="{{ !Auth::user()->favorite_product->where('pivot.product_id',$product->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="icon-heart3"></i><span class="text-dark">(<span class="favorite_posts">{{ $product->favorite_to_users->count() }}</span>)</span>
                                                        </a>

                                                        <form id="favorite-form-{{ $product->id }}" method="POST" action="{{ route('client.favorite',$product->id) }}" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    @endguest
                                        </div>
                                        <div class="buttonaction right">
                                                    <a href="{{  $imageTwo }}" class="btn btn-dark" data-toggle="modal"
                                                        data-target=".bd-example-modal-lg"
                                                        onclick="productDetailsModal({{ $product->id }})"><i
                                                            class="icon-line-expand"></i>
                                                    </a>
                                                
                                        </div>
                                            
                                </div>
                              
                            </a>
                            
                           
                        </div>
                        <div class="product-desc">
                            <div class="product-title mb-1">
                                <h3><a
                                        href="{{ route('client.showProductDetails', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                                </h3>
                            </div>
                            <div class="product-price font-primary">
                                @if ($product->product_price != $product->product_selling_price)
                                    <del class="mr-1">&#2547; {{ $product->product_price }}</del>@endif <ins>&#2547; {{ $product->product_selling_price }}</ins>
                            </div>
                            <div class="product-rating">
                                @php
                        $arr = $product->rating;
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
@endforeach
