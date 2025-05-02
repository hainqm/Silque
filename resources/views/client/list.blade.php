@extends('layout.app')
@section('title', 'Danh sách sản phẩm')

@section('content')
<style>
    /* Animation hiển thị sản phẩm */
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: none;
        }
    }

    .card-product:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
        transition: 0.3s ease;
    }
</style>

<div class="container">

    <!-- Form tìm kiếm -->
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-semibold text-primary">
                <i class="fas fa-filter me-2"></i>Bộ lọc sản phẩm
            </h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('list') }}">
                <div class="row gy-3 gx-4">

                    <!-- Tên sản phẩm -->
                    <div class="col-md-4">
                        <label class="form-label">Tên sản phẩm</label>
                        <input type="text" name="ten_san_pham" class="form-control"
                               placeholder="Nhập tên sản phẩm..."
                               value="{{ request('ten_san_pham') }}">
                    </div>

                    <!-- Danh mục -->
                    <div class="col-md-4">
                        <label class="form-label">Danh mục</label>
                        <select name="category_id" class="form-select">
                            <option value="">-- Tất cả --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->ten_danh_muc }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Khoảng giá -->
                    <div class="col-md-4">
                        <label class="form-label">Khoảng giá (VNĐ)</label>
                        <div class="input-group">
                            <input type="number" name="gia_min" class="form-control" placeholder="Từ"
                                   value="{{ request('gia_min') }}">
                            <span class="input-group-text">-</span>
                            <input type="number" name="gia_max" class="form-control" placeholder="Đến"
                                   value="{{ request('gia_max') }}">
                        </div>
                    </div>

                    <!-- Nút tìm kiếm -->
                    <div class="col-12 d-flex justify-content-end gap-2 mt-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search me-1"></i> Tìm kiếm
                        </button>
                        <a href="{{ route('list') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-sync-alt me-1"></i> Làm mới
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <!-- Danh sách sản phẩm -->
    <section class="all-products my-5">
        <div class="container">
            <h2 class="mb-4 text-center fw-bold text-dark">Tất cả sản phẩm</h2>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach($products as $index => $product)
                    <div class="col fade-in" style="animation-delay: {{ $index * 0.1 }}s">
                        <div class="card card-product h-100 shadow-sm border-0">
                            @if($product->anh)
                                <img src="{{ asset('storage/' . $product->anh) }}"
                                     class="card-img-top"
                                     alt="{{ $product->ten_san_pham }}"
                                     style="height: 180px; object-fit: cover;">
                            @else
                                <div class="bg-light text-center text-muted py-5">Không có ảnh</div>
                            @endif

                            <div class="card-body">
                                <h6 class="fw-semibold">{{ $product->ten_san_pham }}</h6>
                                <p class="text-danger fw-bold mb-1">
                                    {{ number_format($product->gia_khuyen_mai ?? $product->gia, 0, ',', '.') }} đ
                                </p>
                                @if($product->gia_khuyen_mai)
                                    <small class="text-muted text-decoration-line-through">
                                        {{ number_format($product->gia, 0, ',', '.') }} đ
                                    </small>
                                @endif
                                <p class="mt-2 text-muted small">
                                    {{ Str::limit($product->mo_ta, 80) }}
                                </p>
                            </div>

                            <div class="card-footer bg-transparent border-0">
                                <a href="{{ route('detail', $product->id) }}"
                                   class="btn btn-outline-primary btn-sm w-100">
                                    Xem chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </section>

</div>
@endsection
