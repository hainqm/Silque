@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            {{-- Tiêu đề --}}
            <h1 class="mb-3 display-6 fw-semibold text-dark">{{ $post->tieu_de }}</h1>

            {{-- tác giả --}}
            <h6 class=" text-secondary">{{ $post->tac_gia }}</h6>

            {{-- Ảnh đại diện bài viết --}}
            @if ($post->anh_bai_viet)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $post->anh_bai_viet) }}" alt="{{ $post->tieu_de }}" class="img-fluid rounded-3 w-100">
                </div>
            @endif

            {{-- Nội dung bài viết --}}
            <div class="post-content lh-lg fs-6 text-body">
                {!! $post->mo_ta !!}
            </div>

        </div>
    </div>
</div>
@endsection
