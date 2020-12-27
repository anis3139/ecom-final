@extends('client.layouts.app')
@section('css')

<style>
    .aa-login-form input[type="email"], .aa-login-form input[type="number"]{
    border: 1px solid #ccc;
    font-size: 16px;
    height: 40px;
    margin-bottom: 15px;
    padding: 10px;
    width: 100%;
    }
}
</style>

@endsection
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
                @include('client.components.errorMassage')
                <div class="aa-myaccount-register">
                 <h4>Register</h4>
                 <form action="{{route('client.addUser')}}" class="aa-login-form registration" method="post">
                    @csrf
                    <label for="">Full Name<span>*</span></label>
                    <input name="name" type="text" placeholder="Name" value="{{old('name')}}">
                    <label for="phone">Phone Number<span>*</span></label>
                    <input name="phone_number" type="number" placeholder="Phone Number" value="{{old('phone_number')}}">
                    <label for="">Email address<span>*</span></label>
                    <input name="email" type="email" placeholder="Email" value="{{old('email')}}">
                    <label for="">Password<span>*</span></label>
                    <input name="password" type="password" placeholder="Password">
                    <button type="submit" class="aa-browse-btn">Register</button>
                  </form>
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
