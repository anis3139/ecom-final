@extends('client.layouts.app')
@section('title', 'Password Recover')
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

  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="mt-5">
            <div class="row">
              <div class="col-md-8 offset-md-2">
                @include('client.component.Message')
                @include('client.component.ErrorMessage')

                @if($user)
                <div class="aa-myaccount-register">
                 <h4>Hello, Mr. {{$user->name}}.... <br> Please Reset Your Password</h4>



                  <form id="login-form" name="login-form" class="row" action="{{ route('client.updatePassword') }}" method="post">
                    @csrf
                    <div class="col-12">
                        <h3>Login to your Account</h3>
                    </div>

                    <div class="col-12 form-group">
                        <label for="login-form-username">Username:</label>
                        <input type="email"  readonly id="login-form-username" name="email"  value="{{$user->email}}" class="form-control" />
                    </div>

                    <div class="col-12 form-group">
                        <label for="login-form-password">New Password:</label>
                        <input required type="password" id="login-form-password" name="password" value="" class="form-control" />
                    </div>
                    <div class="col-12 form-group">
                        <label for="login-form-password">Confirm Password:</label>
                        <input  required type="password" id="login-form-password" name="password_confirmation" value="" class="form-control" />
                    </div>

                    <div class="col-12 form-group">
                        <button class="btn btn-secondary m-0" id="login-form-submit" name="login-form-submit" value="login">Reset Password</button>
                        <div class="float-right">
                            <a href="{{ route('client.registration') }}" class="d-block text-primary p-1">Register now! </a>
                        </div>

                    </div>


                </form>
                </div>

                @endif
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


@section('script')
@include('client.component.Scripts')


@endsection
