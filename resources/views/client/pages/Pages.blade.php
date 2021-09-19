@extends('client.layouts.app')
@section('title')
@if ($data)

{{ $data->slug }}
@endif

@endsection
@section('css')


@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                @if ($data)
                <h1 class="my-5 text-center">{{$data->title}}</h1>
                <p class="mb-5">{!! $data->description !!}</p>
                @else
                <h1 class="my-5 text-center">There is no data</h1>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
@include('client.component.Scripts')
@endsection
