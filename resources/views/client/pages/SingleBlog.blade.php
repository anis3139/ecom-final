@extends('client.layouts.app')
@section('title')
    {{$blog->title}}
@endsection
@section('content')
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div id="posts" class="row grid-container gutter-40">

                        <div class="entry col-md-10 offset-md-1 row m-1" style="position: absolute;left: 5%;top: 0px;">
                            <div class="grid-inner row no-gutters">
                                <div class="entry-image col-md-12 text-center">
                                    <a href="{{ $blog->image ?? asset('default-image.png') }}"
                                        data-lightbox="image"><img src="{{ $blog->image ?? asset('default-image.png') }}"
                                            alt="{{ $blog->title }}"></a>
                                </div>
                                <div class="col-md-12 pl-md-4">
                                    <div class="entry-title title-sm">
                                        <h2> {{ $blog->title }}
                                        </h2>
                                    </div>
                                    <div class="entry-meta">
                                        <ul>
                                            <li><i class="icon-calendar3"></i>{{ $blog->created_at->diffForHumans() }}
                                            </li>
                                            <li><a href="#"><i class="icon-user"></i> {{ $blog->name }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="entry-content">
                                        <p> {!! $blog->post !!}</p>

                                    </div>
                                </div>
                            </div>

                        </div>
            </div>
        </div>

    </div>
</section>


@endsection

@section('script')
@include('client.component.Scripts')

@endsection
