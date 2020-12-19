@extends('usersite.layouts.app')
@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="{{asset('asset/img/regimage.png')}}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Register Page</h2>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>
          <li class="active">Register</li>
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
           @if (Auth::user())
            <form class="aa-login-form" action="{{route('verification.send')}}" method="POST">
                @csrf
                <button hidden id="modal" class="aa-browse-btn" type="submit">Resent Email</button>
            </form>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#modal").click();
                });
            </script>

            <div class="alert alert-primary" role="alert">
                A email varification link sent to your email address.Please check your Email and Verify your email address.
            </div>

            @else
            <div class="row">
                <div class="col-md-12">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                {{ session('status') }}
                </div>
                @endif
                @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                    </div>
                @enderror
                @error('username')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                    </div>
                @enderror
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
                @error('password_confirmation')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                    </div>
                @enderror
                @error('number')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                    </div>
                @enderror
            </div>
                <form action="{{route('register')}}" method="POST" class="aa-login-form">
                    @csrf
                <div class="col-md-6">
                    <div class="aa-myaccount-login">
                    <label for="">Name<span>*</span></label>
                    <input type="text" placeholder="Enter your full name" name="name">
                    <label for="">User Name<span>*</span></label>
                    <input type="text" placeholder="Enter user name" name="username">
                    <label for="">Phone Number<span>*</span></label>
                    <input type="text" placeholder="Enter Phone Number" name="number">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="aa-myaccount-register">
                        <label for="email">Email<span>*</span></label>
                    <input type="text" placeholder="Enter your valid email" name="email">
                        <label for="">Password<span>*</span></label>
                        <input type="password" placeholder="Enter passwird" name="password">
                        <label for="">Confirm Password<span>*</span></label>
                        <input type="password" placeholder="Enter Confirm passwird" name="password_confirmation">
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="aa-browse-btn">Register</button>
                </div>
                <div class="col-md-6">
                    <div class="aa-myaccount-register">
                    <div style="padding-top:14px;">Already have a account? <a href="{{url('login')}}" style="color: rgb(139, 46, 46) !important"> Login !</a></div></div>
                </div>
             </form>
            </div>
            @endif
            </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
@endsection
