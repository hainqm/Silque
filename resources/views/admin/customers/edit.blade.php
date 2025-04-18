@extends('layout.admin')
@section('title')
@section('content')
<div class="container">

    <h2>Chỉnh sửa Thông tin khách hàng</h2>

    <form method="post" action="{{route('admin.customers.update',$customers->id)}}" >
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="ten_khach_hang" class="form-label">Xin cái name</label>
            <input type="text" name="ten_khach_hang" class="form-control @error('ten_khach_hang') is-invalid @enderror" placeholder="...."

            value="{{old('ten_khach_hang',$customers->ten_khach_hang)}}"
            >
            @error('ten_khach_hang')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tuoi" class="form-label">Tuổi ngài</label>
            <input type="number" name="tuoi" class="form-control @error('tuoi') is-invalid @enderror" placeholder="...." min="10"

            value="{{old('tuoi',$customers->tuoi)}}"
            >
            @error('tuoi')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-3">
            <label for="email" class="form-label">Email ngài</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="...."

            value="{{old('email',$customers->email)}}"
            >
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="dia_chi" class="form-label">Ngài sống ở đâu?</label>
            <input type="text" name="dia_chi" class="form-control @error('dia_chi') is-invalid @enderror" placeholder="...."

            value="{{old('dia_chi',$customers->dia_chi)}}"
            >
            @error('dia_chi')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>



        <div class="mb-3">
            <label class="form-label">Giới tính</label>
            <select name="gioi_tinh" id="" class="form-select">
                <option value="" selected>--Giới tính--</option>
                <option value="Nam" {{ request('gioi_tinh') == 'Nam' ? 'selected' : '' }}>Nam</option>
                <option value="Nữ" {{ request('gioi_tinh') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                <option value="Khác" {{ request('gioi_tinh') == 'Khác' ? 'selected' : '' }}>Khác</option>
            </select>

        </div>



        <button type="submit" class="btn btn-secondary">Update khách hàng</button>
    </form>


</div>
@endsection
