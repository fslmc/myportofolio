<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <h1>Data Siswa</h1>
    <a href="{{ route('siswa.create') }}">create</a>
  
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>No. Telp</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Tempat Lahir</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswa as $data)
            <tr>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->no_telp }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->tanggal_lahir }}</td>
                <td>{{ $data->tempat_lahir }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>