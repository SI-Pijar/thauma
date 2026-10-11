@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4">Galeri Komunitas</h1>

    @if ($galeri->isEmpty())
        <div class="alert alert-secondary">Belum ada gambar yang disetujui.</div>
    @endif

    <div class="row g-4">
        @foreach ($galeri as $item)
            <div class="col-sm-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $item->gambar }}" class="card-img-top" alt="{{ $item->judul }}">
                    <div class="card-body">
                        <span class="badge bg-success mb-2">{{ $item->nama_kategori }}</span>
                        <h2 class="h6 card-title">{{ $item->judul }}</h2>
                        <p class="small text-muted">Dikirim oleh {{ $item->nama_pengirim }}</p>
                        <a href="{{ route('galeri.show', $item->id) }}" class="btn btn-outline-success btn-sm">Lihat</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection