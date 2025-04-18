@extends('layout.admin');
@section('title')
@section('content')
<div class="container">
    <a href="{{route('admin.products.index')}}" class="btn btn-secondary">Danh sách sản phẩm</a>
    <h2>Danh sách sản phẩm</h2>

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


            </tr>
        </thead>
        <tbody>

            <tr>
                <td>{{ $products->id }}</td>
                <td>{{ $products->ma_san_pham }}</td>
                <td>{{ $products->ten_san_pham }}</td>
                <td>{{ $products->category_id }}</td>
                <td>{{ $products->gia }} VND</td>
                <td>{{ $products->gia_khuyen_mai }} VND</td>
                <td>
                    @if($products->anh)
                    <img src="{{asset('storage/' .$products->anh)}}" alt="{{$products->ten_san_pham}}" width="60px">
                    @else
                        Không có ảnh
                    @endif
                </td>
                <td>{{ $products->so_luong}}</td>
                <td>{{ $products->mo_ta }}</td>
                <td>{{ $products->trang_thai }}</td>
                <td>{{ $products->ngay_nhap }}</td>

            </tr>

        </tbody>
    </table>


</div>
@endsection
