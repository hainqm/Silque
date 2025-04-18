@extends('layout.admin')
@section('title')
@section('content')
<div class="container">
    <h2>Danh sách banner</h2>

    <a href="{{ route('admin.banners.create') }}" class="btn btn-success my-2">Thêm banner</a>

    @if(@session('success'))
        <div class="alert alert-success">
            {{session('success')}}
            </div>

    @endif
    <!-- Form tìm kiếm -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-search"></i> Tìm kiếm banner</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.banners.index') }}">
                <div class="row g-3">


                    {{-- Tên banner --}}
                    <div class="col-md-3">
                        <label class="form-label">Tên banner</label>
                        <input type="text" name="tieu_de" class="form-control" placeholder="Nhập Tên banner"
                            value="{{ request('tieu_de') }}">
                    </div>



                    {{-- Trạng thái  --}}
                    <div class="col-md-3">
                        <label class="form-label">Trạng thái</label>
                        <select name="trang_thai" id="" class="form-select">
                            <option value="" selected>Trạng thái</option>
                            <option value="0" {{ request('trang_thai') }} >Hiện </option>
                            <option value="1" {{ request('trang_thai') }} >Ẩn</option>
                        </select>
                    </div>



                    <!-- Nút tìm kiếm & Làm mới -->
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100 me-1">
                            <i class="fas fa-search"></i> Tìm kiếm
                        </button>
                        <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary w-100 ms-1">
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
                <th>Ảnh banner</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>ACT</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $banner)
            <tr>
                <td>{{ $banner->id }}</td>
                <td>{{ $banner->tieu_de }}</td>
                <td>
                    @if($banner->duong_dan_anh)
                    <img src="{{asset('storage/' .$banner->duong_dan_anh)}}" alt="{{$banner->tieu_de}}" width="60px">
                    @else
                        Không có ảnh
                    @endif
                </td>
                <td>{{ $banner->mo_ta }}</td>
                <td>
                    <span class="badge {{ $banner->trang_thai ? 'bg-secondary' : 'bg-primary' }}">
                        {{ $banner->trang_thai ? 'Ẩn' : 'Hiện' }}
                    </span>
                </td>
                <td>{{ $banner->ngay_nhap }}</td>
                <td>
                    <a href="{{route('admin.banners.show',$banner->id)}}" class="btn btn-primary">Xem</a>
                    <a href="{{route('admin.banners.edit',$banner->id)}}" class="btn btn-warning my-3">Sửa</a>

                    <form action="{{route('admin.banners.destroy',$banner->id)}}" method="post" onsubmit="return confirm('Bạn xoá à???')">
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
