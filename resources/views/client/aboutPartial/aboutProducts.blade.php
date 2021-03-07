<section class="isotope-section">
    <div class="container">
      <ul class="filter-menu">
        <li data-target="all">All</li>
        
        @foreach ($categories as $category)
        <li data-target="#{{$category->id}}">{{$category->name}}</li>
        @endforeach
      
    </ul>
  
    <ul class="filter-item">
        @foreach ( $categories  as $catItem)
        @php
        $products=App\Models\product_table::with(['img'])->where('product_category_id', $catItem->id)->where('product_active', 1)->take(20)->get();
        @endphp
        @foreach ( $products  as $product)
        <li data-item="#{{$product->product_category_id}}">
            @php  $i= 1; @endphp
                                    @foreach ($product->img as $images)
                                    @if ($i > 0)
            <a href="{{ route('client.showProductDetails', ['slug'=>$product->product_slug]) }}"><img src="{{$images->image_path}}" alt="{{$product->product_title}}"></a>
            
            @endif
            @php $i--; @endphp
         @endforeach
          <div class="filter-details">
             <h6><span>{{$product->product_title}}</span></h6>
    
          </div>
        </li>
        @endforeach
        @endforeach
    </ul>
   
    </div>
    
    
    </section>

</div>