<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang chủ - Silque')</title>

    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .navbar {
            padding-top: 1rem;
            padding-bottom: 1rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.5rem;
            color: #0d6efd !important;
        }

        .nav-link {
            color: #333 !important;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: #0d6efd !important;
        }

        footer {
            background-color: #f1f1f1;
            color: #555;
            font-size: 0.95rem;
            padding: 2rem 0;
        }

        footer h5 {
            font-weight: 600;
            margin-bottom: 1rem;
        }

        footer ul {
            padding-left: 0;
            list-style: none;
        }

        footer ul li {
            margin-bottom: 0.5rem;
        }

        footer a {
            color: #555;
            text-decoration: none;
        }

        footer a:hover {
            color: #0d6efd;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">🛒 Silque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto align-items-center gap-2">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('list') }}">Sản phẩm</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('post') }}">Bài viết</a></li>

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Đăng xuất</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Đăng nhập</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Đăng ký</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Nội dung chính -->
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row text-start">
                <div class="col-md-4 mb-4">
                    <h5>Về Silque</h5>
                    <p>Silque là nền tảng mua sắm trực tuyến hiện đại, cung cấp hàng ngàn sản phẩm chất lượng với giá tốt mỗi ngày.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Liên hệ</h5>
                    <ul>
                        <li><i class="fas fa-phone-alt me-2"></i> 0123 456 789</li>
                        <li><i class="fas fa-envelope me-2"></i> support@silque.vn</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> 123 Nguyễn Huệ, Q1, TP.HCM</li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Liên kết nhanh</h5>
                    <ul>
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><a href="{{ route('list') }}">Sản phẩm</a></li>
                        <li><a href="{{ route('post') }}">Bài viết</a></li>
                        <li><a href="{{ route('login') }}">Tài khoản</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-4 border-top pt-3">
                &copy; {{ date('Y') }} Silque. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
