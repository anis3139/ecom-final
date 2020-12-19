@extends('usersite.layouts.app')
@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="{{asset('asset/img/regimage.png')}}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>login Page</h2>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>
          <li class="active">login</li>
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
       <div class="col-md-12">
        <div class="aa-myaccount-area">
            <div class="row">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                {{ session('status') }}
                </div>
                @endif
                @error('email')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                    </div>
                @enderror
                @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                    </div>
                @enderror
        <form class="aa-login-form" action="{{route('login')}}" method="POST">
                @csrf
                <label for="">Email address<span>*</span></label>
                <input type="text" placeholder="Email" name="email">
                <label for="">Password<span>*</span></label>
                <input type="password" placeholder="Password" name="password">
                <button class="aa-browse-btn" type="submit">Login</button>
                <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme" name="remember" checked="checked"> Remember me </label>
                <p class="aa-lost-password"><a href="{{url('forgot-password')}}">Lost your password?</a></p>
                <div class="aa-register-now">
                Don't have an account?<a href="{{url('register')}}">Register now!</a>
                </div>
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
