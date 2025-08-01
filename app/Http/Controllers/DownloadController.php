<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Barryvdh\DomPDF\Facade\Pdf;

class DownloadController extends Controller
{
    public function index(Request $request)
{
    try {
        $path = $request->path();

        if ($path === 'download-dpd') {
            return view('download-dpd');

        } elseif ($path === 'download-dpc') {
            $user = Auth::user();

            if (!$user) {
                return redirect()->route('login')->with('error', 'User tidak ditemukan');
            }

            if (!$user->kabupaten_id) {
                return view('download-dpc-error', [
                    'error' => 'User tidak memiliki kabupaten yang ditugaskan',
                    'user' => $user
                ]);
            }

            $kabupaten = Kabupaten::find($user->kabupaten_id);
            if (!$kabupaten) {
                return view('download-dpc-error', [
                    'error' => 'Kabupaten tidak ditemukan',
                    'user' => $user
                ]);
            }

            $kecamatans = Kecamatan::where('kabupaten_id', $kabupaten->id)->get();

            return view('download-dpc', compact('kabupaten', 'kecamatans', 'user'));
        }

        // ✅ Tambahkan ini agar tidak kosong
        abort(404);

    } catch (\Exception $e) {
        return response()->view('error', [
            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
        ], 500);
    }
}

    // Keep your existing PDF method
    public function generatePDF(Request $request)
    {
        try {
            $query = Anggota::query();

            if ($request->kabupaten) {
                $query->where('kabupaten', $request->kabupaten);
            }

            if ($request->kecamatan) {
                $query->where('kecamatan_id', $request->kecamatan);
            }

            if ($request->jenis_disabilitas) {
                $query->where('jenis_disabilitas', $request->jenis_disabilitas);
            }

            $anggotas = $query->get();

            $kabupaten = Kabupaten::where('nama', $request->kabupaten)->first();
            $kecamatan = Kecamatan::find($request->kecamatan);
            $jenis_disabilitas = $request->jenis_disabilitas;

            $pdf = Pdf::loadView('pdf', compact('anggotas', 'kabupaten', 'kecamatan', 'jenis_disabilitas'));

            return $pdf->download('data-anggota.pdf');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Error generating PDF: ' . $e->getMessage());
        }
    }
}