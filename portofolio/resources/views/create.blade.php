@extends('layouts.app')

@section('content')
    <h1>Create New Siswa</h1>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('siswa.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama">
        </div>
        <div class="form-group">
            <label for="no_telp">No. Telp</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan No. Telp">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat"></textarea>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection