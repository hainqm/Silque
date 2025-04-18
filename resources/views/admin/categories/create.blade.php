@extends('layout.admin')
@section('title')
@section('content')
<div class="container">

    <h2>Thêm danh mục</h2>

    <form method="post" action="{{route('admin.categories.store')}}" >
        @csrf

        <div class="mb-3">
            <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
            <input type="text" name="ten_danh_muc" class="form-control @error('ten_danh_muc') is-invalid @enderror" placeholder="...."

            value="{{old('ten_danh_muc')}}"
            >
            @error('ten_danh_muc')
                <p class="text-danger">{{$message}}</p>
            @enderror


        </div>



        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="trang_thai" id="" class="form-select">
                <option value="" selected>--Trạng thái--</option>
                <option value="0" {{ request('trang_thai') }} >Ngưng hoạt động</option>
                <option value="1" {{ request('trang_thai') }} >Hoạt động</option>
            </select>

        </div>



        <button type="submit" class="btn btn-secondary">Thêm danh mục</button>
    </form>


</div>
@endsection
