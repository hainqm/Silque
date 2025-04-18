@extends('layout.admin')
@section('title')
@section('content')
<div class="container">

    <h2>++ Contact</h2>

    <form method="post" action="{{route('admin.contacts.update',$contacts->id)}}" >
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="viet_danh" class="form-label">Viết danh</label>
            <input type="text" name="viet_danh" class="form-control @error('viet_danh') is-invalid @enderror" placeholder="...."

            value="{{old('viet_danh',$contacts->viet_danh)}}"
            >
            @error('viet_danh')
                <p class="text-danger">{{$message}}</p>
            @enderror


        </div>



        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="...."

            value="{{old('email',$contacts->email)}}"
            >
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror


        </div>

        <div class="mb-3">
            <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
            <input type="text" name="so_dien_thoai" class="form-control @error('so_dien_thoai') is-invalid @enderror" placeholder="...."

            value="{{old('so_dien_thoai',$contacts->so_dien_thoai)}}"
            >
            @error('so_dien_thoai')
                <p class="text-danger">{{$message}}</p>
            @enderror


        </div>

        <div class="mb-3">
            <label for="tieu_de" class="form-label">Tiêu đề</label>
            <input type="text" name="tieu_de" class="form-control @error('tieu_de') is-invalid @enderror" placeholder="...."

            value="{{old('tieu_de',$contacts->tieu_de)}}"
            >
            @error('tieu_de')
                <p class="text-danger">{{$message}}</p>
            @enderror


        </div>




        <div class="mb-3">
            <label for="noi_dung" class="form-label">Nội dung</label>
            <textarea name="noi_dung" id="" rows="5" class="form-control"
             
            >{{old('noi_dung',$contacts->noi_dung)}}</textarea>
            @error('noi_dung')
                <p class="text-danger">{{$message}}</p>
            @enderror




        </div>


        <button type="submit" class="btn btn-secondary">Thêm thông tin liên hệ</button>
    </form>


</div>
@endsection
