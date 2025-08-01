<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota Himpunan Wanita Disabilitas Indonesia Lampung</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .header img { width: 60px; height: auto; }
        .line { border-top: 2px solid black; margin-top: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; font-size: 10pt; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('hwdi.jpg') }}" />
        <h1>Data Anggota HWDI Lampung</h1>
        <h2>Kabupaten: {{ $kabupaten->nama ?? 'Semua' }} 
            | Kecamatan: {{ $kecamatan->nama ?? 'Semua' }} 
            | Jenis Disabilitas: {{ $jenis_disabilitas ?? 'Semua' }}</h2>
    </div>
    <div class="line"></div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Jenis Disabilitas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggotas as $index => $anggota)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $anggota->nama }}</td>
                    <td>{{ $anggota->nik }}</td>
                    <td>{{ $anggota->alamat }}</td>
                    <td>{{ \Carbon\Carbon::parse($anggota->tanggal_lahir)->format('d-m-Y') }}</td>
                    <td>{{ $anggota->agama }}</td>
                    <td>{{ $anggota->jenis_disabilitas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
