<div class="main-div">
<section class="about-section">
    <div class="container">
        <div class="containt">
            <div class="row">
  @php
      $HomeAboutSectionData= json_decode(App\Models\HomeAboutSecTionModel::orderBy('id', 'desc')->get()->first());
  @endphp
                <div class="col-md-5">
                    <div class="left-contain">
                        <img src="@if($HomeAboutSectionData){{$HomeAboutSectionData->image1}}@endif" alt="">
                    </div>
                </div>
  
            <div class="col-md-7 ">
                <div class="right-contain">
                    <div class="right-header">
                        <h1>@if($HomeAboutSectionData){!! nl2br(e( $HomeAboutSectionData->title)) !!}@endif</h1>
                    </div>
                    <div class="right-details">
                        <p>@if($HomeAboutSectionData){!! nl2br(e( $HomeAboutSectionData->description)) !!}@endif</p>
                    </div>
                </div>
            </div>
        </div>
  
    </div>
  </section>