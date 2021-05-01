@php
$HomeSFSectionData = json_decode(
    App\Models\homeSpecialFeaturesModel::orderBy('id', 'desc')
        ->limit(3)
        ->get(),
);
@endphp
<div class="container clearfix">

    <div class="row col-mb-50 mb-0">
        @foreach ($HomeSFSectionData as $HomeSFData)

            <div class="col-lg-4">

                <div class="heading-block fancy-title border-bottom-0 title-bottom-border">
                    <h4>
                        @if ($HomeSFData){{ $HomeSFData->title }}@endif
                    </h4>
                </div>

                <p>
                    @if ($HomeSFData){{ $HomeSFData->description }}@endif
                </p>

            </div>

        @endforeach
    </div>

</div>
