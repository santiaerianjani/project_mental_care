<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use App\Models\User;
use App\Models\DataArtikel;

class DataArtikelController extends Controller
{
    public function index()
    {
        $dataartikel = DataArtikel::all();
        return view('layouts.admin.data_artikel.dataartikel', compact('dataartikel'));
    }

    public function create()
    {
        return view('layouts.admin.data_artikel.dataartikel_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'waktu' => 'required|date',
            'judul_artikel' => 'required|string|max:255',
            'isi_artikel' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link_artikel' => 'required|url',
        ]);

        try {
            $imageName = null;
            if ($request->hasFile('gambar')) {
                $imageName = $request->file('gambar')->store('images', 'public');
            }

            DataArtikel::create([
                'waktu' => $request->waktu,
                'judul_artikel' => $request->judul_artikel,
                'isi_artikel' => $request->isi_artikel,
                'gambar' => $imageName ? basename($imageName) : null,
                'link_artikel' => $request->link_artikel,
            ]);

            return redirect()->route('layouts.admin.data_artikel.dataartikel')->with('success', 'Artikel berhasil dibuat!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function uploadImage(Request $request)
    {
        // Validasi bahwa file harus berupa gambar dengan ekstensi jpg, jpeg, atau png
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Dapatkan file dari request
            $file = $request->file('gambar');

            // Buat nama file unik dengan menambahkan timestamp
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Simpan file ke direktori storage/public/images
            $file->storeAs('public/images', $filename);

            // Simpan nama file ke database (contoh)
            // $dataartikels = new DataArtikel(); // Pastikan Anda menginisialisasi model ini sesuai kebutuhan Anda
            // $dataartikels->gambar = $filename;
            // $dataartikels->save();

            // Anda bisa mengembalikan URL gambar jika diperlukan
            $imageUrl = Storage::url('images/' . $filename);
        }

        return redirect()->back()->with('success', 'Gambar berhasil diupload.');
    }


    public function edit($id)
    {
        $artikel = DataArtikel::findOrFail($id);
        return view('layouts.admin.data_artikel.dataartikel_edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $dataartikels = DataArtikel::findOrFail($id);

        // Validasi input
        $request->validate([
            'waktu' => 'required|date',
            'judul_artikel' => 'required|string|max:255',
            'isi_artikel' => 'required|string',
            'link_artikel' => 'required|url',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Proses gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($dataartikels->gambar) {
                Storage::delete('public/images/' . $dataartikels->gambar);
            }

            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);

            // Simpan nama file gambar baru ke database
            $dataartikels->gambar = $filename;
        }

        // Simpan perubahan data lain jika ada
        $dataartikels->waktu = $request->input('waktu');
        $dataartikels->judul_artikel = $request->input('judul_artikel');
        $dataartikels->isi_artikel = $request->input('isi_artikel');
        $dataartikels->link_artikel = $request->input('link_artikel');

        // Simpan perubahan ke database
        $dataartikels->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $artikel = DataArtikel::findOrFail($id);

        if ($artikel->gambar) {
            Storage::disk('public')->delete('images/' . $artikel->gambar);
        }

        $artikel->delete();

        return redirect()->route('layouts.admin.data_artikel.dataartikel')->with('success', 'Artikel berhasil dihapus!');
    }
}
