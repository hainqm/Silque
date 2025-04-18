@extends('layout.app')

@section('title', 'Trang chủ')

@section('content')
    {{-- <div class="text-center">
        <h1>Chào mừng đến với ShopOnline</h1>
        <p>Mua sắm dễ dàng với hàng ngàn sản phẩm chất lượng!</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Xem Sản Phẩm</a>
    </div> --}}

    {{-- Banner --}}
    <!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<section class="banner" style="max-width: 1000px; margin: auto;">
    <div class="swiper">
        <div class="swiper-wrapper">
            @foreach($banners as $banner)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $banner->duong_dan_anh) }}"
                         alt="{{ $banner->title }}"
                         style="width: 100%; height: 500px; object-fit: cover;">
                </div>
            @endforeach
        </div>

        <!-- Navigation & pagination -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    const swiper = new Swiper('.swiper', {
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>



    {{-- Sản phẩm mới --}}

<section class="home-content my-5">
    <div class="container">
        <div class="row">
            <!-- Cột sản phẩm: chiếm 8/12 -->
            <div class="col-lg-8">
                <h2 class="mb-4">Sản phẩm mới nhất</h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                    @foreach($newProducts as $product)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <img src="{{ asset('storage/' . $product->anh) }}"
                                     class="card-img-top"
                                     alt="{{ $product->name }}"
                                     style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text text-danger fw-bold">
                                        {{ number_format($product->gia, 0, ',', '.') }} đ
                                    </p>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <a href="{{route('detail',$product->id)}}" class="btn btn-sm btn-outline-primary w-100">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Cột bài viết: chiếm 4/12 -->
            {{-- Bài viết mới --}}
            <div class="col-lg-4">
                <h2 class="mb-4">Bài viết mới</h2>
                <div class="list-group">
                    @foreach($newPosts as $post)
                        {{-- <a href="{{ route('posts.show', $post->id) }}" class="list-group-item list-group-item-action">
                            {{ $post->title }}
                        </a> --}}
                        <a class="list-group-item list-group-item-action" href="{{ route('post_detail', $post->id) }}">
                            <h5>{{$post->tieu_de}}</h5>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>






    {{-- Đánh giá nổi bật --}}
    <section class="top-reviews my-5">
    <div class="container">
        <h2 class="mb-4">Đánh giá nổi bật</h2>
        <div class="list-group">
            @foreach($topReviews as $review)
                <div class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <strong>{{ $review->ten_nguoi_dung ?? 'Ẩn danh' }}</strong>
                        <div class="text-warning">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $review->so_sao)
                                    <i class="fas fa-star"></i>

                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <p class="mb-0 text-muted mt-1"><em>{{ Str::limit($review->noi_dung_danh_gia, 100) }}</em></p>

                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
