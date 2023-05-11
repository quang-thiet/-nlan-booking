@extends('layouts.client.master')

@section('title', 'Đặt vé thành công')

@section('content')
<main>
    <div class="container">
        <p class="title">Đặt vé thành công</p>
        <ul>
            <li>Họ tên: {{ $order->fullname }}</li>
            <li>Số điện thoại: {{ $order->phone}}</li>
            <li>Chương trình: {{ $order->ticket->name }}</li>
            @foreach (json_decode($order->detail, true) as $key => $item)
            <li>{{ $key }}: {{ $item }}</li>
            @endforeach
        </ul>
    </div>
</main>
@endsection