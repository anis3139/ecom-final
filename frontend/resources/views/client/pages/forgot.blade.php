@extends('client.layouts.app')

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
                 <h4>Reset Password</h4>
                 <form action="{{route('client.forgotPassword')}}" class="aa-login-form registration" method="post">
                    @csrf
                    <label for="">Please Enter Your Email<span>*</span></label>
                    <input required name="email" type="email" placeholder="Email" value="{{old('email')}}">
                    <button type="submit" class="aa-browse-btn">Submit</button>
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
