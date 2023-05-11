@extends('layouts.client.master')

@section('title', 'Tác giả')

@section('content')
<main class="author-list-page">
    <div class="container">
        <p class="title">Tác giả</p>
        <div class="authors">
            @foreach ($authors as $author)
            <div class="author">
                <div class="author-image">
                    <img src="{{ asset($author->image) }}">
                </div>
                <div class="author-name">{{ $author->name }}</div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection