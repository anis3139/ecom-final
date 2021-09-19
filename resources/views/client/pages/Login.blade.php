@extends('client.layouts.app')

@section('title', 'Login')
@section('css')

    <style>
        .aa-login-form input[type="email"],
        .aa-login-form input[type="number"] {
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
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">

                                        <a href="{{ route('client.SSOLogin', 'facebook') }}"
                                            class="button button-large btn-block si-colored si-facebook nott font-weight-normal ls0 center m-0"><i
                                                class="icon-facebook-sign"></i> Sign up with Facebook</a>

                                        <a href="{{ route('client.SSOLogin', 'google') }}"
                                            class=" mt-2 button button-large btn-block si-colored si-google nott font-weight-normal ls0 center m-0"><i
                                                class="icon-google"></i> Sign up with Google</a>


                                        <a href="{{ route('client.SSOLogin', 'github') }}"
                                            class=" mt-2 button button-large btn-block si-colored si-github nott font-weight-normal ls0 center m-0"><i
                                                class="icon-github"></i> Sign up with Github</a>

                                    </div>
                                </div>
                                <div class="aa-myaccount-register">

                                    <form id="login-form" name="login-form" class="row"
                                        action="{{ route('client.onlogin') }}" method="post">
                                        @csrf
                                        <div class="col-12">
                                            <h3>Login to your Account</h3>
                                        </div>

                                        <div class="col-12 form-group">
                                            <label for="login-form-username">Username:</label>
                                            <input type="email" id="login-form-username" name="email" value=""
                                                class="form-control" />
                                        </div>

                                        <div class="col-12 form-group">
                                            <label for="login-form-password">Password:</label>
                                            <input type="password" id="login-form-password" name="password" value=""
                                                class="form-control" />
                                        </div>

                                        <div class="col-12 form-group">
                                            <div class="float-left">
                                                <a href="{{ route('client.registration') }}"
                                                    class="text-primary p-1  font-weight-normal ls0 center ">Register
                                                    now! </a>
                                                <a href="{{ route('client.forgot') }}"
                                                    class="d-block text-primary p-1">Forgot Password?</a>
                                            </div>
                                            <div class="float-right">
                                                <button
                                                    class="text-light p-1 button button-large si-colored si-github nott font-weight-normal ls0 center py-2 px-5"
                                                    id="login-form-submit" name="login-form-submit"
                                                    value="login">Login</button>
                                            </div>
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



@section('script')
@include('client.component.Scripts')

@endsection
