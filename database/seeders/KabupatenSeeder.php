<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kabupaten;

class KabupatenSeeder extends Seeder
{
    public function run(): void
    {
        Kabupaten::create(['nama' => 'Kabupaten Lampung Selatan']);
        Kabupaten::create(['nama' => 'Kabupaten Pringsewu']);
        Kabupaten::create(['nama' => 'Kabupaten Pesawaran']);
    }
}
