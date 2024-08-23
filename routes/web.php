<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataTesKesehatanMentalController;
use App\Http\Controllers\DataSolusiTerbaikController;
use App\Http\Controllers\DataRekamMedisController;
use App\Http\Controllers\DataArtikelController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\DataPenggunaController;

use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DataPernyataanController;
use App\Http\Controllers\TesKesehatanMentalController;
use App\Http\Controllers\HasilSolusiTerbaik;
use App\Http\Controllers\HasilSolusiTerbaikController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\DataArtikel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $artikels = DataArtikel::all();
    return view('welcome', compact('artikels'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:user'])->group(function () {
    //Dashboard (Pengguna)
    Route::get('/userdashboard', [DashboardUserController::class, 'index'])->name('layouts.user.dashboarduser');
    //Tambah Dashboard
    Route::get('/userdashboardcreate', [DashboardUserController::class, 'create'])->name('layouts.user.dashboardusercreate');
    Route::post('/userdashboardadd', [DashboardUserController::class, 'add'])->name('layouts.user.dashboarduseradd');
    //Lihat Dashboard
    Route::get('/userdashboardread', [DashboardUserController::class, 'read'])->name('layouts.user.dashboarduserread');
    Route::post('/userdashboardlook', [DashboardUserController::class, 'look'])->name('layouts.user.dashboarduserlook');
    //Edit Dashboard
    Route::get('/userdashboaredit{id}', [DashboardUserController::class, 'edit'])->name('layouts.user.dashboarduseredit');
    Route::post('/userdashboardupdate{id}', [DashboardUserController::class, 'update'])->name('layouts.user.dashboarduserupdate');
    //Hapus Dashboard
    Route::get('/userdashboarddelete', [DashboardUserController::class, 'delete'])->name('layouts.user.dashboarduserdelete');
    Route::post('/userdahshboarddel', [DashboardUserController::class, 'del'])->name('layouts.user.dashboarduserdel');

    //Hasil Solusi Terbaik (Pengguna)
    Route::get('/userhasilsolusiterbaik', [HasilSolusiTerbaikController::class, 'index'])->name('layouts.user.hasil_solusi_terbaik.hasilsolusiterbaik');
    //Lihat Solusi Terbaik
    Route::get('/userhasilsolusiterbaikread', [HasilSolusiTerbaikController::class, 'read'])->name('layouts.user.hasil_solusi_terbaik.hasilsolusiterbaik_read');
    Route::post('/userhasilsolusiterbaikshow', [HasilSolusiTerbaikController::class, 'show'])->name('layouts.user.hasil_solusi_terbaik.hasilsolusiterbaik_show');

    //Tes Kesehatan Mental (Pengguna)
    Route::get('/userteskesehatanmental', [TesKesehatanMentalController::class, 'index'])->name('layouts.user.tes_kesehatan_mental.teskesehatanmental');
    //Tambah Tes Kesehatan Mental
    Route::get('/userteskesehatanmentalcreate', [TesKesehatanMentalController::class, 'create'])->name('layouts.user.tes_kesehatan_mental.teskesehatanmental_create');
    Route::post('/userteskesehatanmentalstore', [TesKesehatanMentalController::class, 'store'])->name('layouts.user.tes_kesehatan_mental.teskesehatanmental_store');
    //Kuisioner_BDI
    Route::get('/userkuisionercreate', [TesKesehatanMentalController::class, 'create'])->name('layouts.user.tes_kesehatan_mental.kuisioner_create');
    Route::post('/userkuisionerstore', [TesKesehatanMentalController::class, 'store'])->name('layouts.user.tes_kesehatan_mental.kuisioner_store');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    //Dashboard (Admin)
    Route::get('/admindashboard', [DashboardController::class, 'index'])->name('layouts.admin.dashboard');
    //Tambah Dashboard
    Route::get('/admindashboardcreate', [DashboardController::class, 'create'])->name('layouts.admin.dashboardcreate');
    Route::post('/admindashboardadd', [DashboardController::class, 'add'])->name('layouts.admin.dashboardadd');
    //Lihat Dashboard
    Route::get('/admindashboardread', [DashboardController::class, 'read'])->name('layouts.admin.dashboardread');
    Route::post('/admindashboardlook', [DashboardController::class, 'look'])->name('layouts.admin.dashboardlook');
    //Edit Dashboard
    Route::get('/admindashboaredit{id}', [DashboardController::class, 'edit'])->name('layouts.admin.dashboardedit');
    Route::post('/admindashboardupdate{id}', [DashboardController::class, 'update'])->name('layouts.admin.dashboardupdate');
    //Hapus Dashboard
    Route::get('/admindashboarddelete', [DashboardController::class, 'delete'])->name('layouts.admin.dashboarddelete');
    Route::post('/admindahshboarddel', [DashboardController::class, 'del'])->name('layouts.admin.dashboarddel');

    //Data Tes Kesehatan Mental (Admin)
    Route::get('/admindatateskesehatanmental', [DataTesKesehatanMentalController::class, 'index'])->name('layouts.admin.data_tes_kesehatan_mental.datateskesehatanmental');
    //Lihat Data Tes Kesehatan Mental
    Route::get('/admindatateskesehatanmentalread', [DataTesKesehatanMentalController::class, 'read'])->name('layouts.admin.data_tes_kesehatan_mental.datateskesehatanmental_read');
    Route::post('/admindatateskesehatanmentalshow', [DataTesKesehatanMentalController::class, 'show'])->name('layouts.admin.data_tes_kesehatan_mental.datateskesehatanmental_show');
    //Hapus Data Tes Kesehatan Mental
    Route::get('/admindatateskesehatanmentaldelete{id}', [DataTesKesehatanMentalController::class, 'delete'])->name('layouts.admin.data_tes_kesehatan_mental.datateskesehatanmental_delete');
    Route::delete('/admindatateskesehatanmentaldestroy/{id}', [DataTesKesehatanMentalController::class, 'destroy'])->name('layouts.admin.data_tes_kesehatan_mental.datateskesehatanmental_destroy');

    //Data Pernyataan
    Route::get('/admindatapernyataan', [DataPernyataanController::class, 'index'])->name('layouts.admin.data_pernyataan.datapernyataan');
    //Tambah Data Pernyataan
    Route::get('/admindatapernyataancreate', [DataPernyataanController::class, 'create'])->name('layouts.admin.data_pernyataan.datapernyataan_create');
    Route::post('/admindatapernyataanstore', [DataPernyataanController::class, 'store'])->name('layouts.admin.data_pernyataan.datapernyataan_store');
    //Edit Data Pernyataan
    Route::get('/admindatapernyataanedit{id}', [DataPernyataanController::class, 'edit'])->name('layouts.admin.data_pernyataan.datapernyataan_edit');
    Route::put('/admindatapernyataanupdate{id}', [DataPernyataanController::class, 'update'])->name('layouts.admin.data_pernyataan.datapernyataan_update');
    //Hapus Data Pernyataan
    Route::get('/admindatapernyataandelete{id}', [DataPernyataanController::class, 'delete'])->name('layouts.admin.data_pernyataan.datapernyataan_delete');
    Route::delete('/admindatapernyataandestroy/{id}', [DataPernyataanController::class, 'destroy'])->name('layouts.admin.data_pernyataan.datapernyataan_destroy');
    //Tambah Opsi
    Route::post('/adminopsicreate{id}', [DataPernyataanController::class, 'tambahopsi'])->name('layouts.admin.data_opsi');

    //Data Solusi Terbaik (Admin)
    Route::get('/admindatasolusiterbaik', [DataSolusiTerbaikController::class, 'index'])->name('layouts.admin.data_solusi_terbaik.datasolusiterbaik');
    //Tambah Data Solusi Terbaik
    Route::get('/admindatasolusiterbaikcreate', [DataSolusiTerbaikController::class, 'create'])->name('layouts.admin.data_solusi_terbaik.datasolusiterbaik_create');
    Route::post('/admindatasolusiterbaikstore', [DataSolusiTerbaikController::class, 'store'])->name('layouts.admin.data_solusi_terbaik.datasolusiterbaik_store');
    //Edit Data Solusi Terbaik
    Route::get('/admindatasolusiterbaikedit{id}', [DataSolusiTerbaikController::class, 'edit'])->name('layouts.admin.data_solusi_terbaik.datasolusiterbaik_edit');
    Route::put('/admindatasolusiterbaikupdate{id}', [DataSolusiTerbaikController::class, 'update'])->name('layouts.admin.data_solusi_terbaik.datasolusiterbaik_update');
    //Hapus Data Solusi Terbaik
    Route::get('/admindatasolusiterbaikdelete{id}', [DataSolusiTerbaikController::class, 'delete'])->name('layouts.admin.data_solusi_terbaik.datasolusiterbaik_delete');
    Route::delete('/admindatasolusiterbaikdestroy/{id}', [DataSolusiTerbaikController::class, 'destroy'])->name('layouts.admin.data_solusi_terbaik.datasolusiterbaik_destroy');

    //Data Rekam Medis (Admin)
    Route::get('/admindatarekammedis', [DataRekamMedisController::class, 'index'])->name('layouts.admin.data_rekam_medis.datarekammedis');
    //Lihat Data Rekam Medis
    Route::get('/admindatarekammedisread', [DataRekamMedisController::class, 'read'])->name('layouts.admin.data_rekam_medis.datarekammedis_read');
    Route::post('/admindatarekammedisshow', [DataRekamMedisController::class, 'show'])->name('layouts.admin.data_rekam_medis.datarekammedis_show');
    //Hapus Data Rekam Medis
    Route::get('/admindatarekammedisdelete{id}', [DataRekamMedisController::class, 'delete'])->name('layouts.admin.data_rekam_medis.datarekammedis_delete');
    Route::delete('/admindatarekammedisdestroy/{id}', [DataRekamMedisController::class, 'destroy'])->name('layouts.admin.data_rekam_medis.datarekammedis_destroy');

    //Data Artikel (Admin)
    Route::get('/admindataartikel', [DataArtikelController::class, 'index'])->name('layouts.admin.data_artikel.dataartikel');
    //Tambah Data Artikel
    Route::get('/admindataartikelcreate', [DataArtikelController::class, 'create'])->name('layouts.admin.data_artikel.dataartikel_create');
    Route::post('/admindataartikelstore', [DataArtikelController::class, 'store'])->name('layouts.admin.data_artikel.dataartikel_store');
    //Edit Data Artikel
    Route::get('/admindataartikeledit{id}', [DataArtikelController::class, 'edit'])->name('layouts.admin.data_artikel.dataartikel_edit');
    Route::put('/admindataartikelupdate{id}', [DataArtikelController::class, 'update'])->name('layouts.admin.data_artikel.dataartikel_update');
    //Hapus Data Artikel
    Route::get('/admindataartikeldelete{id}', [DataArtikelController::class, 'delete'])->name('layouts.admin.data_artikel.dataartikel_delete');
    Route::delete('/admindataartikeldestroy/{id}', [DataArtikelController::class, 'destroy'])->name('layouts.admin.data_artikel.dataartikel_destroy');
    //Upload Gambar Data Artikel
    Route::post('/upload-image', [DataArtikelController::class, 'uploadImage'])->name('upload_image');
    //Update Gambar Data Artikel
    Route::put('/dataartikel/{id}', [DataArtikelController::class, 'update'])->name('dataartikel_update');

    //Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('layouts.admin.data_admin.dataadmin');
    //Tambah Admin
    Route::get('/admincreate', [AdminController::class, 'create'])->name('layouts.admin.data_admin.dataadmin_create');
    Route::post('/adminstore', [AdminController::class, 'store'])->name('layouts.admin.data_admin.dataadmin_store');
    //Edit Admin
    Route::get('/adminedit{id}', [AdminController::class, 'edit'])->name('layouts.admin.data_admin.dataadmin_edit');
    Route::put('/adminupdate{id}', [AdminController::class, 'update'])->name('layouts.admin.data_admin.dataadmin_update');
    //Hapus Admin
    Route::get('/admindelete{id}', [AdminController::class, 'delete'])->name('layouts.admin.data_admin.dataadmin_delete');
    Route::delete('/admindestroy/{id}', [AdminController::class, 'destroy'])->name('layouts.admin.data_admin.dataadmin_destroy');

    //Data Pengguna 
    Route::get('/datauser', [UserController::class, 'index'])->name('layouts.admin.data_user.datauser');
    //Tambah Pengguna
    Route::get('/datausercreate', [UserController::class, 'create'])->name('layouts.admin.data_user.datauser_create');
    Route::post('/datauserstore', [UserController::class, 'store'])->name('layouts.admin.data_user.datauser_store');
    //Edit Pengguna
    Route::get('/datauseredit{id}', [UserController::class, 'edit'])->name('layouts.admin.data_user.datauser_edit');
    Route::put('/datauserupdate{id}', [UserController::class, 'update'])->name('layouts.admin.data_user.datauser_update');
    //Hapus Pengguna
    Route::get('/datauserdelete{id}', [UserController::class, 'delete'])->name('layouts.admin.data_user.datauser_delete');
    Route::delete('/datauserdestroy/{id}', [UserController::class, 'destroy'])->name('layouts.admin.data_user.datauser_destroy');
});
