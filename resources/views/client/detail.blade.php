@extends('layout.app')
@section('title', $product->ten_san_pham)
@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow">
                <div class="row g-0">
                    <!-- Ảnh sản phẩm -->
                    <div class="col-md-6">
                        @if($product->anh)
                            <img src="{{ asset('storage/' . $product->anh) }}"
                                 class="img-fluid rounded-start w-100"
                                 style="max-height: 400px; object-fit: cover;"
                                 alt="{{ $product->ten_san_pham }}">
                        @else
                            <div class="bg-secondary text-white text-center p-5">Không có ảnh</div>
                        @endif
                    </div>

                    <!-- Thông tin chi tiết -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <h4 class="card-title">{{ $product->ten_san_pham }}</h4>
                            <p class="card-text mb-2">
                                <strong>Mã sản phẩm:</strong> {{ $product->ma_san_pham }}<br>
                                <strong>Danh mục:</strong> {{ $product->category->ten_danh_muc ?? 'Không có' }}<br>
                                <strong>Giá:</strong>
                                @if($product->gia_khuyen_mai)
                                    <span class="text-danger fw-bold">{{ number_format($product->gia_khuyen_mai, 0, ',', '.') }} đ</span>
                                    <small class="text-muted text-decoration-line-through ms-2">{{ number_format($product->gia, 0, ',', '.') }} đ</small>
                                @else
                                    <span class="fw-bold">{{ number_format($product->gia, 0, ',', '.') }} đ</span>
                                @endif
                                <br>
                                <strong>Số lượng:</strong> {{ $product->so_luong }}<br>
                                <strong>Ngày nhập:</strong> {{ \Carbon\Carbon::parse($product->ngay_nhap)->format('d/m/Y') }}<br>
                                <strong>Trạng thái:</strong>
                                <span class="badge {{ $product->trang_thai ? 'bg-success' : 'bg-danger' }}">
                                    {{ $product->trang_thai ? 'Còn hàng' : 'Hết hàng' }}
                                </span>
                            </p>

                            <hr>
                            <p><strong>Mô tả sản phẩm:</strong><br>{{ $product->mo_ta }}</p>

                            <a href="{{ route('list') }}" class="btn btn-outline-primary mt-3">
                                <i class="fas fa-arrow-left"></i> Quay lại danh sách
                            </a>
                        </div>
                    </div>
                </div> <!-- end row g-0 -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- end container -->

<!-- Sản phẩm cùng danh mục -->

<h3 class="mb-4">Sản phẩm tương tự</h3>
<div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4">
    @foreach($relatedProducts as $item)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <a href="{{ route('detail', $item->id) }}" class="text-decoration-none text-dark">
                    <img src="{{ asset('storage/' . $item->anh) }}" class="card-img-top" alt="{{ $item->ten_san_pham }}" style="height: 150px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title mb-2" style="font-size: 1rem;">{{ $item->ten_san_pham }}</h5>
                        <p class="card-text text-danger fw-bold">{{ number_format($item->gia_khuyen_mai) }} VNĐ</p>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>


@endsection
