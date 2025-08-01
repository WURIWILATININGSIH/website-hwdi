<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
            'button': '8px'
          }
        }
      }
    }
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen">
  <!-- Header -->
  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <div class="flex items-center">
          <img src="hwdi.jpg" class="h-8 w-auto" alt="HWDI Logo" />
          <h1 class="ml-3 text-xl font-semibold text-gray-900">
            Sistem Informasi Pendataan Penyandang Disabilitas HWDI LAMPUNG
          </h1>
        </div>
        <a href="{{ route('logout') }}" class="rounded bg-primary hover:bg-blue-700 text-white px-4 py-2 text-sm font-medium">Logout</a>
      </div>
    </div>
  </header>

  <!-- Navigation -->
  <nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-center space-x-8 h-14">
        <a href="{{ route('dashboard.dpc') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Ringkasan</a>
        <a href="{{ route('data.anggota.dpc') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Data Anggota</a>
        <a href="{{ route('download.data.dpc') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Download Data Anggota</a>
        <a href="{{ route('hotline.dpc') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-primary text-sm font-medium text-gray-900">Hotline</a>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="px-6 py-8">
    <div class="max-w-7xl mx-auto space-y-6">
      <!-- Page Title + Actions -->
      <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-900">Daftar Laporan</h2>
        <div class="flex items-center space-x-4">
          <div class="relative">
            <select class="bg-white border border-gray-300 rounded-button px-4 py-2 pr-8 text-sm text-gray-700 focus:ring-2 focus:ring-primary">
              <option>Semua Status</option>
              <option>Menunggu</option>
              <option>Diterima</option>
              <option>Ditolak</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
              <i class="ri-arrow-down-s-line text-gray-400"></i>
            </div>
          </div>
          <div class="relative">
            <input type="text" placeholder="Cari laporan..." class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-button text-sm focus:ring-2 focus:ring-primary">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <i class="ri-search-line text-gray-400"></i>
            </div>
          </div>
          <a href="{{ route('laporan.create') }}" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-button hover:bg-blue-700">
            <i class="ri-add-line mr-2"></i> Buat Laporan Baru
          </a>
        </div>
      </div>

      <!-- Table -->
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b">
              <tr>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Pelapor</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Kabupaten/Kota</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Isi Laporan</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($laporans as $index => $laporan)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $laporan->pelapor }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $laporan->kabupaten }}</td>
                <td class="px-6 py-4 whitespace-normal max-w-md">{{ $laporan->isi_laporan }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                <span class="{{ $laporan->status === 'Diterima' ? 'text-green-600 font-semibold' : 'text-yellow-600' }}">
                    {{ $laporan->status }}
                </span>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <!-- Pagination -->
      <div class="flex items-center justify-between">
        <div class="text-sm text-gray-700">
          Menampilkan <span class="font-medium">1</span> - <span class="font-medium">5</span> dari <span class="font-medium">25</span> laporan
        </div>
        <div class="flex items-center space-x-2">
          <button class="px-3 py-2 text-sm text-gray-500 bg-white border border-gray-300 rounded-button" disabled>
            <i class="ri-arrow-left-s-line"></i>
          </button>
          <button class="px-3 py-2 text-sm text-white bg-primary border border-primary rounded-button">1</button>
          <button class="px-3 py-2 text-sm text-gray-500 bg-white border border-gray-300 rounded-button">2</button>
          <button class="px-3 py-2 text-sm text-gray-500 bg-white border border-gray-300 rounded-button">3</button>
          <button class="px-3 py-2 text-sm text-gray-500 bg-white border border-gray-300 rounded-button">
            <i class="ri-arrow-right-s-line"></i>
          </button>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
