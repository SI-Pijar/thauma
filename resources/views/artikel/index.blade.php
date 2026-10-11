@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4">Artikel Terbaru</h1>

    @if ($posts->isEmpty())
        <div class="alert alert-secondary">Belum ada artikel yang terbit.</div>
    @endif

    <div class="row g-4">
        @foreach ($posts as $post)
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">{{ $post->nama_kategori }}</span>
                        <h2 class="h5 card-title">{{ $post->judul }}</h2>
                        <p class="card-text text-muted">{{ $post->ringkasan }}</p>
                        <p class="small text-muted">Ditulis oleh {{ $post->nama_penulis }} pada {{ $post->terbit_pada->format('d M Y') }}</p>
                        <a href="{{ route('artikel.show', $post->id) }}" class="btn btn-outline-primary btn-sm">Baca selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
