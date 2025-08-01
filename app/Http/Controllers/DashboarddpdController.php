<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kabupaten;

class DashboardDPDController extends Controller
{
    public function index()
    {
        // $kabupatens = Kabupaten::with('kecamatans')->get();
        $kabupatens = Kabupaten::get();
        $jenisDisabilitas = [
            'Tunanetra', 'Tunarungu', 'Tunawicara',
            'Tunagrahita', 'Tunadaksa', 'Tunalaras', 'Disabilitas Ganda'
        ];

        $dataPerKabupaten = [];
        foreach ($kabupatens as $kab) {
            $data = ['nama' => $kab->nama];
            foreach ($jenisDisabilitas as $jenis) {
                $data[$jenis] = Anggota::whereHas('kecamatan', function ($query) use ($kab) {
                    $query->where('kabupaten_id', $kab->id);
                })->where('jenis_disabilitas', $jenis)->count();
            }
            $dataPerKabupaten[] = $data;
        }

        $disabilitasSummary = [];
        foreach ($jenisDisabilitas as $jenis) {
            $disabilitasSummary[] = [
                'name' => $jenis,
                'value' => Anggota::where('jenis_disabilitas', $jenis)->count()
            ];
        }

        return view('dashboard-dpd', compact('dataPerKabupaten', 'disabilitasSummary'));
    }
}
