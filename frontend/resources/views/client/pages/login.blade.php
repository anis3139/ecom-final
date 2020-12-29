@extends('client.layouts.app')

@section('content')

 <!-- catg header banner section -->
 <section id="aa-catg-head-banner">
    <img src="{{asset('client')}}/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Account</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">
            <div class="row">
              <div class="col-md-12">
                @include('client.components.massege')
                @include('client.components.errorMassage')
                <div class="aa-myaccount-register">
                 <h4>Log In</h4>
                 <form action="{{route('client.onlogin')}}" class="aa-login-form registration" method="post">
                    @csrf
                    <label for="">Email address<span>*</span></label>
                    <input name="email" type="email" placeholder="Email" value="{{old('email')}}">
                    <label for="">Password<span>*</span></label>
                    <input name="password" type="password" placeholder="Password">
                    <button type="submit" class="aa-browse-btn">Log In</button>
                  </form>
                </div>
                <div class="row">
                    @guest
                        <div class="col-md-12"  style="margin-top: 20px !important">
                            <p>Don't have an account? <a class="text-primary" href="{{route('client.registration')}}"> Register now! </a></p>
                        </div>
                    @endguest
                </div>
              </div>
            </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
@endsection
