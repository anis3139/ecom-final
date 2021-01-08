@extends('client.layouts.app')

@section('css')


@include('client.aboutPartial.css')

@endsection
@section('content')
@php
$others=App\Models\OthersModel::first();
$socialData=App\Models\SocialModel::first();

@endphp


 @include('client.components.hero')

 @include('client.aboutPartial.aboutIntro')
 @include('client.aboutPartial.aboutProducts')


  <!-- / popular section -->
 
  @include('client.components.specialFeatureSection')
  <!-- / Support section -->
  <!-- Testimonial -->
  @include('client.components.testimonial')

  @include('client.aboutPartial.contactForm')
@endsection


@section('script')


<script>

let sortBtn = document.querySelector('.filter-menu').children;
let sortItem = document.querySelector('.filter-item').children;

for(let i = 0; i < sortBtn.length; i++){
    sortBtn[i].addEventListener('click', function(){
        for(let j = 0; j< sortBtn.length; j++){
            sortBtn[j].classList.remove('current');
        }

        this.classList.add('current');


        let targetData = this.getAttribute('data-target');

        for(let k = 0; k < sortItem.length; k++){
            sortItem[k].classList.remove('active');
            sortItem[k].classList.add('delete');

            if(sortItem[k].getAttribute('data-item') == targetData || targetData == "all"){
                sortItem[k].classList.remove('delete');
                sortItem[k].classList.add('active');
            }
        }
    });
}

</script>
@endsection
