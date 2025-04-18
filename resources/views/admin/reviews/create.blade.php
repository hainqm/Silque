@extends('layout.admin')
@section('title')
@section('content')
<div class="container">

    <h2>Thêm đánh giá</h2>

    <form method="post" action="{{route('admin.reviews.store')}}" >
        @csrf

        <div class="mb-3">
            <label for="ten_nguoi_dung" class="form-label">Tên người dùng</label>
            <input type="text" name="ten_nguoi_dung" class="form-control @error('ten_nguoi_dung') is-invalid @enderror" placeholder="...."

            value="{{old('ten_nguoi_dung')}}"
            >
            @error('ten_nguoi_dung')
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



        <div class="col-md-3">
            <label class="form-label">Số sao</label>
            <select name="so_sao" id="" class="form-select">
                <option value="" selected>Số sao</option>
                <option value="1" {{ request('so_sao') }} >1</option>
                <option value="2" {{ request('so_sao') }} >2</option>
                <option value="3" {{ request('so_sao') }} >3</option>
                <option value="4" {{ request('so_sao') }} >4</option>
                <option value="5" {{ request('so_sao') }} >5</option>

            </select>
        </div>


        <div class="mb-3">
            <label for="noi_dung_danh_gia" class="form-label">Nội dung đánh giá</label>
            <textarea name="noi_dung_danh_gia" id="" rows="5" class="form-control"
           
            >{{old('noi_dung_danh_gia')}}</textarea>
            @error('noi_dung_danh_gia')
                <p class="text-danger">{{$message}}</p>
            @enderror

        </div>




        <button type="submit" class="btn btn-secondary">Thêm danh mục</button>
    </form>


</div>
@endsection
