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
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div id="posts" class="row grid-container gutter-40">
                    @if ($posts)
                        @foreach ($posts as $post)
                            <div class="entry col-md-10 offset-md-1 row m-1" style="position: absolute;left: 5%;top: 0px;">
                                <div class="grid-inner row no-gutters">
                                    <div class="entry-image col-md-4">
                                        <a href="{{ $post->image ?? asset('default-image.png') }}"
                                            data-lightbox="image"><img src="{{ $post->image ?? asset('default-image.png') }}"
                                                alt="{{ $post->title }}"></a>
                                    </div>
                                    <div class="col-md-8 pl-md-4">
                                        <div class="entry-title title-sm">
                                            <h2><a href="{{route('client.singleBlog', $post->slug )}}"> {{ $post->title }}</a>
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
                                            <p> {!! \Illuminate\Support\Str::words($post->post, 50,'...') !!}</p>
                                            <a href="{{route('client.singleBlog', $post->slug )}}" class="more-link">Read More</a>
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
@include('client.component.Scripts')
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
