@extends('client.layouts.app')

@section('title', 'Password Reset')
@section('content')

    <div id="login" class="container">

        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ml-auto">
            <div class="login-card card">
                <div class="card-header border-0 ">
                    <h2 class="text-center" style="margin-top: 20px">Password Reset</h2>
                </div>
                <div class="card-body pt-0">
                    @include('client.component.ErrorMessage')

                    <form action="{{ route('client.passwordUpdate', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group my-4">
                            <label for="email">Email:</label>
                            <input readonly type="text" class="form-control login" name="email" id="email" placeholder="Email"
                                value="{{ $user->email }}">
                        </div>

                        <div class="form-group my-4">
                            <label for="oldPassword">Old Password: </label>
                            <input type="password" class="form-control login" name="oldPassword" id="oldPassword"
                                placeholder="Old Password" value="{{ old('oldPassword') }}">
                        </div>
                        <div class="form-group my-4">
                            <label for="password">New Password: </label>
                            <input type="password" class="form-control login" name="password" id="password"
                                placeholder="New Password">
                        </div>
                        <div class="form-group my-4">
                            <label for="password_confirmation">Conform Password: </label>
                            <input type="password" class="form-control login" name="password_confirmation" id="password_confirmation"
                                placeholder="Conform Password">
                        </div>


                        <div class="form-group text-center my-4">
                            <input type="submit" class="btn btn-primary btn-lg btn-block font-weight-bold"
                                value="Update">
                        </div>
                    </form>




                </div>
            </div>
        </div>


    </div>
@endsection




@section('script')

@include('client.component.Scripts')

@endsection
