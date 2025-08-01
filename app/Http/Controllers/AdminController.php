<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Kecamatan;
use App\Models\Kabupaten; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function indexDpd(Request $request)
    {
        $user = Auth::user();

        $data = Anggota::select('kabupaten', DB::raw('count(*) as jumlah'))
                    ->groupBy('kabupaten')
                    ->get();

        return view('data-anggota-dpd', compact('data'));
    }

    public function modalAnggota(Request $request, $kabupaten)
    {
        $search = $request->query('search');
        $data = Anggota::where('kabupaten', $kabupaten)
                    ->when($search, function ($query) use ($search) {
                        $query->where('nama', 'like', '%' . $search . '%');
                    })->get();

        return view('modal-anggota', compact('data', 'kabupaten'));
    }

    public function create()
    {
        return view('tambah-admin'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('dashboard.dpd')->with('success', 'Admin berhasil ditambahkan!');
    }
}

