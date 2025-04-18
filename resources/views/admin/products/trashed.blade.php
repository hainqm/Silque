@extends('layout.admin')
@section('title')
@section('content')
<div class="container">
    <h2>Recycle Bin</h2>

    <a href="{{ route('admin.products.index') }}" class="btn btn-success my-2"> Danh sách sản phẩm</a>

    @if(@session('success'))
        <div class="alert alert-success">
            {{session('success')}}
            </div>

    @endif

     @if($products->count() > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Giá khuyến mại</th>
                <th>Ảnh sản phẩm</th>
                <th>Số lượng</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Ngày nhập</th>
                <th>ACT</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->ma_san_pham }}</td>
                <td>{{ $product->ten_san_pham }}</td>
                <td>{{ $product->category->ten_danh_muc ?? 'Không có danh mục' }}</td>
                <td>{{ $product->gia }} VND</td>
                <td>{{ $product->gia_khuyen_mai }} VND</td>
                <td>
                    @if($product->anh)
                    <img src="{{asset('storage/' .$product->anh)}}" alt="{{$product->ten_san_pham}}" width="60px">
                    @else
                        Không có ảnh
                    @endif
                </td>
                <td>{{ $product->so_luong}}</td>
                <td>{{ $product->mo_ta }}</td>
                <td>
                    <span class="badge {{ $product->trang_thai ? 'bg-success' : 'bg-danger' }}">
                        {{ $product->trang_thai ? 'Còn hàng' : 'Hết hàng' }}
                    </span>
                </td>
                <td>{{ $product->ngay_nhap }}</td>
               <td>
                        <form action="{{ route('admin.products.restore', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success my-2">Restore</button>
                        </form>

                        <form action="{{route('admin.products.forceDelete',$product->id)}}" method="post" onsubmit="return confirm('Nghĩ kĩ chưa???')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ">Delete</button>
                        </form>
                    </td>

            </tr>
            @endforeach
        </tbody>
    </table>


    @else
        <p>Không có sản phẩm nào bị xóa mềm.</p>
    @endif

</div>
@endsection
