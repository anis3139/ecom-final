@php
$others=App\Models\OthersModel::first();
$socialData=App\Models\SocialModel::first();

@endphp


<section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="@if ($others)
                        {{$others->promo_image_one}}
                        @endif" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>