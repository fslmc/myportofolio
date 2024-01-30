@extends('layouts.app')
<body>
    @section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Data Siswa</h1>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-4">Create</a>
        @if (session('unauthorized'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('unauthorized') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Tempat Lahir</th>
                    <th>Oleh User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $data)
                    <tr>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->no_telp }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->tanggal_lahir }}</td>
                        <td>{{ $data->tempat_lahir }}</td>
                        <td>{{ $data->user }}</td>
                        <td>
                            <a href="{{ route('siswa.edit', ['id' => $data->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('siswa.delete', ['id' => $data->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus siswa ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.min.js"></script>
</body>
</html>