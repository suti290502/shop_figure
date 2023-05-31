<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Web bán figure</title>
    <!-- Định nghĩa các tài nguyên CSS và JS cần thiết -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <header>
        <!-- Hiển thị logo, thanh tìm kiếm, giỏ hàng, đăng nhập, đăng ký -->
        <nav>
            <!-- Logo -->
            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a>

            <!-- Thanh tìm kiếm -->
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="keyword" placeholder="Tìm kiếm...">
                <button type="submit">Tìm kiếm</button>
            </form>

            <!-- Giỏ hàng -->
            <a href="{{ route('cart') }}">Giỏ hàng</a>

            <!-- Đăng nhập và đăng ký -->
            @if (Auth::check())
                <a href="{{ route('logout') }}">Đăng xuất</a>
            @else
                <a href="{{ route('login') }}">Đăng nhập</a>
                <a href="{{ route('register') }}">Đăng ký</a>
            @endif
        </nav>
    </header>

    <!-- Hiển thị nội dung chính của trang -->
    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Hiển thị footer -->
        <p>Bản quyền © {{ date('Y') }} Web bán figure. Tất cả các quyền được bảo lưu.</p>
    </footer>
</body>
</html>
