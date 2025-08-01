<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Admin DPC - Sistem Informasi Pendataan Penyandang Disabilitas</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4169E1',
                        secondary: '#FF6347'
                    },
                    borderRadius: {
                        'none': '0px',
                        'sm': '4px',
                        DEFAULT: '8px',
                        'md': '12px',
                        'lg': '16px',
                        'xl': '20px',
                        '2xl': '24px',
                        '3xl': '32px',
                        'full': '9999px',
                        'button': '8px'
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <header class="bg-white shadow">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="hwdi.jpg" class="h-8 w-auto" />
                    <h1 class="ml-3 text-xl font-semibold text-gray-900">
                        Sistem Informasi Pendataan Penyandang Disabilitas HWDI LAMPUNG
                    </h1>
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
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-custom text-sm font-medium text-gray-900">Data
                    Anggota</a>
                <a href="{{ route('download.data.dpc') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Download
                    Data Anggota</a>
                <a href="{{ route('hotline.dpc') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Hotline</a>
            </div>
        </div>
    </nav>
    </header>
    <main class="container mx-auto px-4 py-6">
        <div class="bg-white rounded shadow-sm p-6 mb-6">
            <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                <div class="flex items-center gap-4">
                    <form action="{{ route('data.anggota.dpc') }}" method="GET" class="flex gap-4">
                        <input type="text" name="search" placeholder="🔎 Cari nama anggota..."
                            class="pl-4 pr-4 py-2 border rounded-lg w-64 text-sm" value="{{ request('search') }}">

                        <div>
                            <select name="kecamatan" class="border rounded-lg px-4 py-2 text-sm pr-8"
                                onchange="this.form.submit()">
                                <option value="">Semua Kecamatan</option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->nama }}"
                                        {{ request('kecamatan') == $kecamatan->nama ? 'selected' : '' }}>
                                        {{ $kecamatan->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <select name="jenis_disabilitas" class="border rounded-lg px-4 py-2 text-sm pr-8"
                                onchange="this.form.submit()">
                                <option value="">Semua Jenis Disabilitas</option>
                                <option value="Tunanetra"
                                    {{ request('jenis_disabilitas') == 'Tunanetra' ? 'selected' : '' }}>Tunanetra
                                </option>
                                <option value="Tunarungu"
                                    {{ request('jenis_disabilitas') == 'Tunarungu' ? 'selected' : '' }}>Tunarungu
                                </option>
                                <option value="Tunawicara"
                                    {{ request('jenis_disabilitas') == 'Tunawicara' ? 'selected' : '' }}>Tunawicara
                                </option>
                                <option value="Tunagrahita"
                                    {{ request('jenis_disabilitas') == 'Tunagrahita' ? 'selected' : '' }}>Tunagrahita
                                </option>
                                <option value="Tunadaksa"
                                    {{ request('jenis_disabilitas') == 'Tunadaksa' ? 'selected' : '' }}>Tunadaksa
                                </option>
                                <option value="Tunalaras"
                                    {{ request('jenis_disabilitas') == 'Tunalaras' ? 'selected' : '' }}>Tunalaras
                                </option>
                                <option value="Disabilitas Ganda"
                                    {{ request('jenis_disabilitas') == 'Disabilitas Ganda' ? 'selected' : '' }}>
                                    Disabilitas Ganda</option>
                            </select>
                        </div>
                    </form>
                </div>
                <button class="bg-primary text-white px-4 py-2 rounded-button flex items-center whitespace-nowrap"
                    data-bs-toggle="modal" data-bs-target="#tambahModal">
                    <i class="ri-add-line mr-2"></i> Tambah Anggota
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50   ">
                            <th class="border px-4 py-3 text-left">Nama Lengkap</th>
                            <th class="border px-4 py-3 text-left">NIK</th>
                            <th class="border px-4 py-3 text-left">Alamat</th>
                            <th class="border px-4 py-3 text-left   ">Kabupaten</th>
                            <th class="border px-4 py-3 text-left">Kecamatan</th>
                            <th class="border px-4 py-3 text-left">Tanggal Lahir</th>
                            <th class="border px-4 py-3 text-left">Agama</th>
                            <th class="border px-4 py-3 text-left">Jenis Disabilitas</th>
                            <th class="border px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr data-id="{{ $item->id }}">
                                <td class="border px-4 py-3">{{ $item->nama }}</td>
                                <td class="border px-4 py-3">{{ $item->nik }}</td>
                                <td class="border px-4 py-3">{{ $item->alamat }}</td>
                                <td class="border px-4 py-3">{{ $item->kabupaten }}</td>
                                <td class="border px-4 py-3">{{ $item->kecamatan }}</td>
                                <td class="border px-4 py-3">
                                    {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                                <td class="border px-4 py-3">{{ $item->agama }}</td>
                                <td class="border px-4 py-3">{{ $item->jenis_disabilitas }}</td>
                                <td class="border px-4 py-3">
                                    <div class="flex justify-center space-x-2">
                                        <button
                                            class="w-8 h-8 flex items-center justify-center text-green-600 hover:bg-green-50 rounded cursor-pointer edit-btn"
                                            data-id="{{ $item->id }}" data-nama="{{ $item->nama }}"
                                            data-nik="{{ $item->nik }}" data-alamat="{{ $item->alamat }}"
                                            data-kecamatan="{{ $item->kecamatan }}"
                                            data-kabupaten="{{ $item->kabupaten }}"
                                            data-tanggal_lahir="{{ $item->tanggal_lahir }}"
                                            data-agama="{{ $item->agama }}"
                                            data-jenis_disabilitas="{{ $item->jenis_disabilitas }}">
                                            <i class="ri-edit-line"></i>
                                        </button>
                                        <button
                                            class="w-8 h-8 flex items-center justify-center text-red-600 hover:bg-red-50 rounded cursor-pointer delete-btn"
                                            data-id="{{ $item->id }}">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if ($data->isEmpty())
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="flex items-center justify-between mt-6">
                <p class="text-sm text-gray-600">
                    Menampilkan {{ $data->firstItem() }} - {{ $data->lastItem() }} dari
                    {{ $data->total() }} data
                </p>
                <div class="flex items-center space-x-2">
                    {{-- Tombol Previous --}}
                    @if ($data->onFirstPage())
                        <button class="px-3 py-1 border rounded text-sm text-gray-400" disabled>Previous</button>
                    @else
                        <a href="{{ $data->previousPageUrl() }}"
                            class="px-3 py-1 border rounded hover:bg-gray-50 text-sm">Previous</a>
                    @endif

                    {{-- Nomor halaman --}}
                    @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                        @if ($page == $data->currentPage())
                            <span
                                class="px-3 py-1 border rounded bg-primary text-white text-sm">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="px-3 py-1 border rounded hover:bg-gray-50 text-sm">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Tombol Next --}}
                    @if ($data->hasMorePages())
                        <a href="{{ $data->nextPageUrl() }}"
                            class="px-3 py-1 border rounded hover:bg-gray-50 text-sm">Next</a>
                    @else
                        <button class="px-3 py-1 border rounded text-sm text-gray-400" disabled>Next</button>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-user-add-line text-2xl text-primary"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900">Form Input Data Penyandang Disabilitas</h1>
                </div>
                <form id="addForm" action="{{ url('/data-anggota-dpc') }}" method="POST">
                    @csrf
                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-user-line text-gray-400"></i>
                            </div>
                            <input type="text" id="nama" name="nama" required
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                                placeholder="Masukkan nama lengkap Anda" />
                        </div>
                    </div>

                    <!-- NIK -->
                    <div>
                        <label for="nik" class="block text-sm font-semibold text-gray-700 mb-2">
                            NIK (Nomor Induk Kependudukan) <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-id-card-line text-gray-400"></i>
                            </div>
                            <input type="text" id="nik" name="nik" required maxlength="16"
                                pattern="[0-9]{16}"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                                placeholder="Masukkan 16 digit NIK" />
                        </div>
                        <p class="text-xs text-gray-500 mt-1">NIK harus terdiri dari 16 digit angka</p>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2">Alamat
                            Lengkap</label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <i class="ri-map-pin-line text-gray-400"></i>
                            </div>
                            <textarea id="alamat" name="alamat" rows="3"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors resize-none"
                                placeholder="Masukkan alamat lengkap termasuk RT/RW"></textarea>
                        </div>
                    </div>
                    <!-- Kabupaten -->
                    <div>
                        <label for="kabupaten" class="block text-sm font-semibold text-gray-700 mb-2">Kabupaten
                            <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-map-pin-line text-gray-400"></i>
                            </div>
                            <select id="kabupaten" name="kabupaten" required
                                class="w-full pl-10 pr-8 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors appearance-none bg-white">
                                <option value="">Pilih Kabupaten</option>
                                @foreach ($kabupatens as $kabupaten)
                                    <option value="{{ $kabupaten }}">{{ $kabupaten }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="ri-arrow-down-s-line text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Kecamatan (Relasi) -->
                    <div>
                        <label for="kecamatan" class="block text-sm font-semibold text-gray-700 mb-2">Kecamatan
                            <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-map-2-line text-gray-400"></i>
                            </div>
                            <select id="kecamatan" name="kecamatan" required
                                class="w-full pl-10 pr-8 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors appearance-none bg-white">
                                <option value="">Pilih Kecamatan</option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->nama }}">{{ $kecamatan->nama }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="ri-arrow-down-s-line text-gray-400"></i>
                            </div>
                        </div>
                    </div>


                    <!-- Tanggal Lahir -->
                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal
                            Lahir</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-calendar-line text-gray-400"></i>
                            </div>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors" />
                        </div>
                    </div>

                    <!-- Agama -->
                    <div>
                        <label for="agama" class="block text-sm font-semibold text-gray-700 mb-2">Agama</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-book-open-line text-gray-400"></i>
                            </div>
                            <select id="agama" name="agama"
                                class="w-full pl-10 pr-8 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors appearance-none bg-white">
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="ri-arrow-down-s-line text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Jenis Disabilitas -->
                    <div>
                        <label for="jenis_disabilitas" class="block text-sm font-semibold text-gray-700 mb-2">
                            Jenis Disabilitas <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-wheelchair-line text-gray-400"></i>
                            </div>
                            <select id="jenis_disabilitas" name="jenis_disabilitas"
                                class="w-full pl-10 pr-8 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors appearance-none bg-white">
                                <option value="">Pilih Jenis Disabilitas</option>
                                <option value="Tunanetra">Tunanetra</option>
                                <option value="Tunawicara">Tunawicara</option>
                                <option value="Tunarungu">Tunarungu</option>
                                <option value="Tunalaras">Tunalaras</option>
                                <option value="Tunagrahita">Tunagrahita</option>
                                <option value="Tunadaksa">Tunadaksa</option>
                                <option value="Disabilitas Ganda">Disabilitas Ganda</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="ri-arrow-down-s-line text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ubahModal" tabindex="-1" aria-labelledby="ubahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-user-add-line text-2xl text-primary"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900">Form Edit Data Penyandang Disabilitas</h1>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Nama -->
                    <div>
                        <label for="editNama" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-user-line text-gray-400"></i>
                            </div>
                            <input type="text" id="editNama" name="nama" required
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                                placeholder="Masukkan nama lengkap Anda" />
                        </div>
                    </div>

                    <!-- NIK -->
                    <div>
                        <label for="editNik" class="block text-sm font-semibold text-gray-700 mb-2">
                            NIK (Nomor Induk Kependudukan) <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-id-card-line text-gray-400"></i>
                            </div>
                            <input type="text" id="editNik" name="nik" required maxlength="16"
                                pattern="[0-9]{16}"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                                placeholder="Masukkan 16 digit NIK" />
                        </div>
                        <p class="text-xs text-gray-500 mt-1">NIK harus terdiri dari 16 digit angka</p>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label for="editAlamat" class="block text-sm font-semibold text-gray-700 mb-2">Alamat
                            Lengkap</label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <i class="ri-map-pin-line text-gray-400"></i>
                            </div>
                            <textarea id="editAlamat" name="alamat" rows="3"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors resize-none"
                                placeholder="Masukkan alamat lengkap termasuk RT/RW"></textarea>
                        </div>
                    </div>
                    <!-- Kabupaten -->
                    <div>
                        <label for="editKabupaten" class="block text-sm font-semibold text-gray-700 mb-2">Kabupaten
                            <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-map-pin-line text-gray-400"></i>
                            </div>
                            <select id="editKabupaten" name="kabupaten" required
                                class="w-full pl-10 pr-8 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors appearance-none bg-white">
                                <option value="">Pilih Kabupaten</option>
                                @foreach ($kabupatens as $kabupaten)
                                    <option value="{{ $kabupaten }}">{{ $kabupaten }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="ri-arrow-down-s-line text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Kecamatan (Relasi) -->
                    <div>
                        <label for="editKecamatan" class="block text-sm font-semibold text-gray-700 mb-2">Kecamatan
                            <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-map-2-line text-gray-400"></i>
                            </div>
                            <select id="editKecamatan" name="kecamatan" required
                                class="w-full pl-10 pr-8 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors appearance-none bg-white">
                                <option value="">Pilih Kecamatan</option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->nama }}">{{ $kecamatan->nama }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="ri-arrow-down-s-line text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label for="editTanggal_lahir" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal
                            Lahir</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-calendar-line text-gray-400"></i>
                            </div>
                            <input type="date" id="editTanggal_lahir" name="tanggal_lahir"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors" />
                        </div>
                    </div>

                    <!-- Agama -->
                    <div>
                        <label for="editAgama" class="block text-sm font-semibold text-gray-700 mb-2">Agama</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-book-open-line text-gray-400"></i>
                            </div>
                            <select id="editAgama" name="agama"
                                class="w-full pl-10 pr-8 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors appearance-none bg-white">
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="ri-arrow-down-s-line text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Jenis Disabilitas -->
                    <div>
                        <label for="editJenis_disabilitas" class="block text-sm font-semibold text-gray-700 mb-2">
                            Jenis Disabilitas <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ri-wheelchair-line text-gray-400"></i>
                            </div>
                            <select id="editJenis_disabilitas" name="jenis_disabilitas"
                                class="w-full pl-10 pr-8 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors appearance-none bg-white">
                                <option value="">Pilih Jenis Disabilitas</option>
                                <option value="Tunanetra">Tunanetra</option>
                                <option value="Tunawicara">Tunawicara</option>
                                <option value="Tunarungu">Tunarungu</option>
                                <option value="Tunalaras">Tunalaras</option>
                                <option value="Tunagrahita">Tunagrahita</option>
                                <option value="Tunadaksa">Tunadaksa</option>
                                <option value="Disabilitas Ganda">Disabilitas Ganda</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="ri-arrow-down-s-line text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="text-center">
                    <div class="bg-white rounded-lg shadow-lg w-full">
                        <div class="p-6 border-b">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-semibold">Konfirmasi Hapus</h3>
                                <button id="closeDeleteModal"
                                    class="text-gray-500 hover:text-gray-700 cursor-pointer">
                                    <i class="ri-close-line ri-lg"></i>
                                </button>
                            </div>
                        </div>

                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="p-6">
                                <p class="mb-6">Apakah Anda yakin ingin menghapus data anggota ini? Tindakan ini
                                    tidak
                                    dapat
                                    dibatalkan.</p>
                                <div class="flex justify-end space-x-3">
                                    <button id="cancelDelete"
                                        class="px-4 py-2 border border-gray-300 rounded-button text-gray-700 hover:bg-gray-50 whitespace-nowrap cursor-pointer"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button id="confirmDelete"
                                        class="px-4 py-2 bg-red-600 text-white !rounded-button whitespace-nowrap cursor-pointer"
                                        type="submit">Hapus</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function showNotification(message, type) {
                var notification = $('<div class="alert alert-' + type +
                    ' alert-dismissible fade show" role="alert">' + message +
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                );
                $('.container').prepend(notification);
                setTimeout(function() {
                    notification.alert('close');
                }, 3000);
            }
            $('#addForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#addModal').modal('hide');
                        showNotification('Data berhasil ditambahkan.', 'success');
                        location.reload();
                    },
                    error: function(xhr) {
                        $('#addModal').modal('hide');
                        showNotification('Gagal menambahkan data.', 'danger');
                    }
                });
            });

            $('.edit-btn').click(function() {
                $('#editId').val($(this).data('id'));
                $('#editNama').val($(this).data('nama'));
                $('#editNik').val($(this).data('nik'));
                $('#editAlamat').val($(this).data('alamat'));
                $('#editKabupaten').val($(this).data('kabupaten'));
                $('#editKecamatan').val($(this).data('kecamatan'));
                $('#editTanggal_lahir').val($(this).data('tanggal_lahir'));
                $('#editAgama').val($(this).data('agama'));
                $('#editJenis_disabilitas').val($(this).data('jenis_disabilitas'));
                $('#editForm').attr('action', '/data-anggota-dpc/' + $(this).data('id'));
                $('#ubahModal').modal('show');
            });

            $('#editForm').submit(function(e) {
                e.preventDefault();

                let form = $(this);
                let url = form.attr('action');
                let formData = form.serializeArray();

                formData.push({
                    name: '_method',
                    value: 'PUT'
                });
                formData.push({
                    name: '_token',
                    value: $('meta[name="csrf-token"]').attr('content')
                });

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#ubahModal').modal('hide');
                        var row = $('tr[data-id="' + $('#editId').val() + '"]');
                        row.find('td:nth-child(1)').text($('#editNama').val());
                        row.find('td:nth-child(2)').text($('#editNik').val());
                        row.find('td:nth-child(3)').text($('#editAlamat').val());
                        row.find('td:nth-child(4)').text($('#editKabupaten').val());
                        row.find('td:nth-child(5)').text($('#editKecamatan').val());
                        row.find('td:nth-child(6)').text($('#editTanggal_lahir').val());
                        row.find('td:nth-child(7)').text($('#editAgama').val());
                        row.find('td:nth-child(8)').text($('#editJenis_disabilitas').val());
                        showNotification('Data berhasil diperbarui.', 'success');

                        location.reload();
                    },
                    error: function(xhr) {
                        $('#ubahModal').modal('hide');
                        showNotification('Gagal memperbarui data.', 'danger');
                    }
                });
            });

            $('.delete-btn').click(function() {
                $('#editId').val($(this).data('id'));
                $('#editNama').val($(this).data('nama'));
                $('#editNik').val($(this).data('nik'));
                $('#editAlamat').val($(this).data('alamat'));
                $('#editKabupaten').val($(this).data('kabupaten'));
                $('#editKecamatan').val($(this).data('kecamatan'));
                $('#editTanggal_lahir').val($(this).data('tanggal_lahir'));
                $('#editAgama').val($(this).data('agama'));
                $('#editJenis_disabilitas').val($(this).data('jenis_disabilitas'));
                $('#editForm').attr('action', '/data-anggota-dpc/' + $(this).data('id'));
                $('#hapusModal').modal('show');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const deleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const url = `/data-anggota-dpc/${id}`; // Sesuaikan dengan route kamu
                    deleteForm.setAttribute('action', url);
                });
            });
        });
    </script>
    </body>

</html>
