<?php

namespace App\Http\Controllers;
use App\Models\Laporan;

use Illuminate\Http\Request;

class HotlinedpdController extends Controller
{
    public function index()
    {
        $laporans = Laporan::all(); // Eloquent collection, bukan array

        return view('hotline-dpd', compact('laporans'));
    }

    public function terimaLaporan($id)
    {
        // Logika update status laporan jadi 'Diterima'
        // Contoh: Laporan::find($id)->update(['status' => 'Diterima']);

        return redirect()->route('hotline.dpd')->with('success', 'Laporan sudah diterima.');
    }
}
