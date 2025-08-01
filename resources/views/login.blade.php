<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <!-- Logo dan Judul di pojok kiri atas -->
  <div class="absolute top-4 left-4 flex items-center space-x-2">
    <img src="hwdi.jpg" alt="Logo HWDI" class="w-10 h-10 object-contain"/>
    <span class="text-base md:text-lg font-semibold text-gray-800">
      Selamat Datang Administrator HWDI Lampung
    </span>
  </div>

  <!-- Kotak Form Login -->
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
   <h2 class="text-2xl font-bold mb-6 text-center">Masuk</h2>
<form method="POST" action="{{ route('login.process') }}">
@csrf
                <div class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-custom focus:border-custom sm:text-sm" placeholder="Masukkan email Anda">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-custom focus:border-custom sm:text-sm" placeholder="Masukkan kata sandi">
                        </div>
                    </div>
                </div>

                <div class="mt-4">
    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
        Masuk
    </button>
</div>

            </form>

  </div>
 </body>
</html>
