@foreach ($categories as $catItem)

    <div class="container clearfix">

        <div class="fancy-title title-border topmargin-sm mb-4 title-center">
            <h4>New Arrivals: {{ $catItem->name }}</h4>
        </div>

        <div class="row grid-6">
            @php
                $products = App\Models\product_table::with(['img'])
                    ->where('product_category_id', $catItem->id)
                    ->where('product_active', 1)
                    ->where('deleted_at', null)
                    ->take(8)
                    ->get();

            @endphp

            @foreach ($products as $product)

                <div class="col-lg-2 col-md-3 col-6 px-2">
                    <div class="product">
                        <div class="product-image">
                            @php $i= 2; @endphp
                            @foreach ($product->img as $images)
                                @if ($i > 0)
                                    <a
                                        href="{{ route('client.showProductDetails', ['slug' => $product->product_slug]) }}"><img
                                            src="{{ $images->image_path }}" alt="Round Neck T-shirts"></a>
                                @endif
                                @php $i--; @endphp
                            @endforeach
                            @if ($product->product_in_stock)
                                <div class="sale-flash badge badge-danger p-2">Sale!</div>
                            @else
                                <div class="sale-flash badge badge-secondary p-2">Out of Stock!</div>
                            @endif
                            <div class="bg-overlay">
                                <div class="bg-overlay-content align-items-end justify-content-between"
                                    data-hover-animate="fadeIn" data-hover-speed="400">
                                    <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"
                                    onclick="productDetailsModal({{ $product->id }})"  class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
                                    <a href=""  data-toggle="modal" data-target=".bd-example-modal-lg"
                                    onclick="productDetailsModal({{ $product->id }})" class="btn btn-dark"
                                        ><i class="icon-line-expand"></i></a>
                                </div>
                                <div class="bg-overlay-bg bg-transparent"></div>
                            </div>
                        </div>
                        <div class="product-desc">
                            <div class="product-title mb-1">
                                <h3><a
                                        href="{{ route('client.showProductDetails', ['slug' => $product->product_slug]) }}">{{ $product->product_title }}</a>
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
                    @endif
                            </div>
                        </div>
                    </div>
                </div>


            @endforeach


        </div>

    </div>
@endforeach
