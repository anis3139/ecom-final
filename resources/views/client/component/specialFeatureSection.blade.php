
<div class="container clearfix">

    <div class="row col-mb-50 mb-0">
        @foreach ($AboutSFSectionData as $AboutSFData)

            <div class="col-lg-4">

                <div class="heading-block fancy-title border-bottom-0 title-bottom-border">
                    <h4>
                        @if ($AboutSFData){{ $AboutSFData->title }}@endif
                    </h4>
                </div>

                <p>
                    @if ($AboutSFData){{ $AboutSFData->description }}@endif
                </p>

            </div>

        @endforeach
    </div>

</div>
