@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $post->title }}</h2>
                <p><a href="/posts?username={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a
                        href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                        @if ($post->image)
                        <div style="max-height: 350px; overflow:hidden">
                            <img src="{{ asset($post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                        </div>
                        @else
                            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                                alt="{{ $post->category->name }}" class="img-fluid mt-3">
                        @endif
                <article class="my-3 fs-5">
                    {!! $post->body !!} </p>
                </article>
                <a href="/posts/">Back to all post</a>
            </div>
        </div>
    </div>
@endsection
