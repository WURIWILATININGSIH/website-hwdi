<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Admin DPD Lampung",
            "email" => "admin.dpd@hwdilampung.or.id",
            "password" => Hash::make("admin.dpd"),
            "role" => "dpd",
        ]);
    }
}
