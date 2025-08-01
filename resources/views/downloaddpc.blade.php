<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Data Anggota - Admin DPC</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        custom: '#4169E1',
                    },
                    borderRadius: {
                        'button': '8px'
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <header class="bg-white shadow">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="{{ asset('images/hwdi.jpg') }}" class="h-8 w-auto" />
                    <h1 class="ml-3 text-xl font-semibold text-gray-900">Sistem Informasi Pendataan Penyandang
                        Disabilitas HWDI LAMPUNG</h1>
                </div>
                <a href="{{ route('logout') }}"
                    class="rounded bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm font-medium">Logout</a>
            </div>
        </div>
    </header>

    <nav class="bg-white shadow-sm">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center space-x-8 h-14">
                <a href="{{ route('dashboard.dpc') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Ringkasan</a>
                <a href="{{ route('data.anggota.dpc') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Data
                    Anggota</a>
                <a href="{{ route('download.data.dpc') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-custom text-sm font-medium text-gray-900">Download
                    Data Anggota</a>
                <a href="{{ route('hotline.dpc') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Hotline</a>
            </div>
        </div>
    </nav>

    <main class="flex-1 py-10">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6 space-y-6">
                <h2 class="text-lg font-semibold text-gray-700">Filter dan Download Data Anggota</h2>
                <form action="{{ route('download.data.pdf') }}" method="GET" target="_blank" class="space-y-4">
                    <!-- Kabupaten -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kabupaten</label>
                        <input type="text" name="kabupaten" value="{{ $kabupaten->nama }}" readonly
                            class="w-full border-gray-300 rounded-md bg-gray-100 text-gray-700" />
                    </div>

                    <!-- Kecamatan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kecamatan</label>
                        <select name="kecamatan"
                            class="rounded-md w-full border-gray-300 focus:border-custom focus:ring-custom">
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Jenis Disabilitas -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Disabilitas</label>
                        <select name="jenis_disabilitas"
                            class="rounded-md w-full border-gray-300 focus:border-custom focus:ring-custom">
                            <option value="">Pilih Jenis Disabilitas</option>
                            <option value="Tunanetra">Tunanetra</option>
                            <option value="Tunawicara">Tunawicara</option>
                            <option value="Tunarungu">Tunarungu</option>
                            <option value="Tunalaras">Tunalaras</option>
                            <option value="Tunagrahita">Tuna Grahita</option>
                            <option value="Tunadaksa">Tuna Daksa</option>
                            <option value="Disabilitas Ganda">Disabilitas Ganda</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-custom text-white px-6 py-2 rounded hover:bg-custom/90">
                            <i class="fas fa-download"></i> Download
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </main>

    <footer class="bg-gray-100 mt-auto">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <p class="text-center text-gray-600 text-sm">© 2024 HWDI Lampung. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script>
        const kabupatenSelect = document.getElementById('kabupatenSelect');
        const kecamatanSelect = document.getElementById('kecamatanSelect');

        const kecamatanData = {
            "Lampung Selatan": ['Bakauheni', 'Candipuro', 'Kalianda'],
            "Lampung Tengah": ['Gunung Sugih', 'Terbanggi Besar', 'Kalirejo']
        };

        kabupatenSelect.addEventListener('change', function() {
            const selectedKabupaten = this.value;
            kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

            if (kecamatanData[selectedKabupaten]) {
                kecamatanData[selectedKabupaten].forEach(function(kecamatan) {
                    const option = document.createElement('option');
                    option.value = kecamatan;
                    option.textContent = kecamatan;
                    kecamatanSelect.appendChild(option);
                });
            }
        });
    </script>
</body>

</html>
