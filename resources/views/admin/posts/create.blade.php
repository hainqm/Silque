@extends('layout.admin')
@section('title')
@section('content')
<div class="container">

    <h2>Thêm post</h2>

    <form method="post" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="tieu_de" class="form-label">Tên post</label>
            <input type="text" name="tieu_de" class="form-control @error('tieu_de') is-invalid @enderror" placeholder="...."

            value="{{old('tieu_de')}}"
            >
            @error('tieu_de')
                <p class="text-danger">{{$message}}</p>
            @enderror


        </div>

        <div class="mb-3">
            <label for="tac_gia" class="form-label">Tên tác giả</label>
            <input type="text" name="tac_gia" class="form-control @error('tac_gia') is-invalid @enderror" placeholder="...."

            value="{{old('tac_gia')}}"
            >
            @error('tac_gia')
                <p class="text-danger">{{$message}}</p>
            @enderror


        </div>





        <div class="mb-3">
            <label for="anh_bai_viet" class="form-label">Ảnh post</label>
            <input type="file" name="anh_bai_viet" class="form-control @error('anh_bai_viet') is-invalid @enderror" placeholder="link ảnh.."

            value="{{old('anh_bai_viet')}}"
            >

            @error('anh_bai_viet')
                <p class="text-danger">{{$message}}</p>
            @enderror

        </div>



        <div class="mb-3">
            <label for="mo_ta" class="form-label">Mô tả post</label>
            <textarea name="mo_ta" id="" rows="5" class="form-control"
            ></textarea>

        </div>


        <button type="submit" class="btn btn-primary">POST</button>
    </form>


</div>
@endsection
