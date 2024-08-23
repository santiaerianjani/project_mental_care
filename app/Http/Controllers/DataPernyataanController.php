<?php

namespace App\Http\Controllers;

use App\Models\DataPernyataan;
use App\Models\DataJawaban;
use Illuminate\Http\Request;

class DataPernyataanController extends Controller
{
    //index
    public function index()
    {
        $datapernyataan = DataPernyataan::all();
        $data['datapernyataan'] = $datapernyataan;
        return view('layouts.admin.data_pernyataan.datapernyataan', $data);
    }

    //create
    public function create()
    {
        return view('layouts.admin.data_pernyataan.datapernyataan_create',);
    }

    //store
    public function store(Request $request)
    {
        $params = $request->all();
        DataPernyataan::create($params);
        return redirect()->route('layouts.admin.data_pernyataan.datapernyataan',);
    }

    //tambah jawaban
    public function tambahopsi(Request $request, $id)
    {
        $params = $request->all();
        $params['pernyataan_id'] = $id;
        //dd($params);
        DataJawaban::create($params);
        return redirect()->route('layouts.admin.data_pernyataan.datapernyataan',);
    }

    public function destroy($id)
{
    // Ambil data pernyataan berdasarkan ID
    $pernyataan = DataPernyataan::where('id', $id)->first();

    if ($pernyataan) {
        // Ambil semua jawaban yang terkait dengan pernyataan
        $jawaban = DataJawaban::where('pernyataan_id', $pernyataan->id)->get();

        // Hapus setiap jawaban menggunakan foreach
        foreach ($jawaban as $item) {
            $item->delete();
        }

        // Hapus pernyataan setelah semua jawaban terkait dihapus
        $pernyataan->delete();
    }

    // Redirect atau response sesuai kebutuhan setelah proses hapus
    return redirect()->route('layouts.admin.data_pernyataan.datapernyataan')->with('success', 'Data pernyataan dan jawaban terkait berhasil dihapus.');
}

}
