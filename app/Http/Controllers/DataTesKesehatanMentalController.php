<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\User;
use App\Models\DataTesKesehatanMental;
use App\Models\HasilSolusiTerbaik;
use App\Models\KeteranganTes;
use App\Models\TesKesehatanMental;
use Iluminate\Contract\Encryption\DecryptException;
use Iluminate\Database\Eloquent\ModelNotFoundException;


class DataTesKesehatanMentalController extends Controller
{
    //index
    public function index()
    {
        $teskesehatanmental = User::where('role', 'user')->get();
        $data['admin'] = $teskesehatanmental;
        return view('layouts.admin.data_tes_kesehatan_mental.datateskesehatanmental', $data);
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
        return redirect()->route('layouts.admin.data_tes_kesehatan_mental.datateskesehatanmental');
    }
}
