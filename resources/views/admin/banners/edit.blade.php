@extends('layout.admin')
@section('title')
@section('content')
<div class="container">

    <h2>Chỉnh sửa thông tin banner</h2>

    <form method="post" action="{{route('admin.banners.update',$banners->id)}}" enctype="multipart/form-data">
        @csrf

        @method('PUT')
        <div class="mb-3">
            <label for="tieu_de" class="form-label">Tên banner</label>
            <input type="text" name="tieu_de" class="form-control @error('tieu_de') is-invalid @enderror" placeholder="...."

            value="{{old('tieu_de',$banners->tieu_de)}}"
            >
            @error('tieu_de')
                <p class="text-danger">{{$message}}</p>
            @enderror


        </div>





        <div class="mb-3">
            <label for="duong_dan_anh" class="form-label">Ảnh banner</label>
            <input type="file" name="duong_dan_anh" class="form-control @error('duong_dan_anh') is-invalid @enderror" placeholder="link ảnh.."
            >
            {{-- Hiển thị ảnh cũ nếu có --}}
            @if(!empty($banners->duong_dan_anh))
                <img src="{{ asset('storage/' . $banners->duong_dan_anh) }}" alt="Ảnh cũ" width="60px" class="d-block mt-2">
            @endif

            @error('duong_dan_anh')
                <p class="text-danger">{{$message}}</p>
            @enderror

        </div>






        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="trang_thai" id="" class="form-select">
                <option value="" selected>--Trạng thái--</option>
                <option value="0" {{ request('trang_thai') }} >Hiện</option>
                <option value="1" {{ request('trang_thai') }} >Ẩn</option>
            </select>

        </div>

        <div class="mb-3">
            <label for="mo_ta" class="form-label">Mô tả banner</label>
            <textarea name="mo_ta" id="" rows="5" class="form-control" value="{{old('mo_ta',$banners->mo_ta)}}"
            ></textarea>



        </div>


        <button type="submit" class="btn btn-primary">Thêm banner</button>
    </form>


</div>
@endsection
