<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use App\Models\DataRekamMedis;
use App\Models\TesKesehatanMental;
use App\Models\HasilSolusiTerbaik;
use Carbon\Carbon;

class DataRekamMedisController extends Controller
{
    //index
    public function index()
    {
        $hasilsolusiterbaik = HasilSolusiTerbaik::get()->unique('user_id');
        return view('layouts.admin.data_rekam_medis.datarekammedis', compact('hasilsolusiterbaik'));
    }

    //hapus
    public function destroy($id)
    {
        $item = TesKesehatanMental::where('id', $id)->first();
        $hasil = HasilSolusiTerbaik::where('tes_id', $item->id)->first();
        if ($item && $hasil->delete()) {
            $item->delete();
            alert()->success('Success', 'Data Berhasil Disimpan');
        } else {
            alert()->error('Error', 'Data Gagal Disimpan');
        }

        // Redirect ke rute yang diinginkan
        return redirect()->route('layouts.admin.data_rekam_medis.datarekammedis');
    }
}
