<!DOCTYPE html>
<head></head>
<body>
    <h3>ohayou skai</h3>
    <h1>Data Siswa</h1>
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