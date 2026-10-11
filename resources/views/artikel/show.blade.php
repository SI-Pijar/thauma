@extends('layouts.app')

@section('content')
    <a href="{{ route('artikel.index') }}" class="btn btn-link px-0 mb-3">Kembali ke daftar artikel</a>

    <article class="bg-white p-4 rounded shadow-sm">
        <span class="badge bg-primary mb-2">{{ $post->nama_kategori }}</span>
        <h1 class="h3">{{ $post->judul }}</h1>
        <p class="text-muted small">Ditulis oleh {{ $post->nama_penulis }} pada {{ $post->terbit_pada->format('d M Y') }}</p>

        <p class="mt-4">{{ $post->isi }}</p>

        @if ($post->nama_sumber)
            <div class="alert alert-light border mt-4 mb-0 small">
                Diterjemahkan dari <strong>{{ $post->judul_asli }}</strong>
                ({{ $post->nama_sumber }}, bahasa {{ strtoupper($post->bahasa_asal) }}).
                <a href="{{ $post->url_sumber }}" target="_blank">Lihat sumber asli</a>
            </div>
        @endif
    </article>
@endsection
