@extends('client.layouts.app')
@section('title', 'My Cart')
@section('content')

    <section id="page-title">

        <div class="container clearfix">
            <div>
                @include('client.component.ErrorMessage')
                @auth
                    <form action="{{ route('client.blog.store') }}" method="POST">
                        @csrf
                        <textarea required class="form-control" name="post" id="post" cols="30"
                            rows="10">{{ old('post') }}</textarea>
                        <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                        <button
                            class="button button-xlarge button-black button-rounded text-right text-light button-3d float-right mt-3"
                            type="submit">Share Post</button>
                    </form>
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
                            <div class="entry col-md-10 offset-md-1">
                                <div>
                                    <p>
                                        {!! nl2br(e($post->post)) !!}
                                    </p>

                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="icon-calendar3"></i>{{ $post->created_at->diffForHumans() }}</li>
                                        <li><i class="icon-user"></i> {{ $post->name }}</li>

                                    </ul>
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
