@extends('layout.admin')
@section('title')
@section('content')
<div class="container">
    <h2>Danh sách khách hàng</h2>

    <a href="{{ route('admin.customers.create') }}" class="btn btn-success my-2">Thêm thông tin khách hàng</a>

    @if(@session('success'))
        <div class="alert alert-success">
            {{session('success')}}
            </div>

    @endif
    <!-- Form tìm kiếm -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-search"></i> Tìm kiếm khách hàng</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.customers.index') }}">
                <div class="row g-3">
                    {{-- Tên khách hàng --}}
                    <div class="col-md-3">
                        <label class="form-label">Tên khách hàng</label>
                        <input type="text" name="ten_khach_hang" class="form-control" placeholder="Nhập Tên khách hàng"
                            value="{{ request('ten_khach_hang') }}">
                    </div>

                    {{-- email --}}
                    <div class="col-md-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="....."
                            value="{{ request('email') }}">
                    </div>



                    {{-- Giới tính  --}}
                    <div class="col-md-3">
                        <label class="form-label">Giới tính</label>
                        <select name="gioi_tinh" id="" class="form-select">
                            <option value="" selected>Giới tính</option>
                            <option value="Nam" {{ request('gioi_tinh') == 'Nam' ? 'selected' : '' }}>Nam</option>
                            <option value="Nữ" {{ request('gioi_tinh') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                            <option value="Khác" {{ request('gioi_tinh') == 'Khác' ? 'selected' : '' }}>Khác</option>
                        </select>
                    </div>

                    <!-- Nút tìm kiếm & Làm mới -->
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100 me-1">
                            <i class="fas fa-search"></i> Tìm kiếm
                        </button>
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary w-100 ms-1">
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
                <th>Tên khách hàng</th>
                <th>Tuổi</th>
                <th>Email</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>ACT</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->ten_khach_hang }}</td>
                <td>{{ $customer->tuoi }}</td>

                <td>{{ $customer->email}}</td>

                <td>
                    @if($customer->gioi_tinh == 'Nam')
                        <span>Nam</span>
                    @elseif($customer->gioi_tinh == 'Nữ')
                        <span >Nữ</span>
                    @else
                        <span >Khác</span>
                    @endif
                </td>
                <td>{{ $customer->dia_chi }}</td>
                <td>
                    <a href="{{route('admin.customers.show',$customer->id)}}" class="btn btn-primary">Xem</a>
                    <a href="{{route('admin.customers.edit',$customer->id)}}" class="btn btn-warning my-3">Sửa</a>

                    <form action="{{route('admin.customers.destroy',$customer->id)}}" method="post" onsubmit="return confirm('Bạn xoá à???')">
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
