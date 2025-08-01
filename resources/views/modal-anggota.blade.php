<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
</head>

<body>
    <div class="text-center mb-8">
        <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="ri-user-line text-2xl text-primary"></i>
        </div>
        <h1 class="text-2xl font-bold text-gray-900">
            Data Anggota Kabupaten
            {{ !$data->isEmpty() ? $data->first()->kabupaten : request()->kabupaten }}
        </h1>
    </div>
    <div class="flex items-center gap-4 mb-4">
        <form id="searchForm" class="flex gap-4" data-kabupaten="{{ request()->route('kabupaten') }}"
            onsubmit="searchAnggota(event)">
            <input type="text" name="search" id="searchInput" placeholder="🔎 Cari nama anggota..."
                class="pl-4 pr-4 py-2 border rounded-lg w-64 text-sm">
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded text-sm hover:bg-blue-700">Cari</button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-3 py-2 text-left">Nama</th>
                    <th class="border px-3 py-2 text-left">NIK</th>
                    <th class="border px-3 py-2 text-left">Alamat</th>
                    <th class="border px-3 py-2 text-left">Kabupaten</th>
                    <th class="border px-3 py-2 text-left">Kecamatan</th>
                    <th class="border px-3 py-2 text-left">Tgl Lahir</th>
                    <th class="border px-3 py-2 text-left">Agama</th>
                    <th class="border px-3 py-2 text-left">Jenis Disabilitas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="border px-3 py-2">{{ $item->nama }}</td>
                        <td class="border px-3 py-2">{{ $item->nik }}</td>
                        <td class="border px-3 py-2">{{ $item->alamat }}</td>
                        <td class="border px-3 py-2">{{ $item->kabupaten }}</td>
                        <td class="border px-3 py-2">{{ $item->kecamatan }}</td>
                        <td class="border px-3 py-2">{{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}
                        </td>
                        <td class="border px-3 py-2">{{ $item->agama }}</td>
                        <td class="border px-3 py-2">{{ $item->jenis_disabilitas }}</td>
                    </tr>
                @endforeach
                @if ($data->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">Tidak ada data</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <script>
        function searchAnggota(event) {
            event.preventDefault();
            const input = document.getElementById("searchInput").value;
            const kabupaten = document.getElementById("searchForm").dataset.kabupaten;
            const modal = document.getElementById("anggotaModal");
            const content = document.getElementById("modalContent");

            content.innerHTML = '<p class="text-center text-gray-600">Loading...</p>';

            fetch(`/kabupaten/${kabupaten}/anggota?search=${encodeURIComponent(input)}`)
                .then(res => res.text())
                .then(html => {
                    content.innerHTML = html;
                }).catch(err => {
                    content.innerHTML = '<p class="text-center text-red-600">Gagal memuat hasil pencarian.</p>';
                });
        }
    </script>

</body>

</html>
