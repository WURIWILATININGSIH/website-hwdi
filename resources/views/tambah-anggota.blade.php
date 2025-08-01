<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Input Data Penyandang Disabilitas</title>

  <!-- Tailwind & Fonts -->
  <script src="https://cdn.tailwindcss.com/3.4.16"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" />

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#2196F3',
            secondary: '#FFC107',
          },
          borderRadius: {
            'button': '8px',
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          },
        },
      },
    };
  </script>

  <style>
    :where([class^="ri-"])::before {
      content: "\f3c2";
    }
  </style>
</head>

<body class="bg-gray-50 font-sans">
  <div class="min-h-screen py-12 px-4">
    <div class="max-w-2xl mx-auto">
      <div class="bg-white rounded-lg shadow-lg p-8">
        <!-- Judul Form -->
        <div class="text-center mb-8">
          <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="ri-user-add-line text-2xl text-primary"></i>
          </div>
          <h1 class="text-2xl font-bold text-gray-900">Form Input Data Penyandang Disabilitas</h1>
        </div>

        <form id="disabilityForm" action="{{ route('data.anggota.dpc.store') }}" method="POST" class="space-y-6">
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
              <input type="text" id="nik" name="nik" required maxlength="16" pattern="[0-9]{16}"
                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                placeholder="Masukkan 16 digit NIK" />
            </div>
            <p class="text-xs text-gray-500 mt-1">NIK harus terdiri dari 16 digit angka</p>
          </div>

          <!-- Alamat -->
          <div>
            <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Lengkap</label>
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
       <label for="kabupaten_id" class="block text-sm font-semibold text-gray-700 mb-2">Kabupaten <span class="text-red-500">*</span></label>
        <div class="relative">
         <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
         <i class="ri-map-pin-line text-gray-400"></i>
    </div>
    <select id="kabupaten_id" name="kabupaten_id" required
      class="w-full pl-10 pr-8 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors appearance-none bg-white">
      <option value="">Pilih Kabupaten</option>
      @foreach ($kabupatens as $kabupaten)
        <option value="{{ $kabupaten->id }}">{{ $kabupaten->nama }}</option>
      @endforeach
    </select>
    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
      <i class="ri-arrow-down-s-line text-gray-400"></i>
    </div>
  </div>
</div>

          <!-- Kecamatan (Relasi) -->
        <div>
         <label for="kecamatan_id" class="block text-sm font-semibold text-gray-700 mb-2">Kecamatan <span class="text-red-500">*</span></label>
         <div class="relative">
         <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
           <i class="ri-map-2-line text-gray-400"></i>
         </div>
         <select id="kecamatan_id" name="kecamatan_id" required
           class="w-full pl-10 pr-8 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors appearance-none bg-white">
              <option value="">Pilih Kecamatan</option>
              @foreach ($kecamatans as $kecamatan)
                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                  @endforeach
                 </select>
           <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
           <i class="ri-arrow-down-s-line text-gray-400"></i>
             </div>
             </div>
            </div>


          <!-- Tanggal Lahir -->
          <div>
            <label for="tanggalLahir" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="ri-calendar-line text-gray-400"></i>
              </div>
              <input type="date" id="tanggalLahir" name="tanggal_lahir"
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
                <option value="islam">Islam</option>
                <option value="kristen">Kristen</option>
                <option value="katolik">Katolik</option>
                <option value="hindu">Hindu</option>
                <option value="buddha">Buddha</option>
                <option value="konghucu">Konghucu</option>
              </select>
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <i class="ri-arrow-down-s-line text-gray-400"></i>
              </div>
            </div>
          </div>

          <!-- Jenis Disabilitas -->
          <div>
            <label for="jenisDisabilitas" class="block text-sm font-semibold text-gray-700 mb-2">
              Jenis Disabilitas <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="ri-wheelchair-line text-gray-400"></i>
              </div>
              <select id="jenisDisabilitas" name="jenis_disabilitas"
                class="w-full pl-10 pr-8 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors appearance-none bg-white">
                <option value="">Pilih Jenis Disabilitas</option>
                <option value="tunanetra">Tunanetra</option>
                <option value="tunawicara">Tunawicara</option>
                <option value="tunarungu">Tunarungu</option>
                <option value="tunalaras">Tunalaras</option>
                <option value="tuna-grahita">Tuna Grahita</option>
                <option value="tuna-daksa">Tuna Daksa</option>
                <option value="disabilitas-ganda">Disabilitas Ganda</option>
              </select>
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <i class="ri-arrow-down-s-line text-gray-400"></i>
              </div>
            </div>
          </div>

          <!-- Tombol Simpan -->
          <div class="pt-6">
            <button type="submit"
              class="w-full bg-primary hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-button transition-colors duration-200 flex items-center justify-center gap-2">
              <i class="ri-save-line"></i>
              Simpan Data
            </button>
          </div>
        </form>
      </div>

      <!-- Catatan -->
      <div class="text-center mt-8 text-sm text-gray-500">
        <p>Data yang Anda masukkan akan dijaga kerahasiaannya sesuai dengan ketentuan yang berlaku.</p>
      </div>
    </div>
  </div>

  <!-- Validasi & Interaksi -->
 <script>
  document.addEventListener('DOMContentLoaded', function () 
  // Dropdown dependent Kecamatan berdasarkan Kabupaten
const kabupatenSelect = document.getElementById('kabupaten_id');
const kecamatanSelect = document.getElementById('kecamatan_id');

kabupatenSelect.addEventListener('change', function () {
  const kabupatenId = this.value;
  kecamatanSelect.innerHTML = '<option value="">Memuat...</option>';

  fetch(`/get-kecamatan/${kabupatenId}`)
    .then(response => response.json())
    .then(data => {
      kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
      data.forEach(kecamatan => {
        const option = document.createElement('option');
        option.value = kecamatan.id;
        option.text = kecamatan.nama;
        kecamatanSelect.appendChild(option);
      });
    })
    .catch(error => {
      console.error('Gagal memuat data kecamatan:', error);
      kecamatanSelect.innerHTML = '<option value="">Gagal memuat</option>';
    });
});

  {
    const form = document.getElementById('disabilityForm');
    const nikInput = document.getElementById('nik');

    nikInput.addEventListener('input', function (e) {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length > 16) {
        value = value.substring(0, 16);
      }
      e.target.value = value;
    });

    form.addEventListener('submit', function (e) {
      const nik = document.getElementById('nik').value;
      if (nik.length !== 16) {
        e.preventDefault();
        alert('NIK harus terdiri dari 16 digit angka');
        return;
      }

      const data = {
        nama: document.getElementById('nama').value,
        nik: nik,
        alamat: document.getElementById('alamat').value,
        kecamatan: document.getElementById('kecamatan_id').selectedOptions[0].text,
        tanggalLahir: document.getElementById('tanggalLahir').value,
        agama: document.getElementById('agama').value,
        jenisDisabilitas: document.getElementById('jenisDisabilitas').value,
      };

      alert('Data berhasil disimpan!\n\n' +
        'Nama: ' + data.nama + '\n' +
        'NIK: ' + data.nik + '\n' +
        'Alamat: ' + data.alamat + '\n' +
        'Kecamatan: ' + data.kecamatan + '\n' +
        'Tanggal Lahir: ' + data.tanggalLahir + '\n' +
        'Agama: ' + data.agama + '\n' +
        'Jenis Disabilitas: ' + data.jenisDisabilitas);
    });
  });
</script> <!-- INI YANG HARUS DITAMBAHKAN -->


  </script>
</body>

</html>
