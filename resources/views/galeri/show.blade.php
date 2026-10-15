@extends('layouts.app')

@section('content')
    <a href="{{ route('galeri.index') }}" class="btn btn-link px-0 mb-3">Kembali ke galeri</a>

    <div class="bg-white p-4 rounded shadow-sm">
        <img src="{{ $gambar->gambar }}" class="img-fluid rounded mb-3" alt="{{ $gambar->judul }}">
        <span class="badge bg-success mb-2">{{ $gambar->nama_kategori }}</span>
        <h1 class="h4">{{ $gambar->judul }}</h1>
        <p class="text-muted small">Dikirim oleh {{ $gambar->nama_pengirim }} dan disetujui pada {{ $gambar->divalidasi_pada->format('d M Y') }}</p>
        <p>{{ $gambar->deskripsi }}</p>
    </div>
@endsection