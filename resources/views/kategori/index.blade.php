@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4">Daftar Kategori</h1>

    <table class="table table-bordered bg-white">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->slug }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection