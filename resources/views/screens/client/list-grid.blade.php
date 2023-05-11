@extends('layouts.client.master')

@section('title', 'Danh sách chương trình')

@section('content')
<main>
    <div class="container">
        <div class="show-list">
            @foreach ($tickets as $ticket)
            <div class="show-item">
                <a href="{{ route('ticket.show', ['slug' => $ticket->slug, 'id' => $ticket->id]) }}">
                    <div class="show-item__image">
                        <img src="{{ asset($ticket->thumbnail) }}" alt="">
                    </div>
                </a>
                <div class="show-item__name">
                    {{ $ticket->name }}
                </div>
                <div class="show-item__detail">
                    <ul>
                        <li><strong>Thời gian</strong>: {{ implode(', ', $ticket->times()->pluck('time')->toArray()) }}</li>
                        <li><strong>Địa chỉ</strong>: {{ $setting->address }}</li>
                        <li><strong>Liên hệ</strong>: {{ $setting->phone }}</li>
                    </ul>
                </div>
                <a href="{{ route('ticket.show', ['slug' => $ticket->slug, 'id' => $ticket->id]) }}" class="book-item">Đặt vé</a>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection