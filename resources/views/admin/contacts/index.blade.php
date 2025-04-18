@extends('layout.admin')
@section('title')
@section('content')
<div class="container">
    <h2>Danh sách contact</h2>

    <a href="{{ route('admin.contacts.create') }}" class="btn btn-success my-2">Thêm liên hệ</a>

    @if(@session('success'))
        <div class="alert alert-success">
            {{session('success')}}
            </div>

    @endif
    <!-- Form tìm kiếm -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-search"></i> Tìm kiếm liên hệ</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.contacts.index') }}">
                <div class="row g-3">


                    {{-- Tên liên hệ --}}
                    <div class="col-md-3">
                        <label class="form-label">Theo viết danh</label>
                        <input type="text" name="viet_danh" class="form-control" placeholder="Nhập viêt danh"
                            value="{{ request('viet_danh') }}">
                    </div>

                    {{-- Tên liên hệ --}}
                    <div class="col-md-3">
                        <label class="form-label">Tiêu đề</label>
                        <input type="text" name="tieu_de" class="form-control" placeholder="Nhập tiêu đề"
                            value="{{ request('tieu_de') }}">
                    </div>






                    <!-- Nút tìm kiếm & Làm mới -->
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100 me-1">
                            <i class="fas fa-search"></i> Tìm kiếm
                        </button>
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary w-100 ms-1">
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
                <th>Viết danh</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>ACT</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->viet_danh }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->so_dien_thoai }}</td>
                <td>{{ $contact->viet_danh }}</td>
                <td>{{ $contact->noi_dung }}</td>

                <td class="d-flex align-items-center">
                    <a href="{{route('admin.contacts.show',$contact->id)}}" class="btn btn-primary">Xem</a>
                    <a href="{{route('admin.contacts.edit',$contact->id)}}" class="btn btn-warning mx-2 ">Sửa</a>

                    <form action="{{route('admin.contacts.destroy',$contact->id)}}" method="post" onsubmit="return confirm('Bạn xoá à???')">
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
