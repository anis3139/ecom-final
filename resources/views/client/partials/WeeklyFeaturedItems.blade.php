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
                     @php $i= 2; @endphp
                     @foreach ($featureProduct->img as $images)
                         @if ($i > 0)
                             <a
                                 href="{{ route('client.showProductDetails', ['slug' => $featureProduct->product_slug]) }}"><img
                                     src="{{ $images->image_path }}" alt="Round Neck T-shirts"></a>
                         @endif
                         @php $i--; @endphp
                     @endforeach
                     @if ($featureProduct->product_in_stock)
                         <div class="sale-flash badge badge-danger p-2">Sale!</div>
                     @else
                         <div class="sale-flash badge badge-secondary p-2">Out of Stock!</div>
                     @endif

                     <div class="bg-overlay">
                         <div class="bg-overlay-content align-items-end justify-content-between"
                             data-hover-animate="fadeIn" data-hover-speed="400">
                             <a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
                             <a href="" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg"
                                 onclick="productDetailsModal({{ $featureProduct->id }})"><i
                                     class="icon-line-expand"></i></a>
                         </div>
                         <div class="bg-overlay-bg bg-transparent"></div>
                     </div>
                 </div>
                 <div class="product-desc">
                     <div class="product-title mb-1">
                         <h3><a href="{{ $featureProduct->product_slug }}">{{ $featureProduct->product_title }}</a>
                         </h3>
                     </div>
                     <div class="product-price font-primary">
                         @if ($featureProduct->product_price != $featureProduct->product_selling_price)<del
                                 class="mr-1">&#2547; {{ $featureProduct->product_price }}</del>@endif <ins>&#2547; {{ $featureProduct->product_selling_price }}</ins>
                     </div>
                     <div class="product-rating">
                         <i class="icon-star3"></i>
                         <i class="icon-star3"></i>
                         <i class="icon-star3"></i>
                         <i class="icon-star-half-full"></i>
                         <i class="icon-star-empty"></i>
                     </div>
                 </div>
             </div>
         </div>

     @endforeach
 </div>




 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">

             <div class="single-product shop-quick-view-ajax">
                 <div class="ajax-modal-title text-center">
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
                                     <span class="posted_in">Category: <a href="#" rel="tag"
                                             id="pdCategory"></a>.</span>
                                 </div>
                             </div>

                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </div>
