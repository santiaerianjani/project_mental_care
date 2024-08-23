<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use App\Models\HasilSolusiTerbaik;
use App\Models\TesKesehatanMental;
use Iluminate\Contract\Encryption\DecryptException;
use Iluminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;


class HasilSolusiTerbaikController extends Controller
{
    public function index()
    {
        $hasilsolusiterbaiks = HasilSolusiTerbaik::all();
        $data['hasilsolusiterbaiks']= $hasilsolusiterbaiks;
        // $userId = Auth::user()->id;
        // $hasilsolusiterbaiks = HasilSolusiTerbaik::join('tes_kesehatan_mentals', 'tes_kesehatan_mentals.id', '=', 'hasil_solusi_terbaiks.tes_id')->where('tes_kesehatan_mentals.user_id',$userId )->get();
        return view('layouts.user.hasil_solusi_terbaik.hasilsolusiterbaik', $data);
    }


    //create
    public function create()
    {
        $hasilsolusiterbaiks = HasilSolusiTerbaik::orderBy('name_lengkap', 'ASC')->get();
        $data['hasilsolusiterbaiks'] = $hasilsolusiterbaiks;
        return view('layouts.user.hasil_solusi_terbaik.hasilsolusiterbaik_create', $data);
    }
    //store
    public function store(Request $request)
    {
        // Mengambil semua input dari request
        $params1 = $request->all();

        // Menghitung total dari pernyataan
        $total = 0;
        for ($i = 1; $i <= 21; $i++) {
            $total += $request->input('pernyataan' . $i, 0);
        }

        // Menambahkan total ke params
        $params1['total'] = $total;

        // Mendapatkan user_id dari user yang sedang login
        $userId = Auth::user()->id;
        $params1['user_id'] = $userId;

        // Menambahkan waktu saat ini ke params
        $params1['waktu'] = Carbon::now()->toDateString();

        // Mengambil jumlah data yang sudah ada untuk user_id ini
        $tesCount = TesKesehatanMental::where('user_id', $userId)->count();

        // Menentukan keterangan berdasarkan jumlah data yang sudah ada
        $params1['keterangan'] = 'Tes ke-' . ($tesCount + 1);

        // Membuat data baru TesKesehatanMental
        $teskesehatanmental = TesKesehatanMental::create($params1);

        $params2['tes_id'] = $teskesehatanmental->id;
        $params2['waktu'] = $teskesehatanmental->waktu;

        $caridata = null;
        if ($teskesehatanmental->total >= 0 && $teskesehatanmental->total <= 13) {
            $caridata = HasilSolusiTerbaik::where('awal', 0)->where('akhir', 13)->first();
        } elseif ($teskesehatanmental->total >= 14 && $teskesehatanmental->total <= 19) {
            $caridata = HasilSolusiTerbaik::where('awal', 14)->where('akhir', 19)->first();
        } elseif ($teskesehatanmental->total >= 20 && $teskesehatanmental->total <= 28) {
            $caridata = HasilSolusiTerbaik::where('awal', 20)->where('akhir', 28)->first();
        } elseif ($teskesehatanmental->total >= 29 && $teskesehatanmental->total <= 63) {
            $caridata = HasilSolusiTerbaik::where('awal', 29)->where('akhir', 63)->first();
        }

        if ($caridata) {
            $params2['datasolusiterbaik_id'] = $caridata->id;
            $params2['hasil_diagnosa'] = $teskesehatanmental->total; // Menambahkan hasil diagnosa ke params2
            $params2['solusi_terbaik'] = $caridata->solusi_terbaik; // Menambahkan solusi terbaik ke params2
            $hasil = HasilSolusiTerbaik::create($params2);
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
