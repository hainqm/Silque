@extends('layout.admin')
@section('title')
@section('content')
<div class="container">
    <h2>Danh sách danh mục</h2>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-success my-2">Thêm danh mục</a>

    @if(@session('success'))
        <div class="alert alert-success">
            {{session('success')}}
            </div>

    @endif
    <!-- Form tìm kiếm -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-search"></i> Tìm kiếm danh mục</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.categories.index') }}">
                <div class="row g-3">


                    {{-- Tên danh mục --}}
                    <div class="col-md-3">
                        <label class="form-label">Tên danh mục</label>
                        <input type="text" name="ten_danh_muc" class="form-control" placeholder="Nhập Tên danh mục"
                            value="{{ request('ten_danh_muc') }}">
                    </div>



                    {{-- Trạng thái  --}}
                    <div class="col-md-3">
                        <label class="form-label">Trạng thái</label>
                        <select name="trang_thai" id="" class="form-select">
                            <option value="" selected>Trạng thái</option>
                            <option value="0" {{ request('trang_thai') }} >Ngưng Hoạt động</option>
                            <option value="1" {{ request('trang_thai') }} > hoạt động</option>
                        </select>
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

                <th>Tên danh mục</th>

                <th>Trạng thái</th>

                <th>ACT</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>

                <td>{{ $category->ten_danh_muc }}</td>

                <td>
                    <span class="badge {{ $category->trang_thai ? 'bg-success' : 'bg-danger' }}">
                        {{ $category->trang_thai ? 'Hoạt động' : 'Ngưng hoạt động' }}
                    </span>
                </td>

                <td class="d-flex align-items-center">
                    <a href="{{route('admin.categories.show',$category->id)}}" class="btn btn-primary">Xem</a>
                    <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-warning mx-2 ">Sửa</a>

                    <form action="{{route('admin.categories.destroy',$category->id)}}" method="post" onsubmit="return confirm('Bạn xoá à???')">
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
