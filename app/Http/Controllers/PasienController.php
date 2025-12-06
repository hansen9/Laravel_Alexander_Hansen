<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        if (!session('user')) {
            return redirect('/login');
        }

        $rumahSakit = RumahSakit::all();

        $query = Pasien::with('rumahSakit');

        if (request('RSID')) {
            $query->where('RSID', request('RSID'));
        }

        $pasien = $query->paginate(10);
        return view('pasien.index', compact('pasien', 'rumahSakit'));
    }

    public function create()
    {
        if (!session('user')) {
            return redirect('/login');
        }

        $rumahSakit = RumahSakit::all();
        return view('pasien.create', compact('rumahSakit'));
    }

    public function store(Request $request)
    {
        if (!session('user')) {
            return redirect('/login');
        }

        $request->validate([
            'namaPasien' => 'required|string',
            'alamat' => 'required|string',
            'noTlp' => 'required|string',
            'RSID' => 'required|exists:rumah_sakit,id',
        ]);

        Pasien::create($request->all());

        return redirect('/pasien')->with('success', 'Pasien berhasil ditambahkan');
    }

    public function show(Pasien $pasien)
    {
        if (!session('user')) {
            return redirect('/login');
        }

        return view('pasien.show', compact('pasien'));
    }

    public function edit(Pasien $pasien)
    {
        if (!session('user')) {
            return redirect('/login');
        }

        $rumahSakit = RumahSakit::all();
        return view('pasien.edit', compact('pasien', 'rumahSakit'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        if (!session('user')) {
            return redirect('/login');
        }

        $request->validate([
            'namaPasien' => 'required|string',
            'alamat' => 'required|string',
            'noTlp' => 'required|string',
            'RSID' => 'required|exists:rumah_sakit,id',
        ]);

        $pasien->update($request->all());

        return redirect('/pasien')->with('success', 'Pasien berhasil diperbarui');
    }

    public function destroy(Pasien $pasien)
    {
        if (!session('user')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $pasien->delete();

        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Pasien berhasil dihapus']);
        }

        return redirect('/pasien')->with('success', 'Pasien berhasil dihapus');
    }
}
