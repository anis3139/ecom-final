@extends('errors.errors_layout')

@section('title')
    419 -Page Expired
@endsection

@section('error-content')

    <div class="text-center p-5">
        <h2 class="text-danger" style="font-size: 100px">419</h2>
        <p>Paged Expired</p>
    </div>
    <hr>
    <p class="mt-2 text-center">
        {{ $exception->getMessage() }}
    </p>
    @php
        $path=  $_SERVER['REQUEST_URI'];
        $pathToken=explode('/', $path);
    @endphp
    @if($pathToken[1]=='admin')
    <div class="container p-5 d-flex justify-content-between">
        <a class="btn btn-primary btn-lg" href="{{ route('admin.adminHome') }}">Back to Dashboard</a>
        <a class="btn btn-warning btn-lg" href="{{ route('admin.login') }}">Admin Login</a>
    </div>
    @else
    <div class="container p-5 d-flex justify-content-between">
        <a class="btn btn-primary btn-lg" href="{{ route('client.home') }}">Back to Home</a>
        <a class="btn btn-warning btn-lg" href="{{ route('client.login') }}">User Login</a>
    </div>
    @endif






@endsection
