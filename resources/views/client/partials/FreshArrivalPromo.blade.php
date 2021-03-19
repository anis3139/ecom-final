 @php
     $others = App\Models\OthersModel::first();
 @endphp


 <div class="section my-4">
     <div class="container">
         <div class="row align-items-stretch">
             <div class="col-md-5">
                 <div class="row">
                     <div class="col-md-12 center p-5">
                         <div class="heading-block mb-1 border-bottom-0 mx-auto">
                             <div class="font-secondary text-black-50 mb-1">New Arrivals</div>
                             <h3 class="nott ls0">Fresh Arrivals / Autumn 18</h3>
                             <p class="font-weight-normal mt-2 mb-3 text-muted"
                                 style="font-size: 17px; line-height: 1.4">Dynamically drive interdependent
                                 metrics for worldwide portals. Proactively grow client technology schemas.
                             </p>
                             <a href="{{ route('client.shop') }}"
                                 class="button bg-dark text-white button-dark button-small ml-0">Shop
                                 Now</a>
                         </div>
                     </div>
                     <div class="col-6">
                         <a href="@if ($others) {{ $others->promo_image_three }} @endif" data-lightbox="image"><img src="@if ($others) {{ $others->promo_image_three }} @endif" alt="Image"></a>
                     </div>
                     <div class="col-6">
                         <a href="@if ($others) {{ $others->promo_image_two }} @endif" data-lightbox="image"><img src="@if ($others) {{ $others->promo_image_two }} @endif" alt="Image"></a>
                     </div>
                 </div>
             </div>
             <div class="col-md-7 min-vh-50">
                 <a href="https://www.youtube.com/watch?v=bpNcuh_BnsA" data-lightbox="iframe"
                     class="d-block position-relative h-100" style="background: url('@if ($others) {{ $others->promo_image_one }} @endif') center center
                     no-repeat; background-size: cover;">
                     <div class="vertical-middle text-center">
                         <div class="play-icon"><i class="icon-play-sign display-3 text-light"></i></div>
                     </div>
                 </a>
             </div>
         </div>
     </div>
 </div>
