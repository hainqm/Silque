@extends('layout.admin')
@section('title')
@section('content')
<div class="container">
    <h2>Danh sách đánh giá</h2>

    <a href="{{ route('admin.reviews.create') }}" class="btn btn-success my-2">Thêm đánh giá</a>

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
            <form method="GET" action="{{ route('admin.reviews.index') }}">
                <div class="row g-3">




                     {{-- Tên sản phẩm --}}
                    <div class="col-md-3">
                        <label class="form-label">Tên sản phẩm</label>
                        <input type="text" name="ten_san_pham" class="form-control" placeholder="Nhập ..."
                            value="{{ request('ten_san_pham') }}">
                    </div>




                    {{-- Số sao  --}}
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




                    <!-- Nút tìm kiếm & Làm mới -->
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100 me-1">
                            <i class="fas fa-search"></i> Tìm kiếm
                        </button>
                        <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary w-100 ms-1">
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
                <th>Tên người dùng</th>
                <th>Tên sản phẩm</th>
                <th>Số sao</th>
                <th>Nội dung đánh giá</th>
                <th>ACT</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->ten_nguoi_dung }}</td>
                <td>{{ $review->ten_san_pham }}</td>

                <td>
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->so_sao)
                            <i class="fas fa-star text-warning"></i> {{-- Ngôi sao vàng --}}
                        @else
                            <i class=" "></i> {{-- Ngôi sao rỗng --}}
                        @endif
                    @endfor
                </td>
                <td>{{ $review->noi_dung_danh_gia }}</td>


                <td class="d-flex align-items-center">
                    <a href="{{route('admin.reviews.show',$review->id)}}" class="btn btn-primary">Xem</a>
                    <a href="{{route('admin.reviews.edit',$review->id)}}" class="btn btn-warning mx-2 ">Sửa</a>

                    <form action="{{route('admin.reviews.destroy',$review->id)}}" method="post" onsubmit="return confirm('Bạn xoá à???')">
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
