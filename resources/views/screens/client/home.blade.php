@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')
<div class="banner-slider">
    @foreach ($slides as $slide)
    <div class="row-slider">
        <img src="{{ $slide->path }}" alt="">
        @if ($slide->url)
            <a href="{{ $slide->url }}" class="go-to-slider">đặt mua vé rối nước</a>
        @endif
    </div>
    @endforeach
</div>
<div class="container">
    <div class="item-list">
        @foreach ($tickets as $ticket)
        <a href="{{ route('ticket.show', ['slug' => $ticket->slug, 'id' => $ticket->id]) }}" class="item">
            <div class="item-img">
                <img src="{{ asset($ticket->thumbnail) }}">
            </div>
            <h3 class="item-name">{{ $ticket->name }}</h3>
        </a>
        @endforeach
    </div>
    <button class="readmore"><a href="{{ route('ticket.list.vertical') }}">Xem thêm</a></button>
</div>
<div class="author-section">
    <div class="container">
        <div class="author-list">
            @foreach ($authors as $author)
            <div class="author">
                <div class="author-image">
                    <img src="{{ asset($author->image) }}" alt="{{ $author->name }}">
                </div>
                <div class="author-name">{{ $author->name }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<button class="readmore"><a href="#">tin tức</a></button>
<div class="container">
    <section class="list-news">
        @foreach ($posts as $post)
        <a class="news" href="{{ route('post.show', ['slug' => $post->slug, 'id' => $post->id]) }}">
            <div class="news-thumb">
                <img src="{{ asset($post->thumbnail) }}">
            </div>
            <div class="news-date">
                <span><i class="far fa-calendar-alt"></i> {{ $post->created_at->format("d/m/Y") }}</span>
            </div>
            <div class="news-title">{{ $post->title }}</div>
            {{-- <button class="news-read">Xem thêm <i class="fas fa-arrow-right"></i></button> --}}
        </a>
        @endforeach
    </section>
</div>
@endsection