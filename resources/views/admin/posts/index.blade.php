@extends('layout.admin')
@section('title')
@section('content')
<div class="container">
    <h2>Danh sách bài đăng</h2>

    <a href="{{ route('admin.posts.create') }}" class="btn btn-success my-2">Thêm Bài đăng</a>

    @if(@session('success'))
        <div class="alert alert-success">
            {{session('success')}}
            </div>

    @endif
    <!-- Form tìm kiếm -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-search"></i> Tìm kiếm bài đăng</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.posts.index') }}">
                <div class="row g-3">


                    {{-- Tên post --}}
                    <div class="col-md-3">
                        <label class="form-label">Tên post</label>
                        <input type="text" name="tieu_de" class="form-control" placeholder="Nhập Tên post"
                            value="{{ request('tieu_de') }}">
                    </div>



                    <!-- Nút tìm kiếm & Làm mới -->
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100 me-1">
                            <i class="fas fa-search"></i> Tìm kiếm
                        </button>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary w-100 ms-1">
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
                <th>Tiêu đề</th>
                <th>Tác giả</th>
                <th>Ảnh bài đăng</th>
                <th>Mô tả</th>
                <th>ACT</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->tieu_de }}</td>
                <td>{{ $post->tac_gia }}</td>
                <td>
                    @if($post->anh_bai_viet)
                    <img src="{{asset('storage/' .$post->anh_bai_viet)}}" alt="{{$post->tieu_de}}" width="60px">
                    @else
                        Không có ảnh
                    @endif
                </td>
                <td>{{ $post->mo_ta }}</td>
                <td>
                    <a href="{{route('admin.posts.show',$post->id)}}" class="btn btn-primary">Xem</a>
                    <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-warning my-3">Sửa</a>

                    <form action="{{route('admin.posts.destroy',$post->id)}}" method="post" onsubmit="return confirm('Bạn xoá à???')">
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
