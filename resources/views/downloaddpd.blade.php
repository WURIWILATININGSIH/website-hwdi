<!DOCTYPE html><html lang="id"><head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>HWDI Lampung</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#000000" data-border-radius="small"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <header class="bg-white shadow">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="hwdi.jpg" class="h-8 w-auto"/>
                    <h1 class="ml-3 text-xl font-semibold text-gray-900">Sistem Informasi Pendataan Penyandang Disabilitas HWDI LAMPUNG</h1>
                </div>
                <a href="{{ route('logout') }}" class="!rounded-button bg-custom text-white px-4 py-2 text-sm font-medium">Logout</a>
            </div>
        </div>
    </header>
    <nav class="bg-white shadow-sm">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center space-x-8 h-14">
                <a href="{{ route('dashboard.dpd') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Ringkasan</a>
                <a href="{{ route('data.admin') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Data Admin</a>
                <a href="{{ route('data.anggota.dpd') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Data Anggota</a>
                <a href="{{ route('download.data.dpd') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-custom text-sm font-medium text-gray-900">Download Data Anggota</a>
                <a href="{{ route('hotline.dpd') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Hotline</a>
            </div>
        </div>
    </nav>
        <main class="flex-1 py-10">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white shadow rounded-lg p-6 space-y-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Wilayah</label>
                            <select class="!rounded-button w-full border-gray-300 focus:border-custom focus:ring-custom">
                                <option value="">Pilih Kabupaten/Kota</option>
                                <option value="bandar-lampung">Bandar Lampung</option>
                                <option value="metro">Metro</option>
                                <option value="lampung-selatan">Lampung Selatan</option>
                                <option value="lampung-tengah">Lampung Tengah</option>
                                <option value="lampung-utara">Lampung Utara</option>
                                <option value="lampung-barat">Lampung Barat</option>
                                <option value="lampung-timur">Lampung Timur</option>
                                <option value="way-kanan">Way Kanan</option>
                                <option value="tulang-bawang">Tulang Bawang</option>
                                <option value="pesawaran">Pesawaran</option>
                                <option value="pringsewu">Pringsewu</option>
                                <option value="mesuji">Mesuji</option>
                                <option value="tulang-bawang-barat">Tulang Bawang Barat</option>
                                <option value="pesisir-barat">Pesisir Barat</option>
                                <option value="tanggamus">Tanggamus</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Kecamatan</label>
                            <select class="!rounded-button w-full border-gray-300 focus:border-custom focus:ring-custom">
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Jenis Disabilitas</label>
                            <select class="!rounded-button w-full border-gray-300 focus:border-custom focus:ring-custom"><option value="">Pilih Jenis Disabilitas</option><option value="tunanetra">Tunanetra</option><option value="tunawicara">Tunawicara</option><option value="tunarungu">Tunarungu</option><option value="tunalaras">Tunalaras</option><option value="tunagrahita">Tuna Grahita</option><option value="tunadaksa">Tuna Daksa</option><option value="ganda">Disabilitas Ganda</option></select>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button class="!rounded-button bg-custom text-white px-6 py-2 hover:bg-custom/90 transition-colors flex items-center gap-2">
                            <i class="fas fa-download"></i>
                            Download
                        </button>
                    </div>
                </div>
            </div>
        </main>
        <footer class="bg-gray-100 mt-auto">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <p class="text-center text-gray-600 text-sm">© 2024 HWDI Lampung. Hak Cipta Dilindungi.</p>
            </div>
        </footer>
    </div>
    <script>const kabupatenSelect = document.querySelector('select:first-of-type');
const kecamatanSelect = document.querySelector('select:nth-of-type(2)');
const kecamatanData = {
    'bandar-lampung': ['Tanjung Karang Barat', 'Kemiling', 'Langkapura', 'Kedaton', 'Enggal', 'Kedamaian', 'Bumi Waras', 'Panjang', 'Tanjung Karang Timur', 'Teluk Betung Utara'],
    'metro': ['Metro Pusat', 'Metro Utara', 'Metro Barat', 'Metro Timur', 'Metro Selatan'],
    'lampung-selatan': ['Natar', 'Jati Agung', 'Tanjung Bintang', 'Tanjung Sari', 'Katibung', 'Merbau Mataram', 'Sidomulyo', 'Candipuro', 'Way Panji', 'Kalianda', 'Raja Basa', 'Palas', 'Sragi', 'Penengahan', 'Bakauheni', 'Ketapang', 'Way Sulan'],
    'lampung-tengah': ['Padang Ratu', 'Selagai Lingga', 'Pubian', 'Anak Tuha', 'Anak Ratu Aji', 'Kalirejo', 'Sendang Agung', 'Bangunrejo', 'Gunung Sugih', 'Trimurjo', 'Punggur', 'Kota Gajah', 'Seputih Raman', 'Terbanggi Besar', 'Seputih Agung', 'Way Pengubuan', 'Terusan Nunyai', 'Seputih Mataram', 'Bandar Mataram', 'Seputih Banyak', 'Way Seputih', 'Rumbia', 'Bumi Nabung', 'Putra Rumbia', 'Seputih Surabaya', 'Bandar Surabaya', 'Anak Ratu Aji', 'Bekri', 'Wates'],
    'lampung-utara': ['Bukit Kemuning', 'Abung Tinggi', 'Tanjung Raja', 'Abung Barat', 'Abung Tengah', 'Abung Kunang', 'Abung Pekurun', 'Kotabumi', 'Kotabumi Utara', 'Kotabumi Selatan', 'Abung Selatan', 'Abung Semuli', 'Blambangan Pagar', 'Abung Timur', 'Sungkai Selatan', 'Muara Sungkai', 'Bunga Mayang', 'Sungkai Barat', 'Sungkai Jaya', 'Sungkai Utara', 'Hulusungkai', 'Sungkai Tengah', 'Abung Surakarta'],
    'lampung-barat': ['Balik Bukit', 'Sukau', 'Lumbok Seminung', 'Belalau', 'Sekincau', 'Suoh', 'Batu Brak', 'Pagar Dewa', 'Batu Ketulis', 'Bandar Negeri Suoh', 'Sumber Jaya', 'Way Tenong', 'Gedung Surian', 'Kebun Tebu', 'Air Hitam', 'Gedung Surian'],
    'lampung-timur': ['Metro Kibang', 'Batanghari', 'Sekampung', 'Margatiga', 'Sekampung Udik', 'Jabung', 'Labuhan Maringgai', 'Way Jepara', 'Braja Selebah', 'Melinting', 'Bandar Sribhawono', 'Mataram Baru', 'Gunung Pelindung', 'Pasir Sakti', 'Waway Karya', 'Labuhan Ratu', 'Batanghari Nuban', 'Pekalongan', 'Raman Utara', 'Purbolinggo', 'Way Bungur', 'Bumi Agung', 'Sukadana', 'Marga Tiga'],
    'way-kanan': ['Banjit', 'Baradatu', 'Gunung Labuhan', 'Kasui', 'Rebang Tangkas', 'Blambangan Umpu', 'Way Tuba', 'Negeri Agung', 'Bahuga', 'Buay Bahuga', 'Bumi Agung', 'Pakuan Ratu', 'Negara Batin', 'Negeri Besar'],
    'tulang-bawang': ['Banjar Agung', 'Banjar Margo', 'Dente Teladas', 'Gedung Aji', 'Gedung Meneng', 'Menggala', 'Menggala Timur', 'Penawar Aji', 'Rawajitu Selatan', 'Rawajitu Timur', 'Rawajitu Utara', 'Rawa Pitu', 'Gedung Aji Baru', 'Banjar Baru', 'Meraksa Aji'],
    'pesawaran': ['Padang Cermin', 'Punduh Pidada', 'Kedondong', 'Way Lima', 'Gedong Tataan', 'Negeri Katon', 'Tegineneng', 'Marga Punduh', 'Way Khilau', 'Way Ratai', 'Teluk Pandan'],
    'pringsewu': ['Pringsewu', 'Gading Rejo', 'Ambarawa', 'Pardasuka', 'Pagelaran', 'Pagelaran Utara', 'Banyumas', 'Adiluwih', 'Sukoharjo'],
    'mesuji': ['Mesuji', 'Mesuji Timur', 'Rawa Jitu Utara', 'Way Serdang', 'Simpang Pematang', 'Panca Jaya', 'Tanjung Raya'],
    'tulang-bawang-barat': ['Tulang Bawang Tengah', 'Tumijajar', 'Tulang Bawang Udik', 'Gunung Terang', 'Gunung Agung', 'Way Kenanga', 'Lambu Kibang', 'Pagar Dewa'],
    'pesisir-barat': ['Pesisir Tengah', 'Pesisir Selatan', 'Lemong', 'Pesisir Utara', 'Karya Penggawa', 'Pulau Pisang', 'Way Krui', 'Krui Selatan', 'Ngambur', 'Ngaras', 'Bengkunat', 'Bengkunat Belimbing'],
    'tanggamus': ['Kotaagung', 'Kotaagung Barat', 'Kotaagung Timur', 'Pulau Panggung', 'Ulubelu', 'Talang Padang', 'Sumberejo', 'Gisting', 'Gunung Alip', 'Limau', 'Bandar Negeri Semuong', 'Wonosobo', 'Semaka', 'Kelumbayan', 'Kelumbayan Barat', 'Pematang Sawa', 'Cukuh Balak', 'Air Naningan', 'Bulok', 'Kagungan']
};
kabupatenSelect.addEventListener('change', function() {
    const selectedKabupaten = this.value;
    kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
    
    if (selectedKabupaten && kecamatanData[selectedKabupaten]) {
        kecamatanData[selectedKabupaten].forEach(kecamatan => {
            const option = document.createElement('option');
            option.value = kecamatan.toLowerCase().replace(/ /g, '-');
            option.textContent = kecamatan;
            kecamatanSelect.appendChild(option);
        });
    }
});</script>
