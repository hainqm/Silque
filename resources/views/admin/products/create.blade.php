@extends('layout.admin')
@section('title')
@section('content')
<div class="container">

    <h2>Thêm sản phẩm</h2>

    <form method="post" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="ma_san_pham" class="form-label">Mã sản phẩm</label>
            <input type="text" name="ma_san_pham" class="form-control @error('ma_san_pham') is-invalid @enderror" placeholder="...."


            value="{{old('ma_san_pham')}}"
            >
            @error('ma_san_pham')
                <p class="text-danger">{{$message}}</p>
            @enderror

        </div>
        <div class="mb-3">
            <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
            <input type="text" name="ten_san_pham" class="form-control @error('ten_san_pham') is-invalid @enderror" placeholder="...."

            value="{{old('ten_san_pham')}}"
            >
            @error('ten_san_pham')
                <p class="text-danger">{{$message}}</p>
            @enderror


        </div>

        <div class="mb-3">
            <label class="form-label">Danh mục</label>
            <select name="category_id" id="" class="form-select">
                <option value="*" selected>--Chọn danh mục--</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id }}>
                        {{ $category->ten_danh_muc }}
                    </option>
                @endforeach
            </select>

        </div>

        <div class="mb-3">
            <label for="so_luong" class="form-label">Số lượng</label>
            <input type="number" name="so_luong" class="form-control @error('so_luong') is-invalid @enderror" placeholder="number" min="0"

            value="{{old('so_luong')}}"
            >
            @error('so_luong')
                <p class="text-danger">{{$message}}</p>
            @enderror


        </div>

        <div class="mb-3">
            <label for="anh" class="form-label">Ảnh sản phẩm</label>
            <input type="file" name="anh" class="form-control @error('anh') is-invalid @enderror" placeholder="link ảnh.."

            value="{{old('anh')}}"
            >
            {{-- @if($products->anh)
                    <img src="{{asset('storage/' .$products->anh)}}" alt="{{$products->ten_san_pham}}" width="60px">
                    @else
                        Không có ảnh
                    @endif --}}
            @error('anh')
                <p class="text-danger">{{$message}}</p>
            @enderror

        </div>


        <div class="mb-3">
            <label for="gia" class="form-label">Giá</label>
            <input type="text" name="gia" class="form-control @error('gia') is-invalid @enderror" placeholder="...."

            value="{{old('gia')}}">
            @error('gia')
                <p class="text-danger">{{$message}}</p>
            @enderror


        </div>

        <div class="mb-3">
            <label for="gia_khuyen_mai" class="form-label">Giá khuyến mại</label>
            <input type="text" name="gia_khuyen_mai" class="form-control @error('gia_khuyen_mai') is-invalid @enderror" placeholder="...."

            value="{{old('gia_khuyen_mai')}}">
            @error('gia_khuyen_mai')
                <p class="text-danger">{{$message}}</p>
            @enderror


        </div>

        <div class="mb-3">
            <label for="ngay_nhap" class="form-label">Ngày nhập</label>
            <input type="date" name="ngay_nhap" class="form-control @error('ngay_nhap') is-invalid @enderror" placeholder="...."

            value="{{old('ngay_nhap')}}">
            @error('ngay_nhap')
                <p class="text-danger">{{$message}}</p>
            @enderror


        </div>

        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="trang_thai" id="" class="form-select">
                <option value="" selected>--Trạng thái--</option>
                <option value="0" {{ request('trang_thai') }} >Hết hàng</option>
                <option value="1" {{ request('trang_thai') }} >Còn hàng</option>
            </select>

        </div>

        <div class="mb-3">
            <label for="mo_ta" class="form-label">Mô tả sản phẩm</label>
            <textarea name="mo_ta" id="" rows="5" class="form-control"
            ></textarea>



        </div>


        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>


</div>
@endsection
