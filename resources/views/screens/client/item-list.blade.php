@extends('layouts.client.master')

@section('title', 'Danh sách chương trình')

@section('content')
<main class="item-list-vertical">
    <div class="container">
        <p class="title">Các vở diễn hot</p>
        <div class="item-list">
            @foreach ($tickets as $ticket)
            <div class="item">
                <div class="item-image">
                    <img src="{{ asset($ticket->thumbnail) }}">
                </div>
                <div class="item-detail">
                    <div class="item-detail__name">
                        {{ $ticket->name }}
                    </div>
                    <div class="item-detail__description">
                        {{ $ticket->description }}
                    </div>
                    <div class="item-detail__info">
                        <ul>
                            <li><strong>Thời gian</strong>: {{ implode(', ', $ticket->times()->pluck('time')->toArray()) }}</li>
                            <li><strong>Địa chỉ</strong>: {{ $setting->address }}</li>
                            <li><strong>Liên hệ</strong>: {{ $setting->phone }}</li>
                        </ul>
                    </div>
                    <a href="{{ route('ticket.show', ['slug' => $ticket->slug, 'id' => $ticket->id]) }}" class="book-item">đặt vé</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection