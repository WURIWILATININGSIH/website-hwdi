<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function anggotas()
    {
        return $this->hasMany(Anggota::class);
    }

    public function kabupaten()
{
    return $this->belongsTo(Kabupaten::class);
}

}
