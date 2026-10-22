<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    // Menampilkan data
    public function index()
    {
        $motors = Motor::all();
        return view('welcome', compact('motors'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'qty' => 'required|numeric',
            'gambar' => 'nullable|url'
        ]);

        Motor::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'qty' => $request->qty,
            'gambar' => $request->gambar ?? 'https://images.unsplash.com/photo-1558981403-c5f9899a28bc?w=500'
        ]);

        return redirect('/')->with('success', 'Motor berhasil ditambahkan!');
    }

    // Menghapus data
    public function destroy($id)
    {
        $motor = Motor::findOrFail($id);
        $motor->delete();
        return redirect('/')->with('success', 'Motor berhasil dihapus!');
    }
}