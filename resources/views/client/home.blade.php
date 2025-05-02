@extends('layout.app')

@section('title', 'Trang chủ')

@section('content')
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    /* Cài đặt hiệu ứng chung */
    .fade-in {
        animation: fadeInUp 0.6s ease-in-out both;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .section-title {
        font-weight: 600;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    /* Card sản phẩm và bài viết */
    .product-card, .post-card {
        transition: all 0.3s ease;
        overflow: hidden;
        border-radius: 12px;
        background-color: #fff;
    }

    .product-card:hover, .post-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 18px rgba(0,0,0,0.1);
    }

    .post-thumb, .product-image {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .product-title, .post-title {
        font-size: 1rem;
        font-weight: 600;
        color: #333;
    }

    .product-price, .post-link {
        color: #007bff;
        font-size: 0.875rem;
    }

    .product-price {
        font-weight: bold;
    }

    .text-muted-sm {
        font-size: 0.9rem;
        color: #6c757d;
    }

    /* Hiệu ứng hover cho bài viết */
    .post-link:hover {
        text-decoration: underline;
    }
</style>

{{-- Banner --}}
<section class="mb-5">
    <div class="swiper">
        <div class="swiper-wrapper">
            @foreach($banners as $banner)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $banner->duong_dan_anh) }}"
                         alt="{{ $banner->title }}"
                         class="img-fluid w-100"
                         style="height: 450px; object-fit: cover;">
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper', {
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>

{{-- Sản phẩm mới --}}
<section class="container mb-5 fade-in">
    <h2 class="section-title">Sản phẩm mới nhất</h2>
    <div class="row g-4">
        @foreach($newProducts as $product)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="product-card shadow-sm rounded-3 bg-white h-100 p-2">
                    <img src="{{ asset('storage/' . $product->anh) }}" class="product-image w-100 rounded-2 mb-2">
                    <div>
                        <h6 class="product-title mb-1">{{ $product->ten_san_pham }}</h6>
                        <p class="product-price text-danger mb-2">{{ number_format($product->gia, 0, ',', '.') }} đ</p>
                        <a href="{{ route('detail', $product->id) }}" class="btn btn-sm btn-outline-secondary w-100">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- Bài viết mới --}}
<section class="container mb-5 fade-in">
    <h2 class="section-title">Bài viết mới</h2>
    <div class="row g-4">
        @foreach($newPosts as $post)
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('post_detail', $post->id) }}" class="text-decoration-none">
                    <div class="post-card shadow-sm h-100">
                        @if($post->anh)
                            <img src="{{ asset('storage/' . $post->anh) }}" alt="{{ $post->tieu_de }}" class="post-thumb w-100">
                        @endif
                        <div class="p-3">
                            <h6 class="post-title">{{ $post->tieu_de }}</h6>
                            <p class="text-muted-sm mb-2">{{ Str::limit(strip_tags($post->noi_dung), 80) }}</p>
                            <span class="post-link">Xem chi tiết →</span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>

{{-- Đánh giá nổi bật --}}
<section class="container mb-5 fade-in">
    <h2 class="section-title">Đánh giá nổi bật</h2>
    <div class="row g-3">
        @foreach($topReviews as $review)
            <div class="col-md-6">
                <div class="bg-white p-3 rounded-2 shadow-sm h-100">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-semibold">{{ $review->ten_nguoi_dung ?? 'Ẩn danh' }}</span>
                        <div class="text-warning">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="{{ $i <= $review->so_sao ? 'fas' : 'far' }} fa-star"></i>
                            @endfor
                        </div>
                    </div>
                    <p class="mb-0 text-muted"><em>{{ Str::limit($review->noi_dung_danh_gia, 100) }}</em></p>
                </div>
            </div>
        @endforeach
    </div>
</section>

@endsection
