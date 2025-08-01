<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Laporan</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#64748b'
                    },
                    borderRadius: {
                        DEFAULT: '8px',
                        button: '8px'
                    },
                    fontFamily: {
                        inter: ['Inter', 'sans-serif']
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

<body class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-2xl mx-auto px-6">
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="ri-file-text-line text-2xl text-primary"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Form Laporan</h1>
                <p class="text-gray-600">Sampaikan laporan Anda dengan lengkap dan jelas</p>
            </div>

            <form action="{{ route('laporan.store') }}" method="POST">
                @csrf

                {{-- Nama Pelapor --}}
                <div class="mb-4">
                    <label for="pelapor" class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Pelapor
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ri-user-line text-gray-400 text-sm"></i>
                        </div>
                        <input type="text" id="pelapor" name="pelapor"
                            class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all duration-200 text-sm"
                            placeholder="Masukkan nama lengkap Anda" required>
                    </div>
                </div>

                {{-- Isi Laporan --}}
                <div class="mb-4">
                    <label for="isi-laporan" class="block text-sm font-semibold text-gray-700 mb-2">
                        Isi Laporan
                    </label>
                    <div class="relative">
                        <textarea id="isi-laporan" name="isi_laporan" rows="8"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all duration-200 text-sm resize-none"
                            placeholder="Jelaskan laporan Anda secara detail." required></textarea>
                        <div class="absolute bottom-3 right-3">
                            <i class="ri-edit-line text-gray-300 text-sm"></i>
                        </div>
                    </div>
                </div>

                {{-- Tombol Submit --}}
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-primary hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-button transition-all duration-200 whitespace-nowrap flex items-center justify-center space-x-2 shadow-lg hover:shadow-xl">
                        <i class="ri-send-plane-line text-sm"></i>
                        <span>Kirim Laporan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Validasi --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const namaInput = document.getElementById('pelapor');
            const isiInput = document.getElementById('isi-laporan');
            const submitBtn = form.querySelector('button[type="submit"]');

            function validateForm() {
                const namaValid = namaInput.value.trim().length >= 2;
                const isiValid = isiInput.value.trim().length >= 50;

                if (namaValid && isiValid) {
                    submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    submitBtn.disabled = false;
                } else {
                    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    submitBtn.disabled = true;
                }
            }

            namaInput.addEventListener('input', validateForm);
            isiInput.addEventListener('input', validateForm);

            validateForm();
        });
    </script>

    {{-- Loading Simulasi --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                // e.preventDefault(); // Hapus ini jika ingin form benar-benar terkirim ke backend

                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;

                submitBtn.innerHTML = `
                    <i class="ri-loader-4-line text-sm animate-spin"></i>
                    <span>Mengirim...</span>
                `;
                submitBtn.disabled = true;
            });
        });
    </script>
</body>

</html>
