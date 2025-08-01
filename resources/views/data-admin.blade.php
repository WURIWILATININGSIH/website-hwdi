<!DOCTYPE html>
<html lang="id"><head>
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
                <a href="{{ route('data.admin') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-custom text-sm font-medium text-gray-900">Data Admin</a>
                <a href="{{ route('data.anggota.dpd') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Data Anggota</a>
                <a href="{{ route('download.data.dpd') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Download Data Anggota</a>
                <a href="{{ route('hotline.dpd') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Hotline</a>
            </div>
        </div>
    </nav>
    <main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="sm:flex sm:items-center sm:justify-between mb-8">
        <a href="{{ route('admin.create') }}">
    <button class="!rounded-button bg-custom text-white px-4 py-2 text-sm font-medium hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-custom focus:ring-offset-2">
        <i class="fas fa-plus mr-2"></i>Tambah Admin
    </button>
</a>
            <div class="mt-4 sm:mt-0">
                <div class="relative">
                    <input type="text" placeholder="Search..." class="block w-full !rounded-button border-gray-300 pl-10 pr-4 py-2 text-sm placeholder-gray-500 focus:border-custom focus:ring-custom"/>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden !rounded-button">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Admin DPC</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kabupaten/Kota</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Password</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Admin DPC Bandar Lampung</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">admin.bandarlampung@hwdi.org</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Bandar Lampung</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">********</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 space-x-2">
                            <button class="text-blue-600 hover:text-blue-900" title="Edit"><i class="fas fa-edit"></i></button>
                            <button class="text-red-600 hover:text-red-900" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                            <button class="text-yellow-600 hover:text-yellow-900" title="Generate Password"><i class="fas fa-key"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Admin DPC Metro</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">admin.metro@hwdi.org</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Metro</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">********</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 space-x-2">
                            <button class="text-blue-600 hover:text-blue-900" title="Edit"><i class="fas fa-edit"></i></button>
                            <button class="text-red-600 hover:text-red-900" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                            <button class="text-yellow-600 hover:text-yellow-900" title="Generate Password"><i class="fas fa-key"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>




</body></html>
