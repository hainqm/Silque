
@extends('layout.master')

@section('title', 'Đăng nhập')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="width: 400px;">
            <h2 class="text-center">Đăng nhập</h2>
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="email">Email:</label>
                    <input class="form-control" type="email" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Mật khẩu:</label>
                    <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <button class="btn btn-primary w-100" type="submit">Đăng nhập</button>
            </form>
            <p class="mt-3 text-center">Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a></p>
        </div>
    </div>
@endsection
