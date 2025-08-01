<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Kecamatan; 
use App\Models\User; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Kabupaten;

class AnggotaController extends Controller
{
    public function indexDpc(Request $request)
    {
        $user = Auth::user();

        $query = Anggota::query();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role == 'dpd') {
                return redirect()->route('dashboard.dpd');
            } elseif ($user->role == 'dpc') {
                return redirect()->route('dashboard.dpc');
            } else {
                Auth::logout();
                return redirect('/login')->withErrors(['role' => 'Role tidak dikenali.']);
            }
        }

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('kecamatan')) {
            $query->where('kecamatan', $request->kecamatan);
        }

        if ($request->filled('jenis_disabilitas')) {
            $query->where('jenis_disabilitas', $request->jenis_disabilitas);
        }
        
        $data = $query->where('kabupaten', $user->kabupaten)->paginate(15)->withQueryString();
        $kabupatens = [$user->kabupaten];
        $kabupatenId = $user->kabupaten_id;

        $anggotas = Anggota::with('kecamatan', 'kecamatan.kabupaten')
            ->whereHas('kecamatan.kabupaten', function ($query) use ($kabupatenId) {
                $query->where('id', $kabupatenId);
            })->get();
        $kecamatans = Kecamatan::where('kabupaten_id', $kabupatenId)->get();

        return view('data-anggota-dpc', compact('anggotas', 'kabupatens', 'kecamatans', 'data'));
    }

    public function create()
    {
        $namaKabupaten = Auth::user()->kabupaten;

        // Cari kabupaten ID dari nama
        $kabupaten = Kabupaten::where('nama', $namaKabupaten)->first();

        $kecamatans = [];

        if ($kabupaten) {
            $kecamatans = Kecamatan::where('kabupaten_id', $kabupaten->id)->get();
        }

        return view('tambah-anggota', compact('kecamatans'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $kabupatenId = $user->kabupaten_id;

        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:100',
            'nik' => 'required|digits:16|unique:anggotas,nik',
            'alamat' => 'required|max:200',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'jenis_disabilitas' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $data = $validator->validated();
            $data['kecamatan_id'] = $kabupatenId;
        }

        Anggota::create($data);

        return redirect()->route('data.anggota.dpc')->with('success', 'Data anggota berhasil ditambahkan.');
    }

    public function update(Request $request, Anggota $anggota)
    {
        $validator = $request->validate([
            'nama' => 'required|max:100',
            'nik' => [
                'required',
                'digits:16',
                Rule::unique('anggotas', 'nik')->ignore($anggota),
            ],
            'alamat' => 'required|max:200',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'jenis_disabilitas' => 'required',
        ]);

        $anggota->update($validator);

        return redirect()->route('data.anggota.dpc')->with('success', 'Data anggota berhasil diubah.');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('data.anggota.dpc')->with('success', 'Data anggota berhasil dihapus.');
    }

}
