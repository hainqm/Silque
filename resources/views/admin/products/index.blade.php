@extends('layout.admin')
@section('title')
@section('content')
<div class="container">
    <h2>Danh sách sản phẩm</h2>

    <a href="{{ route('admin.products.create') }}" class="btn btn-success my-2">Thêm sản phẩm</a>

    @if(@session('success'))
        <div class="alert alert-success">
            {{session('success')}}
            </div>

    @endif
    <!-- Form tìm kiếm -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-search"></i> Tìm kiếm sản phẩm</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.products.index') }}">
                <div class="row g-3">
                    <!-- Mã sản phẩm -->
                    <div class="col-md-3">
                        <label class="form-label">Mã sản phẩm</label>
                        <input type="text" name="ma_san_pham" class="form-control" placeholder="Nhập mã sản phẩm"
                            value="{{ request('ma_san_pham') }}">
                    </div>

                    {{-- Tên sản phẩm --}}
                    <div class="col-md-3">
                        <label class="form-label">Tên sản phẩm</label>
                        <input type="text" name="ten_san_pham" class="form-control" placeholder="Nhập Tên sản phẩm"
                            value="{{ request('ten_san_pham') }}">
                    </div>

                    {{-- Tên danh mục --}}
                    <div class="col-md-3">
                        <label class="form-label">Danh mục</label>
                        <select name="ten_danh_muc" id="" class="form-select">
                            <option value="*" selected>Chọn danh mục</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id }}>
                                    {{ $category->ten_danh_muc }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Trạng thái  --}}
                    <div class="col-md-3">
                        <label class="form-label">Trạng thái</label>
                        <select name="trang_thai" id="" class="form-select">
                            <option value="" selected>Trạng thái</option>
                            <option value="0" {{ request('trang_thai') }} >Hết hàng</option>
                            <option value="1" {{ request('trang_thai') }} >Còn hàng</option>
                        </select>
                    </div>


                    {{-- Tìm kiếm theo khoảng giá --}}
                    <div class="col-md-3">
                        <label class="form-label">Khoảng giá</label>
                        <input type="number" name="gia_min" class="form-control" placeholder="Nhập giá min" value="{{ request('gia_min') }}"> <br>
                        <input type="number" name="gia_max" class="form-control" placeholder="Nhập giá max" value="{{ request('gia_max') }}">
                    </div>




                    {{-- Tìm kiếm theo ngày nhập --}}
                    <div class="col-md-3">
                        <label class="form-label">Ngày nhập</label>
                        <input type="date" name="ngay_nhap_tu" class="form-control" value="{{ request('ngay_nhap_tu') }}"><br>
                        <input type="date" name="ngay_nhap_den" class="form-control" value="{{ request('ngay_nhap_den') }}">
                    </div>





                    <!-- Nút tìm kiếm & Làm mới -->
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100 me-1">
                            <i class="fas fa-search"></i> Tìm kiếm
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary w-100 ms-1">
                            <i class="fas fa-sync"></i> Làm mới
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Giá khuyến mại</th>
                <th>Ảnh sản phẩm</th>
                <th>Số lượng</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Ngày nhập</th>
                <th>ACT</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->ma_san_pham }}</td>
                <td>{{ $product->ten_san_pham }}</td>
                <td>{{ $product->category->ten_danh_muc ?? 'Không có danh mục' }}</td>
                <td>{{ $product->gia }} VND</td>
                <td>{{ $product->gia_khuyen_mai }} VND</td>
                <td>
                    @if($product->anh)
                    <img src="{{asset('storage/' .$product->anh)}}" alt="{{$product->ten_san_pham}}" width="60px">
                    @else
                        Không có ảnh
                    @endif
                </td>
                <td>{{ $product->so_luong}}</td>
                <td>{{ $product->mo_ta }}</td>
                <td>
                    <span class="badge {{ $product->trang_thai ? 'bg-success' : 'bg-danger' }}">
                        {{ $product->trang_thai ? 'Còn hàng' : 'Hết hàng' }}
                    </span>
                </td>
                <td>{{ $product->ngay_nhap }}</td>
                <td>
                    <a href="{{route('admin.products.show',$product->id)}}" class="btn btn-primary">Xem</a>
                    <a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-warning my-3">Sửa</a>

                    <form action="{{route('admin.products.destroy',$product->id)}}" method="post" onsubmit="return confirm('Bạn xoá à???')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ">Xoá</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection
