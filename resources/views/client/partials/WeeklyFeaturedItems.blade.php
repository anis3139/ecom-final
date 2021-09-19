 <div class="fancy-title title-border mt-4 title-center">
     <h4>Weekly Featured Items</h4>
 </div>

 <div id="oc-products" class="owl-carousel products-carousel carousel-widget" data-margin="20" data-loop="true"
     data-autoplay="5000" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3"
     data-items-lg="4" data-items-xl="5">

     @foreach ($featureProducts as $featureProduct)
         <!-- Shop Item 1 ============================================= -->
         <div class="oc-item">
             <div class="product">
                <div class="product-image">

                    @php
                        $imageOne=$featureProduct->img[0]->image_path??'';
                        $imageTwo=$featureProduct->img[1]->image_path?? $featureProduct->img[0]->image_path;
                        
                    @endphp

                    <a href="{{ route('client.showProductDetails', ['slug' => $featureProduct->slug]) }}">
                        <img src="{{ $imageOne }}" alt="" />
                          <img class="hoverimage" src="{{ $imageTwo }}" alt="" />
                       
                          @if ($featureProduct->category->slug === "customized-jewelry")
                          <div class="sale-flash badge badge-primary p-2">Pre Order</div>
                          @elseif($featureProduct->stock > 0)
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
                                                    })" class="btn btn-dark"><i class="icon-heart3"></i> <span> ({{ $featureProduct->favorite_to_users->count() }})</span>
                                                </a>
                                            @else
                                                <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $featureProduct->id }}').submit();"
                                                    class="{{ !Auth::user()->favorite_product->where('pivot.product_id',$featureProduct->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="icon-heart3"></i><span class="text-dark">(<span class="favorite_posts">{{ $featureProduct->favorite_to_users->count() }}</span>)</span>
                                                </a>

                                                <form id="favorite-form-{{ $featureProduct->id }}" method="POST" action="{{ route('client.favorite',$featureProduct->id) }}" style="display: none;">
                                                    @csrf
                                                </form>
                                            @endguest
                                </div>
                                <div class="buttonaction right">
                                            <a href="{{  $imageTwo }}" class="btn btn-dark" data-toggle="modal"
                                                data-target=".bd-example-modal-lg"
                                                onclick="productDetailsModal({{ $featureProduct->id }})"><i
                                                    class="icon-line-expand"></i>
                                            </a>
                                        
                                </div>
                                    
                        </div>
                      
                    </a>
                    
                   
                </div>
                 <div class="product-desc">
                     <div class="product-title mb-1">
                         <h3><a href="{{ route('client.showProductDetails', ['slug' => $featureProduct->slug]) }}">{{ $featureProduct->name }}</a>
                         </h3>
                     </div>
                     <div class="product-price font-primary">
                         @if ($featureProduct->product_price != $featureProduct->product_selling_price)<del
                                 class="mr-1">&#2547; {{ $featureProduct->product_price }}</del>@endif <ins>&#2547; {{ $featureProduct->product_selling_price }}</ins>
                     </div>
                     <div class="product-rating">
                        @php
                        $arr = $featureProduct->rating;
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



