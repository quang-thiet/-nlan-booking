@extends('layouts.client.master')

@section('title', $ticket->name)

@section('content')
<main>
    <div class="container">
        <div class="ticket-detail-col">
            <div class="ticket-detail__thumbnail">
                <img src="{{ asset($ticket->thumbnail) }}">
            </div>
            <form action="{{ route('checkout') }}">
                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                <div class="ticket-detail__info">
                    <h2 class="ticket-detail__name">
                        {{ $ticket->name }}
                    </h2>
                    <p class="ticket-detail__description">
                        {{ $ticket->description }}
                    </p>
                    <p>Danh mục: {{ $ticket->category->name }}</p>
                    <select name="time" class="form-control select-time">
                        <option value="">Chọn thời gian</option>
                        @foreach ($ticket->times as $time)
                        <option value="{{ $time->id }}">{{ $time->time }}</option>
                        @endforeach
                    </select>
                    <p class="text-danger"></p>
                    <select name="type" class="form-control select-type">
                        <option value="">Chọn loại vé</option>
                        @foreach ($ticket->types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }} : {{ formatVND($type->pivot->price) }}</option>
                        @endforeach
                    </select>
                    <p class="text-danger"></p>
                    <button class="btn btn-buy"><i class="fas fa-cart-plus"></i> đặt vé</button>
                </div>
            </form>
        </div>   
        <div class="ticket-content">
            <p class="ticket-content__title"><span>nội dung</span></p>
            <p class="ticket-content__detail">
                {!! $ticket->content !!}
            </p>
        </div>
    </div>
</main>
@endsection

@section('custom-js-tag')
    <script>
        $(document).ready(function(){
            $('select').change(function(){
                $(this).next('.text-danger').text('')
            })

            $('.btn.btn-buy').click(function(e) {
                e.preventDefault()

                let flag = true

                if ($('.select-time').val() == '') {
                    $('.select-time').next('.text-danger').text('Vui lòng chọn thời gian')
                    flag = false
                }

                if ($('.select-type').val() == '') {
                    $('.select-type').next('.text-danger').text('Vui lòng chọn loại vé')
                    flag = false
                }

                if (flag) $('form').submit()
            })
        })
    </script>
@endsection