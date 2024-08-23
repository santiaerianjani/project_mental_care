<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\User;
use App\Models\DataSolusiTerbaik;

class DataSolusiTerbaikController extends Controller
{
    //index
    public function index()
    {
        $datasolusiterbaik = DataSolusiTerbaik::all();
        $data['datasolusiterbaik'] = $datasolusiterbaik;
        return view('layouts.admin.data_solusi_terbaik.datasolusiterbaik', $data);
    }

    //create
    public function create()
{
    $datasolusiterbaiks = DataSolusiTerbaik::orderBy('kategori_depresi', 'ASC')->get();
    $data['datasolusiterbaiks'] = $datasolusiterbaiks;
    return view('layouts.admin.data_solusi_terbaik.datasolusiterbaik_create', $data);
}

    //store
    public function store(Request $request)
    {
        // dd($request->all());
        $params1 = $request->all();
        if ($params1['kategori_depresi']=='depresi normal'){
            $params1['awal']=0;
            $params1['akhir']=13;
        }
        elseif ($params1['kategori_depresi']=='depresi ringan'){
            $params1['awal']=14;
            $params1['akhir']=19;
        }
        elseif ($params1['kategori_depresi']=='depresi sedang'){
            $params1['awal']=20;
            $params1['akhir']=28;
        }
        elseif ($params1['kategori_depresi']=='depresi berat'){
            $params1['awal']=29;
            $params1['akhir']=63;
        }
        $datasolusiterbaik = DataSolusiTerbaik::create($params1);
        if ($datasolusiterbaik) {
                alert()->success('Success', 'Data Berhasil Disimpan');
            } else {
                alert()->error('Error', 'Data Gagal Disimpan');
            
        }
        return redirect()->route('layouts.admin.data_solusi_terbaik.datasolusiterbaik');
    }

    //update
    public function update(Request $request, $id)
    {
        $params1=$request->all();
        $hasilsolusiterbaik=DataSolusiTerbaik::where('id', $id)->first();
        if ($params1['kategori_depresi']=='depresi normal'){
            $params1['awal']=0;
            $params1['akhir']=13;
        }
        elseif ($params1['kategori_depresi']=='depresi ringan'){
            $params1['awal']=14;
            $params1['akhir']=19;
        }
        elseif ($params1['kategori_depresi']=='depresi sedang'){
            $params1['awal']=20;
            $params1['akhir']=28;
        }
        elseif ($params1['kategori_depresi']=='depresi berat'){
            $params1['awal']=29;
            $params1['akhir']=63;
        }
        // Lakukan pembaruan data
        if ($hasilsolusiterbaik->update($params1)) {
            alert()->success('Success', 'Data Berhasil Disimpan');
        } else {
            alert()->error('Error', 'Data Gagal Disimpan');
        }
        return redirect()->route('layouts.admin.data_solusi_terbaik.datasolusiterbaik');
    }
    //edit
    public function edit($id)
    {
        $admin = Admin::findOrFail(Crypt::decrypt($id));
        $data['data'] = $admin;
        return view('layouts.admin.data_solusi_terbaik.datasolusiterbaik', $data);
    }

    //hapus
    public function destroy($id)
    {
        $item = DataSolusiTerbaik::where('id',$id)->first();
        if ($item) {
            $item->delete();
            alert()->success('Success', 'Data Berhasil Disimpan');
        } else {
            alert()->error('Error', 'Data Gagal Disimpan');
        }

        // Redirect ke rute yang diinginkan
        return redirect()->route('layouts.admin.data_solusi_terbaik.datasolusiterbaik');
    }
}
