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



                                 <a  class="aa-add-card-btn"  onclick="productDetailsModal({{ $product->id }})"
                                    href="" data-toggle2="tooltip" data-placement="top"
                                   data-toggle="modal" data-target="#quick-view-modal"><span
                                                class="fa fa-shopping-cart" id="CartAddConfirmBtn"></span>Add To
                                            Cart</a>


                                    <figcaption>
                                    <h4 class="aa-product-title"><a href="{{ route('client.showProductDetails', $product->product_slug)}}">{{ $product->product_title}}</a></h4>
                                   <span class="aa-product-price">&euro; &nbsp;{{ $product->product_selling_price}}</span> @if($product->product_price!= $product->product_selling_price)<span class="aa-product-price"><del> &euro; &nbsp;{{ $product->product_price}}</del></span>@endif
                                  </figcaption>
                                </figure>
                                <div class="aa-product-hvr-content">
                                  {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                  <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a> --}}
                                  <a onclick="productDetailsModal({{ $product->id }})"
                                    data-toggle2="tooltip" data-placement="top"
                                    title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span
                                        class="fa fa-search"></span></a>
                                </div>
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
    </div>
  </section>
