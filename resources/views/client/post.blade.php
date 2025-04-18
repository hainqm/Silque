@extends('layout.app') {{-- hoặc layout bạn đang dùng --}}

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center fw-bold fs-2">Danh sách bài viết</h1>

    <div class="row g-4">
        @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    @if ($post->anh_bai_viet)
                        <img src="{{ asset('storage/' . $post->anh_bai_viet) }}" class="card-img-top" alt="{{ $post->tieu_de }}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">
                            <a href="{{ route('post', $post->slug) }}" class="text-decoration-none text-dark">
                                {{ $post->tieu_de }}
                            </a>
                        </h5>
                        <p class="card-text text-muted mt-2">
                            {{ \Illuminate\Support\Str::limit(strip_tags($post->mo_ta), 100) }}
                        </p>
                        <div class="mt-auto">
                            <a href="{{ route('post_detail', $post->id) }}" class="btn btn-primary btn-sm mt-3">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
