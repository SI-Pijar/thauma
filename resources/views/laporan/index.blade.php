@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4">Daftar Laporan</h1>

    <table class="table table-bordered bg-white align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Pelapor</th>
                <th>Yang Dilaporkan</th>
                <th>Alasan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($laporan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_pelapor }}</td>
                    <td>
                        @if ($item->post_id)
                            Artikel nomor {{ $item->post_id }}
                        @elseif ($item->submission_id)
                            Gambar nomor {{ $item->submission_id }}
                        @else
                            Komentar nomor {{ $item->comment_id }}
                        @endif
                    </td>
                    <td>{{ $item->alasan }}</td>
                    <td><span class="badge bg-warning text-dark">{{ $item->status }}</span></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada laporan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection