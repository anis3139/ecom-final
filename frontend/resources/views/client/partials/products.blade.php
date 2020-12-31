  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                <ul class="nav nav-tabs aa-products-tab">
                   @foreach ($categories as $category)
                   <li class=" @if ($loop->first)active @endif"><a href="#tab{{$category->id}}" data-toggle="tab">{{$category->name}}</a></li>
                   @endforeach
                </ul>

                  <!-- Tab panes -->
                <div class="tab-content">
                   @foreach ( $categories  as $catItem)
                    <div class="tab-pane fade in @PHP  @if($loop->first) active @endif @ENDPHP" id="tab{{$catItem->id}}">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                        @php
                          $products=App\Models\product_table::with(['img'])->where('product_category_id', $catItem->id)->where('product_active', 1)->take(8)->get();
                        @endphp
                        @foreach ($products as $product)
                              <li>

                                <figure>
                                    @php  $i= 1; @endphp
                                    @foreach ($product->img as $images)
                                    @if ($i > 0)

                                    <a class="aa-product-img" href="{{ route('client.showProductDetails', ['slug'=>$product->product_slug]) }}"><img src="{{$images->image_path}}" alt="polo shirt img" width="100%" height="300px" style="background-position: center; background-repeat: no-repeat;background-size: cover;"></a>

                                    @endif
                                    @php $i--; @endphp
                                 @endforeach



                                  <form action="{{ route('client.addCart') }}" id="cartForm" method="post">
                                  @csrf
                                  <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                                  <button type="submit" class="aa-add-card-btn"><span class="fa fa-shopping-cart" id="CartAddConfirmBtn"></span>Add To Cart</button>
                                </form>


                                    <figcaption>
                                    <h4 class="aa-product-title"><a href="{{ route('client.showProductDetails', $product->product_slug)}}">{{ $product->product_title}}</a></h4>
                                    <span class="aa-product-price">${{ $product->product_price}}</span><span class="aa-product-price"><del>${{ $product->product_selling_price}}</del></span>
                                  </figcaption>
                                </figure>
                                {{-- <div class="aa-product-hvr-content">
                                  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                  <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                                  <a href="{{ $product->product_slug}}" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                                </div> --}}
                                <!-- product badge -->

                                  @if($product->product_in_stock)
                                  <span class="aa-badge aa-sale" href="#">
                                  SALE!
                                </span>
                                    @else
                                    <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                                  @endif



                              </li>
                        @endforeach
                      </ul>
                    </div>
                    @endforeach
                </div>




                  <!-- quick view modal -->
                  <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <div class="row">
                            <!-- Modal view slider -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="aa-product-view-slider">
                                <div class="simpleLens-gallery-container" id="demo-1">
                                  <div class="simpleLens-container">
                                      <div class="simpleLens-big-image-container">
                                          <a class="simpleLens-lens-image" data-lens-image="{{ asset('client/img')}}/view-slider/large/polo-shirt-1.png">
                                              <img src="{{ asset('client/img')}}/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                          </a>
                                      </div>
                                  </div>
                                  <div class="simpleLens-thumbnails-container">
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="{{ asset('client/img')}}/view-slider/large/polo-shirt-1.png"
                                         data-big-image="{{ asset('client/img')}}/view-slider/medium/polo-shirt-1.png">
                                          <img src="{{ asset('client/img')}}/view-slider/thumbnail/polo-shirt-1.png">
                                      </a>
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="{{ asset('client/img')}}/view-slider/large/polo-shirt-3.png"
                                         data-big-image="{{ asset('client/img')}}/view-slider/medium/polo-shirt-3.png">
                                          <img src="{{ asset('client/img')}}/view-slider/thumbnail/polo-shirt-3.png">
                                      </a>

                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="{{ asset('client/img')}}/view-slider/large/polo-shirt-4.png"
                                         data-big-image="{{ asset('client/img')}}/view-slider/medium/polo-shirt-4.png">
                                          <img src="{{ asset('client/img')}}/view-slider/thumbnail/polo-shirt-4.png">
                                      </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Modal view content -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="aa-product-view-content">
                                <h3>T-Shirt</h3>
                                <div class="aa-price-block">
                                  <span class="aa-product-view-price">$34.99</span>
                                  <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                                <h4>Size</h4>
                                <div class="aa-prod-view-size">
                                  <a href="#">S</a>
                                  <a href="#">M</a>
                                  <a href="#">L</a>
                                  <a href="#">XL</a>
                                </div>
                                <div class="aa-prod-quantity">
                                  <form action="">
                                    <select name="" id="">
                                      <option value="0" selected="1">1</option>
                                      <option value="1">2</option>
                                      <option value="2">3</option>
                                      <option value="3">4</option>
                                      <option value="4">5</option>
                                      <option value="5">6</option>
                                    </select>
                                  </form>
                                  <p class="aa-prod-category">
                                    Category: <a href="#">Polo T-Shirt</a>
                                  </p>
                                </div>
                                <div class="aa-prod-view-bottom">
                                  <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                  <a href="#" class="aa-add-to-cart-btn">View Details</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- / quick view modal -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
