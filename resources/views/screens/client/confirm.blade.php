@extends('layouts.client.master')

@section('title', 'Xác nhận mua vé')

@section('content')
<main>
    <div class="container">
        <form action="{{ route('checkout.process') }}" method="POST" class="form-confirm">
            @csrf 
            @foreach (request()->all() as $key => $item)
                <input type="hidden" name="{{ $key }}" value="{{ $item }}">
            @endforeach
            <h2>Xác nhận thông tin</h2>
            <ul style="list-style:none">
                <li>Chương trình: <p class="fw-bold">{{ $ticket->name }}</p> </li>
                <li>Khung giờ: <p class="fw-bold">{{ $ticket->times->find(request('time'))->time }}</p> </li>
                <li>Loại vé: <p class="fw-bold">{{ $ticket->types->find(request('type'))->name }} {{ formatVND($ticket->types->find(request('type'))->pivot->price) }}</p> </li>
            </ul>
            <input type="text" name="fullname" placeholder="Họ và tên" class="form-control" required>
            <input type="text" name="phone" placeholder="Số điện thoại" class="form-control" required>
            <button class="btn">Xác nhận</button>
        </form>
    </div>
</main>
@endsection