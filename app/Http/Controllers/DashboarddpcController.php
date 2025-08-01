<?php

// Di dalam file: app/Http/Controllers/DashboardDpcController.php
namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Auth;

class DashboardDpcController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kabupaten_id = $user->kabupaten_id;

        $kecamatans = Kecamatan::where('kabupaten_id', $kabupaten_id)->get();

        $jenisDisabilitas = [
            'Tunanetra', 'Tunarungu', 'Tunawicara',
            'Tunagrahita', 'Tunadaksa', 'Tunalaras', 'Disabilitas Ganda'
        ];

        $dataPerKecamatan = [];
        foreach ($kecamatans as $kec) {
            $data = ['nama' => $kec->nama];
            $total = 0;
            foreach ($jenisDisabilitas as $jenis) {
                $count = Anggota::where('kecamatan_id', $kec->id)
                    ->where('jenis_disabilitas', $jenis)
                    ->count();
                $data[$jenis] = $count;
                $total += $count;
            }
            $data['total'] = $total;
            $dataPerKecamatan[] = $data;
        }

        $disabilitasSummary = [];
        foreach ($jenisDisabilitas as $jenis) {
            $disabilitasSummary[] = [
                'name' => $jenis,
                'value' => Anggota::whereHas('kecamatan', function ($query) use ($kabupaten_id) {
                    $query->where('kabupaten_id', $kabupaten_id);
                })->where('jenis_disabilitas', $jenis)->count()
            ];
        }

        return view('dashboard-dpc', [
            'dataPerKecamatan' => $dataPerKecamatan,
            'disabilitasSummary' => $disabilitasSummary
        ]);
    }
}
