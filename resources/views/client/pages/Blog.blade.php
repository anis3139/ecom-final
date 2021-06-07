@extends('client.layouts.app')
@section('title', 'News Feed')
@section('css')
    <style>
        .blogImg {
            margin: 10px;
            text-align: center;
        }

        .blogImg>img {
            width: 350px;
            height: 200px;
        }

    </style>
@endsection
@section('content')

    <section id="page-title">

        <div class="container clearfix">
            <div class="card">
                @include('client.component.ErrorMessage')
                @auth
                    <div class="card-header text-center">
                        <h2>Share Your Experiance</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('client.blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input required type="file" name="image" id="blogImage" class="form-control">
                                    <div class="blogImg">
                                        <img src="{{ asset('default-image.png') }}" alt="{{ auth()->user()->name }}"
                                            id="blogImagePreview">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <input required type="text" name="title" id="title" class="form-control" placeholder="Title">
                                    <textarea required class="form-control mt-2" name="post" id="post" cols="30"
                                        rows="10" placeholder="Write Your Massage">{{ old('post') }}</textarea>
                                </div>
                            </div>


                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                            <button
                                class="button button-xlarge button-black button-rounded text-right text-light button-3d float-right mt-3"
                                type="submit">Share Post</button>
                        </form>
                    </div>
                @endauth
                @guest
                    <h2 class="text-center">You need to <a class="font-weight-bold text-primary"
                            href="{{ route('client.login') }}">login</a> for creating post</h2>
                @endguest

            </div>
        </div>

    </section>


    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div id="posts" class="row grid-container gutter-40">
                    @if ($posts)
                        @foreach ($posts as $post)
                            <div class="entry col-md-10 offset-md-1 row">
                                <div class="grid-inner row no-gutters">
                                    <div class="entry-image col-md-4">
                                        <a href="{{ $post->image ?? asset('default-image.png') }}"
                                            data-lightbox="image"><img src="{{ $post->image ?? asset('default-image.png') }}"
                                                alt="{{ $post->title }}"></a>
                                    </div>
                                    <div class="col-md-8 pl-md-4">
                                        <div class="entry-title title-sm">
                                            <h2><a href="#"> {{ $post->title }}</a>
                                            </h2>
                                        </div>
                                        <div class="entry-meta">
                                            <ul>
                                                <li><i class="icon-calendar3"></i>{{ $post->created_at->diffForHumans() }}
                                                </li>
                                                <li><a href="#"><i class="icon-user"></i> {{ $post->name }}</a></li>
                                            </ul>
                                        </div>
                                        <div class="entry-content">
                                            <p> {!! nl2br(e($post->post)) !!}</p>
                                            {{-- <a href="blog-single.html" class="more-link">Read More</a> --}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                {{ $posts->links('vendor.pagination.simple-bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection


@section('script')
    <script>
        //image Preview
        $('#blogImage').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#blogImagePreview').attr('src', ImgSource)
            }
        })

    </script>
@endsection
