@extends('layouts.app')
@section('content')
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

<script>
    function showAlert(message, type) {
        const alertBox = document.createElement('div');
        alertBox.classList.add('alert', 'fixed-top', 'mt-4', 'w-25', 'mx-auto');
        alertBox.style.zIndex = '9999';
        alertBox.role = 'alert';

        if (type === 'danger') {
            alertBox.classList.add('alert-danger');
        } else if (type === 'success') {
            alertBox.classList.add('alert-success');
        }

        alertBox.textContent = message;

        document.body.appendChild(alertBox);

        setTimeout(() => {
            document.body.removeChild(alertBox);
        }, 3000);
    }

    @if (session('success'))
        showAlert('{{ session('success') }}', 'success');
    @endif
</script>

</body>
@endsection