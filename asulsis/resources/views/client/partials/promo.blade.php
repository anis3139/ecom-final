<!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              <!-- promo left -->
              @foreach ($promo_categories as $category)
              @if ($loop->first)
              <div class="col-md-5 no-padding">                
                <div class="aa-promo-left">
                  <div class="aa-promo-banner">                    
                    <img src="{{$category->icon}}" alt="img">                    
                    <div class="aa-prom-content">
                      <h4><a href="{{ route('client.category', $category->slug) }}">{{$category->name}}</a></h4>                      
                    </div>
                  </div>
                </div>
              </div>
              @endif
              @endforeach
              <!-- promo right -->
              <div class="col-md-7 no-padding">
                <div class="aa-promo-right">
                  @foreach ($promo_categories as $key=> $category)
                  @if($key > 0)
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="{{$category->icon}}" alt="img">                  
                      <div class="aa-prom-content">
                        <h4><a href="{{ route('client.category', $category->slug) }}">{{$category->name}}</a></h4>                        
                      </div>
                    </div>
                  </div>
                 
                  @endif
                 @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>