@extends('layout.app')
@section('title')
@section('content')
<div class="container">



    <!-- Form tìm kiếm nâng cao -->
<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-search me-2"></i>Tìm kiếm & Lọc sản phẩm</h5>
    </div>

    <div class="card-body">
        <form method="GET" action="{{ route('list') }}">
            <div class="row gy-3 gx-4">

                {{-- Tên sản phẩm --}}
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tên sản phẩm</label>
                    <input type="text" name="ten_san_pham" class="form-control"
                           placeholder="search..."
                           value="{{ request('ten_san_pham') }}">
                </div>

                {{-- Danh mục --}}
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Danh mục</label>
                    <select name="category_id" class="form-select">
                        <option value="">-- Tất cả danh mục --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->ten_danh_muc }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Khoảng giá --}}
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Khoảng giá (VNĐ)</label>
                    <div class="input-group">
                        <input type="number" name="gia_min" class="form-control" placeholder="Từ"
                               value="{{ request('gia_min') }}">
                        <span class="input-group-text">-</span>
                        <input type="number" name="gia_max" class="form-control" placeholder="Đến"
                               value="{{ request('gia_max') }}">
                    </div>
                </div>

                {{-- Nút tìm kiếm & làm mới --}}
                <div class="col-12 d-flex justify-content-end gap-2 mt-3">
                    <button type="submit" class="btn btn-success">
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

    <section class="all-products my-5">
    <div class="container">
        <h2 class="mb-4 text-center">Tất cả sản phẩm</h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
            @foreach($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        @if($product->anh)
                            <img src="{{ asset('storage/' . $product->anh) }}"
                                 class="card-img-top"
                                 alt="{{ $product->ten_san_pham }}"
                                 style="height: 160px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white text-center py-5">Không có ảnh</div>
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->ten_san_pham }}</h5>
                            <p class="card-text text-danger fw-bold">
                                {{ number_format($product->gia_khuyen_mai ?? $product->gia, 0, ',', '.') }} đ
                            </p>
                            @if($product->gia_khuyen_mai)
                                <small class="text-muted text-decoration-line-through">
                                    {{ number_format($product->gia, 0, ',', '.') }} đ
                                </small>
                            @endif
                           <p class="mt-1 text-muted">
                                {{ Str::limit($product->mo_ta, 100) }}
                            </p>
                        </div>

                        <div class="card-footer bg-transparent">
                            <a href="{{route('detail',$product->id)}}" class="btn btn-sm btn-outline-primary w-100">Xem chi tiết</a>
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
