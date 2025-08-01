<?php

namespace App\Models;

use App\Models\Kecamatan;
use App\Models\Kabupaten;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggotas';

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'kabupaten', // Ganti dengan kabupaten_id jika menggunakan relasi
        'kecamatan',
        'kecamatan_id', // Hapus jika tidak menggunakan relasi
        'tanggal_lahir',
        'agama',
        'jenis_disabilitas'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }
}
