<?php

namespace App\Http\Controllers;

use App\Models\KeteranganTes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\DataJawaban;
use App\Models\DataPernyataan;
use App\Models\DataSolusiTerbaik;
use App\Models\HasilSolusiTerbaik;
use App\Models\User;
use App\Models\TesKesehatanMental;
use Iluminate\Contract\Encryption\DecryptException;
use Iluminate\Database\Eloquent\ModelNotFoundException;

class TesKesehatanMentalController extends Controller
{
    //index
    public function index()
    {
        $userId = Auth::user()->id;
        $teskesehatanmental = KeteranganTes::where('user_id', $userId)->get();
        $data['teskesehatanmental'] = $teskesehatanmental;
        return view('layouts.user.tes_kesehatan_mental.teskesehatanmental', $data);
    }

    //create
    public function create()
    {
        // $teskesehatanmentals = TesKesehatanMental::orderBy('pernyataan1', 'ASC')->get();
        $teskesehatanmentals = DataPernyataan::all();
        // dd($teskesehatanmentals);
        $data['teskesehatanmentals'] = $teskesehatanmentals;
        return view('layouts.user.tes_kesehatan_mental.kuisioner_create', $data);
    }
    //store
    public function store(Request $request)
    {
        $input = $request->all();
        // Hapus token CSRF dari array
        unset($input['_token']);

        // Ambil semua nilai dari array input
        $ids = array_values($input);

        // Mencari data yang memiliki id sesuai dengan array $ids
        $caridatas = DataJawaban::whereIn('id', $ids)->get();

        // Menghitung total dari pernyataan
        $total = 0;
        foreach ($caridatas as $data) {
            // Misalnya, properti 'point' ada di dalam objek $data
            if (isset($data->point)) {
                $total += (int) $data->point;
            }
        }

        // Debug output
        // dd($total);

        // Menambahkan total ke params
        $params1['total'] = $total;

        // Mendapatkan user_id dari user yang sedang login
        $userId = Auth::user()->id;
        $params1['user_id'] = $userId;

        // Menambahkan waktu saat ini ke params
        $params1['waktu'] = Carbon::now()->toDateString();

        // Mengambil jumlah data yang sudah ada untuk user_id ini
        $tesCount = KeteranganTes::where('user_id', $userId)->count();

        // Menentukan keterangan berdasarkan jumlah data yang sudah ada
        $params1['keterangan'] = 'Tes ke-' . ($tesCount + 1);
        // dd($params1);
        // Membuat data baru TesKesehatanMental
        $teskesehatanmental = KeteranganTes::create($params1);

        $params2['tes_id'] = $teskesehatanmental->id;
        $params2['waktu'] = $teskesehatanmental->waktu;

        $caridata = null;
        if ($teskesehatanmental->total >= 0 && $teskesehatanmental->total <= 13) {
            $caridata = DataSolusiTerbaik::where('awal', 0)->where('akhir', 13)->first();
        } elseif ($teskesehatanmental->total >= 14 && $teskesehatanmental->total <= 19) {
            $caridata = DataSolusiTerbaik::where('awal', 14)->where('akhir', 19)->first();
        } elseif ($teskesehatanmental->total >= 20 && $teskesehatanmental->total <= 28) {
            $caridata = DataSolusiTerbaik::where('awal', 20)->where('akhir', 28)->first();
        } elseif ($teskesehatanmental->total >= 29 && $teskesehatanmental->total <= 63) {
            $caridata = DataSolusiTerbaik::where('awal', 29)->where('akhir', 63)->first();
        }

        if ($caridata) {
            $params2['user_id'] = Auth::user()->id;
            $params2['datasolusiterbaik_id'] = $caridata->id;
            $params2['keterangan_id'] = $teskesehatanmental->id;
            $hasil = HasilSolusiTerbaik::create($params2);
            foreach ($caridatas as $tambahdata) {
                $params3['keterangan_id'] = $teskesehatanmental->id;
                $params3['user_id'] = Auth::user()->id;
                $params3['jawaban_id'] = $tambahdata->id;
                // dd($params3);
                TesKesehatanMental::create($params3);
            }
        } else {
            // Handle the case where no matching DataSolusiTerbaik was found
            return redirect()->route('layouts.user.tes_kesehatan_mental.teskesehatanmental')
                ->with('error', 'Solusi terbaik tidak ditemukan.');
        }

        // Menampilkan alert berdasarkan hasil penyimpanan
        if ($teskesehatanmental && $hasil) {
            alert()->success('Success', 'Data Berhasil Disimpan');
        } else {
            alert()->error('Error', 'Data Gagal Disimpan');
        }

        // Redirect ke rute yang diinginkan
        return redirect()->route('layouts.user.tes_kesehatan_mental.teskesehatanmental');
    }
}
