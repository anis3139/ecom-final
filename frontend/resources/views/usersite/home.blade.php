@extends('usersite.layouts.app')
@section('content')
  <!-- Start slider -->
  @include('usersite.slider')
  <!-- / slider -->
  <!-- Start Promo section -->
  @include('usersite.promo')
  <!-- / Promo section -->
  <!-- Products section -->
  @include('usersite.product')
  <!-- / Products section -->
  <!-- banner section -->
  @include('usersite.banner')
  <!-- popular section -->
  @include('usersite.popular')
  <!-- / popular section -->
  <!-- support section -->
  @include('usersite.support')
  <!-- / Support section -->
  <!-- testimonial -->
  @include('usersite.testimonial')
  <!-- / Testimonial -->

  <!-- Latest Blog -->
  @include('usersite.blog')
  <!-- / Latest Blog -->

  <!-- Client Brand -->
  @include('usersite.brandlogo')
  <!-- / Client Brand -->

  @endsection
