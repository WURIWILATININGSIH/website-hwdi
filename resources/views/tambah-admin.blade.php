<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Data Admin - HWDI LAMPUNG</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#000000" data-border-radius="small"></script>
</head>
<body class="bg-gray-50 min-h-screen">

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

    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center space-x-8 h-14">
                <a href="{{ route('dashboard.dpd') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Ringkasan</a>
                <a href="{{ route('data.admin') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-custom text-sm font-medium text-gray-900">Data Admin</a>
                <a href="{{ route('data.anggota.dpd') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Data Anggota</a>
                <a href="{{ route('download.data.dpd') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Download Data Anggota</a>
                <a href="{{ route('hotline.dpd') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Hotline</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Tombol Kembali -->
        <a href="{{ route('data.admin') }}" class="mb-6 inline-block px-4 py-2 bg-custom text-white !rounded-button hover:bg-opacity-90">
            Kembali
        </a>

        <!-- Form tambah admin, disembunyikan awalnya -->
        <div class="bg-white shadow-sm !rounded-button p-6 mb-8" id="form-tambah-admin">
            <h2 class="text-xl font-semibold mb-6">Form Tambah Admin</h2>
            <form class="space-y-4">
                <div class="grid grid-cols-1 gap-4">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Nama Admin DPC</label>
                        <input type="text" class="block w-full !rounded-button border-gray-300 focus:border-custom focus:ring-custom text-lg py-2" placeholder="Masukkan nama admin"/>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Kabupaten/Kota</label>
                        <select class="block w-full !rounded-button border-gray-300 focus:border-custom focus:ring-custom text-lg py-2">
                            <option value="">Pilih Kabupaten/Kota</option>
                            <option>Bandar Lampung</option>
                            <option>Metro</option>
                            <option>Lampung Selatan</option>
                            <option>Lampung Tengah</option>
                            <option>Lampung Utara</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" class="block w-full !rounded-button border-gray-300 focus:border-custom focus:ring-custom text-lg py-2" placeholder="Masukkan email"/>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" class="block w-full !rounded-button border-gray-300 focus:border-custom focus:ring-custom text-lg py-2" placeholder="Masukkan password"/>
                    </div>  
                </div>
                <div class="pt-4">
                    <button type="submit" class="bg-custom text-white px-6 py-2 !rounded-button shadow-md hover:bg-custom-dark transition">
                        Tambah Admin
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
