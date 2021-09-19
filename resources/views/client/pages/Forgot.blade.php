@extends('client.layouts.app')
@section('title', 'Password Recover')
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
                                <div class="aa-myaccount-register">


                                    <form id="login-form" name="login-form" class="row"
                                        action="{{ route('client.forgotPassword') }}" method="post">
                                        @csrf
                                        <div class="col-12">
                                            <h3>Reset Password</h3>
                                        </div>

                                        <div class="col-12 form-group">
                                            <label for="login-form-username">Your Email:</label>
                                            <input type="email" id="login-form-username" name="email" value=""
                                                class="form-control" />
                                        </div>


                                        <div class="col-12 form-group">
                                            <button class="btn btn-secondary m-0" id="login-form-submit"
                                                name="login-form-submit" value="login">Submit</button>

                                        </div>


                                    </form>
                                </div>
                                <div class="row">

                                    @guest
                                        <div class="col-md-12" style="margin-top: 20px !important">
                                            <p>Don't have an account? <a class="text-primary"
                                                    href="{{ route('client.registration') }}"> Register now! </a></p>
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



@section('script')

@include('client.component.Scripts')
@endsection
