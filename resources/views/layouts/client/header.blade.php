<header>
    <div class="header-top">
        <div class="logo-main">
            <img src="{{ asset($setting->logo) }}" alt="">
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <input id="checkNav" type="checkbox"/>
            <label for="checkNav"><i class="fas fa-align-justify"></i></label>
            <nav>
                <ul class="navbar">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                    <li><a href="{{ route('ticket.list') }}">Chương trình</a></li>
                    <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                    <li><a href="{{ route('author') }}">Tác giả</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>