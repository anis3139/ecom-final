  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            @php
              $HomeSFSectionData= json_decode(App\Models\homeSpecialFeaturesModel::orderBy('id', 'desc')->limit(3)->get());
                $icon=['fa-truck', 'fa-clock-o', 'fa-phone' ]
            @endphp

            @foreach ($HomeSFSectionData as $HomeSFData)
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa {{ $icon[$loop->index]}}"></span>
                <h4>@if($HomeSFData){{ $HomeSFData->title}}@endif</h4>
                <P>@if($HomeSFData){{ $HomeSFData->description}}@endif</P>
              </div>
            </div>
            @endforeach
          
          </div>
        </div>
      </div>
    </div>
  </section>