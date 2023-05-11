@extends('layouts.client.master')

@section('title', $post->title)

@section('content')
<main>
    <div class="single-post-hero" style="background-image: url(http://duan1.pro/assets/uploads/post/thumb-JSGsA.jpg)">
        <div class="cover-content wrapper">
            <div class="post-info">
                <h1 class="post-title">{{ $post->title }}</h1>
            </div>
        </div>
    </div>
    <div class="blog-page container">
        <section class="page-contents">
            <article class="post-body">
                <section class="post-contents">
                    {{ $post->content }}
                </section>
            </article>
            
    </div>
</main>
@endsection