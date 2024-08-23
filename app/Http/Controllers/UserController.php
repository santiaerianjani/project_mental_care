<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'user')->get();
        $data['user'] = $user;
        return view('layouts.admin.data_user.datauser', $data);
    }

    public function destroy($id)
    {
        $item = User::where('id',$id)->first();
        if ($item) {
            $item->delete();
            alert()->success('Success', 'Data Berhasil Disimpan');
        } else {
            alert()->error('Error', 'Data Gagal Disimpan');
        }

        // Redirect ke rute yang diinginkan
        return redirect()->route('layouts.admin.data_user.datauser');
    }
}
