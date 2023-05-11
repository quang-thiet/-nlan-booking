@extends('layouts.client.master')

@section('title', 'Liên hệ')

@section('content')
<main>
    <div class="container">
        <p class="title" style="color: var(--RED-MAIN)">Đặt vé.</p>
        <form action="">
            <p class="item-title__info">Vở kịch</p>
            <div class="item-info__list">
                <div class="item-book">
                    <input type="radio" name="name" id="name1">
                    <label for="name1">Kịch bản 1</label>
                </div>
                <div class="item-book">
                    <input type="radio" name="name" id="name2">
                    <label for="name2">Kịch bản 1</label>
                </div>
                <div class="item-book">
                    <input type="radio" name="name" id="name3">
                    <label for="name3">Kịch bản 1</label>
                </div>
                <div class="item-book">
                    <input type="radio" name="name" id="name4">
                    <label for="name4">Kịch bản 1</label>
                </div>
                <div class="item-book">
                    <input type="radio" name="name" id="name5">
                    <label for="name5">Kịch bản 1</label>
                </div>
            </div>
            <p class="item-title__info">Thời gian</p>
            <div class="item-info__list">
                <div class="item-book">
                    <input type="radio" name="name1" id="name1_1">
                    <label for="name1_1">Kịch bản 1</label>
                </div>
                <div class="item-book">
                    <input type="radio" name="name1" id="name1_2">
                    <label for="name1_2">Kịch bản 1</label>
                </div>
                <div class="item-book">
                    <input type="radio" name="name1" id="name1_3">
                    <label for="name1_3">Kịch bản 1</label>
                </div>
                <div class="item-book">
                    <input type="radio" name="name1" id="name1_4">
                    <label for="name1_4">Kịch bản 1</label>
                </div>
                <div class="item-book">
                    <input type="radio" name="name1" id="name1_5">
                    <label for="name1_5">Kịch bản 1</label>
                </div>
            </div>
            <p class="item-title__info">Loại vé</p>
            <div class="item-info__list">
                <div class="item-book">
                    <input type="radio" name="name2" id="name2_1">
                    <label for="name2_1">Kịch bản 1</label>
                </div>
                <div class="item-book">
                    <input type="radio" name="name2" id="name2_2">
                    <label for="name2_2">Kịch bản 1</label>
                </div>
                <div class="item-book">
                    <input type="radio" name="name2" id="name2_3">
                    <label for="name2_3">Kịch bản 1</label>
                </div>
                <div class="item-book">
                    <input type="radio" name="name2" id="name2_4">
                    <label for="name2_4">Kịch bản 1</label>
                </div>
                <div class="item-book">
                    <input type="radio" name="name2" id="name2_5">
                    <label for="name2_5">Kịch bản 1</label>
                </div>
            </div>
            <button class="book-item" style="background: #fff;
            display: block;
            margin: 40px auto;">Đặt vé</button>
        </form>
    </div>
</main>
@endsection