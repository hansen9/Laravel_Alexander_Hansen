<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index()
    {
        if (!session('user')) {
            return redirect('/login');
        }

        $rumahSakit = RumahSakit::paginate(10);
        return view('rumah_sakit.index', compact('rumahSakit'));
    }

    public function create()
    {
        if (!session('user')) {
            return redirect('/login');
        }

        return view('rumah_sakit.create');
    }

    public function store(Request $request)
    {
        if (!session('user')) {
            return redirect('/login');
        }

        $request->validate([
            'namaRS' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'tlp' => 'required|string',
        ]);

        RumahSakit::create($request->all());

        return redirect('/rumah-sakit')->with('success', 'Rumah Sakit berhasil ditambahkan');
    }

    public function show(RumahSakit $rumahSakit)
    {
        if (!session('user')) {
            return redirect('/login');
        }

        return view('rumah_sakit.show', compact('rumahSakit'));
    }

    public function edit(RumahSakit $rumahSakit)
    {
        if (!session('user')) {
            return redirect('/login');
        }

        return view('rumah_sakit.edit', compact('rumahSakit'));
    }

    public function update(Request $request, RumahSakit $rumahSakit)
    {
        if (!session('user')) {
            return redirect('/login');
        }

        $request->validate([
            'namaRS' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'tlp' => 'required|string',
        ]);

        $rumahSakit->update($request->all());

        return redirect('/rumah-sakit')->with('success', 'Rumah Sakit berhasil diperbarui');
    }

    public function destroy(RumahSakit $rumahSakit)
    {
        if (!session('user')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $rumahSakit->delete();

        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Rumah Sakit berhasil dihapus']);
        }

        return redirect('/rumah-sakit')->with('success', 'Rumah Sakit berhasil dihapus');
    }
}
