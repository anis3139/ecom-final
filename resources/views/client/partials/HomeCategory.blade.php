 <!-- Shop Categories
         ============================================= -->

         @if ($promo_categories->count() >0 )
             
        
                    <div class="fancy-title title-border title-center mb-4">
                        <h4>Shop popular categories</h4>
                    </div>

                    <div class="row shop-categories clearfix">
                        @foreach ($promo_categories as $category)
                        @if ($loop->first)
                       
                        <div class="col-lg-7">
                            <a href="{{ route('client.category', $category->slug) }}"
                                style="background: url('{{$category->icon}}') no-repeat right center; background-size: cover;">
                                <div class="vertical-middle dark center">
                                    <div class="heading-block m-0 border-0">
                                        <h3 class="nott font-weight-semibold ls0"> {{$category->name}}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                        @foreach ($promo_categories as $key=> $category)
                      
                        @if($key != 0 && $key == 1 )
                         
                        <div class="col-lg-5">
                            <a href="{{ route('client.category', $category->slug) }}"
                                style="background: url('{{$category->icon}}">
                                <div class="vertical-middle dark center">
                                    <div class="heading-block m-0 border-0">
                                        <h3 class="nott font-weight-semibold ls0">{{$category->name}}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach

                        @foreach ($promo_categories as $key=> $category)
                      
                        @if($key != 0 && $key != 1 )
                      
                        <div class="col-lg-4">
                            <a href="{{ route('client.category', $category->slug) }}"
                                style="background: url('{{$category->icon}}">
                                <div class="vertical-middle dark center">
                                    <div class="heading-block m-0 border-0">
                                        <h3 class="nott font-weight-semibold ls0">{{$category->name}}</h3>
                                        <small class="button bg-white text-dark button-light button-mini">Browse Now</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                      
                    </div>
 @endif
                    <!-- Featured Carousel
         ============================================= -->