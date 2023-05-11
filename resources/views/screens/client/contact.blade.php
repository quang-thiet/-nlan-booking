@extends('layouts.client.master')

@section('title', 'Liên hệ')

@section('content')
<main>
    <div class="container">
        @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <section class="contact">
            <div class="form-contact">
                <ul>
                    <li><span><i class="fas fa-map-marker-alt"></i></span> {{ $setting->address }}</li>
                    <li><span><i class="fas fa-mobile-alt"></i></span> {{ $setting->phone }}</li>
                    <li><span><i class="far fa-envelope"></i></span> {{ $setting->email }}</li>
                </ul>
                <div class="form_input">
                    <p style="font-size: large;font-weight: 500;margin: 10px 0;">Liên hệ với chúng tôi</p>
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <input type="text" name="fullname" placeholder="Họ và tên" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <textarea placeholder="Nội dung" name="message" rows="10" required></textarea>
                        <button class="btn" type="submit">Gửi liên hệ</button>
                    </form>
                </div>
            </div>
            <div class="maps">
                <iframe src="{{ $setting->map }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </section>
    </div>
</main>
@endsection