@php
$others=App\Models\OthersModel::first();

@endphp
@if($others)
<section id="aa-catg-head-banner">
    <img src="{{$others->hero_banner}}" alt="image" id="bannerImage">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content" >
                <h2>{{config('app.name', 'Anis Arronno')}}</h2>
                <ol class="breadcrumb">
                    <li><a href="{{ route('client.home') }}">Home</a></li>
                    <li class="active">Shop</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endif
