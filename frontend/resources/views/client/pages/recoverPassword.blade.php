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
 @include('client.components.hero')
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
                 <h4>Hello, Mr. {{$user->name}}.... <br> Please Reset Your Password</h4>

                 <form action="{{route('client.updatePassword')}}" class="aa-login-form registration" method="post">
                    @csrf
                    <label for="">Email address<span>*</span></label>
                    <input name="email" readonly type="email" placeholder="Email" value="{{$user->email}}">
                    <label for="">New Password<span>*</span></label>
                    <input name="password" type="password" placeholder="Password">
                    <label for="">Confirm Password<span>*</span></label>
                    <input name="password_confirmation" type="password" placeholder="Confirm Password">
                    <button type="submit" class="aa-browse-btn">Reset Password</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="row">

            </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
@endsection
