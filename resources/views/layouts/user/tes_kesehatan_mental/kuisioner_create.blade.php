<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Mental Care - Kuisioner BDI</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <div>
                    <img src="assets/img/logo.png" alt="" style="width:80px; height:100px">
                </div>
                <div>
                    <h5><strong class="text-dark"> {{ __('Mental Care') }} </strong></h5>
                </div>
            </a>
            <i class="text-dark bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="text-dark search-bar">
            <form class="text-dark search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Cari" title="Enter search keyword">
                <button type="submit" title="Search"><i class="text-dark bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/profil-user.png" alt="Profile" class="rounded-circle">
                        <span class="text-dark dropdown-toggle ps-2"> {{Auth::user()->name}} </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6> {{Auth::user()->name}} </h6>
                            <span> Pengguna Mental Care </span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        @php
                        if(auth()->user()->role == 'admin'){
                        $route = route('layouts.admin.dashboard');
                        }
                        @endphp

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-person-fill"></i>
                                <span> Profil </span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-question-circle-fill"></i>
                                <span> Butuh bantuan?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('home') }}">
                    <div class="text-dark bi bi-house-door-fill"><span> Dashboard </span></div>
                </a>
            </li><!-- End Dashboard Nav -->

            <!-- Kesiapsiagaan -->
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="collapse" data-bs-target="#kesiapsiagaan-nav" aria-expanded="false">
                    <i class="text-dark bi bi-check-square-fill"></i><span>Kesiapsiagaan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="kesiapsiagaan-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="nav-link active" href="{{ route('layouts.user.tes_kesehatan_mental.teskesehatanmental') }}">
                            <i class="text-dark bi bi-clipboard2-data-fill"></i><span>Tes Kesehatan Mental</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Kesiapsiagaan Nav -->

            <!-- Tanggap -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#tanggap-nav" aria-expanded="false">
                    <i class="text-dark bi bi-check-square-fill"></i><span>Tanggap</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tanggap-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="nav-link collapsed" href="{{ route('layouts.user.hasil_solusi_terbaik.hasilsolusiterbaik') }}">
                            <i class="text-dark bi bi-bar-chart-line-fill"></i><span>Hasil Solusi Terbaik</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tanggap Nav -->

            <!-- Logout -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="text-dark bi bi-backspace-fill"><span> Keluar </span></div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li><!-- End Logout Nav -->

        </ul>
    </aside><!-- End Sidebar -->

    <main id="main" class="main">
        <div class="pagetitle">
            <img src="assets1/img/label.png" class="img-fluid" alt="Responsive image">
        </div>
        <h1>
            <div class="text-dark"> Kuisioner BDI</div>
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="text-dark breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="text-dark breadcrumb-item"><a href="{{ route('layouts.user.dashboarduser') }}">Dashboard</a></li>
                <li class="text-dark breadcrumb-item active" aria-current="page">Kuisioner BDI</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->
        <aria-label="breadcrumb">
            <ol class="breadcrumb">
                <h6>
                    <div class="text-dark breadcrumb-item active" aria-current="page"> Di bawah ini terdapat beberapa pernyataan. Pilihlah pernyataan yang sesuai dengan
                        keadaan Anda selama SEMINGGU TERAKHIR, dengan memilih salah satu dari setiap pernyataan yang sesuai!</div>
                </h6>
            </ol>
            <form action="{{ route('layouts.user.tes_kesehatan_mental.kuisioner_store') }}" method="POST">
                @csrf
                <!-- Pernyataan 1 -->
                @foreach ($teskesehatanmentals as $data)
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">{{ $data->pernyataan }}</legend>
                                        <div class="col-sm-10">
                                            @php
                                            $jawaban = App\Models\DataJawaban::where('pernyataan_id', $data->id)->get();
                                            @endphp
                                            @foreach ($jawaban as $item)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="{{ $data->pernyataan }}" id="pernyataan_{{ $item->id }}" value="{{ $item->id }}">
                                                <label class="form-check-label" for="pernyataan_{{ $item->id }}">
                                                    {{ $item->jawaban }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @endforeach


                <!-- End Pernyataan 1 -->

                <!-- Pernyataan 2 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 2</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan2" id="pernyataan2" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya tidak terlalu berkecil hati tentang masa depan.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan2" id="pernyataan2" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya merasa berkecil hati tentang masa depan.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan2" id="pernyataan2" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya merasa tidak ada sesuatu yang saya harapkan di masa depan.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan2" id="pernyataan2" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya merasa masa depan adalah harapan dan bahwa segalanya tidak dapat diperbaiki.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 2 -->

                <!-- Pernyataan 3 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 3</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan3" id="pernyataan3" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya tidak merasa gagal.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan3" id="pernyataan3" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya merasa telah gagal dibandingkan yang lain.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan3" id="pernyataan3" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Ketika saya melihat kembali hidup saya, yang bisa saya lihat adalah banyak kegagalan.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan3" id="pernyataan3" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya merasa sebagai seorang pribadi yang gagal.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 3 -->

                <!-- Pernyataan 4 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 4</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan4" id="pernyataan4" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya memperoleh kepuasan sama seperti dahulu.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan4" id="pernyataan4" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya tidak menikmati sesuatu seperti sebelumnya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan4" id="pernyataan4" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya tidak mendapatkan kepuasan dari apapun lagi.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan4" id="pernyataan4" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya tidak puas dengan segala sesuatu.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 4 -->

                <!-- Pernyataan 5 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 5</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan5" id="pernyataan5" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya tidak merasa bersalah.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan5" id="pernyataan5" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya cukup sering merasa bersalah.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan5" id="pernyataan5" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya sering merasa sangat bersalah.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan5" id="pernyataan5" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya merasa bersalah sepanjang waktu.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 5 -->

                <!-- Pernyataan 6 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 6</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan6" id="pernyataan6" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya tidak merasa saya sedang dihukum.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan6" id="pernyataan6" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya merasa mungkin sedang dihukum.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan6" id="pernyataan6" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya berharap dihukum.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan6" id="pernyataan6" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya merasa saya sedang dihukum.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 6 -->

                <!-- Pernyataan 7 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 7</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan7" id="pernyataan7" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya tidak merasa kecewa terhadap diri sendiri.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan7" id="pernyataan7" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya kecewa pada diri sendiri.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan7" id="pernyataan7" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya muak terhadap diri sendiri.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan7" id="pernyataan7" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya membenci diri sendiri.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 7 -->

                <!-- Pernyataan 8 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 8</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan8" id="pernyataan8" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya tidak merasa saya lebih buruk daripada orang lain.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan8" id="pernyataan8" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya mengkritik diri sendiri karena kelemahan/kesalahan saya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan8" id="pernyataan8" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya menyalahkan diri sendiri sepanjang waktu untuk kesalahan saya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan8" id="pernyataan8" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya menyalahkan diri sendiri untuk segala sesuatu yang buruk yang terjadi.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 8 -->

                <!-- Pernyataan 9 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 9</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan9" id="pernyataan9" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya tidak punya pikiran bunuh diri.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan9" id="pernyataan9" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya memiliki pikiran bunuh diri, tapi saya tidak ingin melakukannya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan9" id="pernyataan9" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya ingin bunuh diri.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan9" id="pernyataan9" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya akan bunuh diri jika saya punya kesempatan.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 9 -->

                <!-- Pernyataan 10 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Pernyataan 10</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pernyataan10" id="pernyataan10" value="0">
                                                <label class="form-check-label" for="gridRadios1">
                                                    Saya tidak menangis lagi dibanding biasanya.
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pernyataan10" id="pernyataan10" value="1">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Sekarang saya lebih banyak menangis daripada sebelumnya.
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pernyataan10" id="pernyataan10" value="2">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Saya menangis sepanjang waktu sekarang.
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pernyataan10" id="pernyataan10" value="3">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Saya mungkin akan menangis, tapi sekarang saya tidak dapat menangis meskipun saya ingin menangis.
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 10 -->

                <!-- Pernyataan 11 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 11</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan11" id="pernyataan11" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Sekarang saya tidak merasa jengkel daripada sebelumnya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan11" id="pernyataan11" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya lebih mudah kesal daripada biasanya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan11" id="pernyataan11" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya merasa cukup kesal beberapa kali.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan11" id="pernyataan11" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya merasa kesal sepanjang waktu.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 11 -->

                <!-- Pernyataan 12 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 12</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan12" id="pernyataan12" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya belum kehilangan minat pada orang lain.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan12" id="pernyataan12" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya kurang tertarik pada orang lain dibandingkan dahulu.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan12" id="pernyataan12" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya telah kehilangan sebagian besar minat saya pada orang lain.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan12" id="pernyataan12" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya telah kehilangan semua minat saya pada orang lain.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 12 -->

                <!-- Pernyataan 13 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 13</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan13" id="pernyataan13" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya membuat keputusan sama seperti sebelumnya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan13" id="pernyataan13" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya sering menunda membuat keputusan dari biasanya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan13" id="pernyataan13" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya memiliki kesulitan yang lebih besar dalam pengambilan keputusan daripada biasanya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan13" id="pernyataan13" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya tidak bisa membuat keputusan sama sekali lagi.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 13 -->

                <!-- Pernyataan 14 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 14</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan14" id="pernyataan14" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya tidak merasa bahwa saya tampak lebih buruk daripada dulu.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan14" id="pernyataan14" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya khawatir bahwa saya tampak tua atau tidak menarik.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan14" id="pernyataan14" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya merasa ada perubahan permanen dalam penampilan saya yang membuat saya terlihat menarik.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan14" id="pernyataan14" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya percaya bahwa saya terlihat jelek.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 14 -->

                <!-- Pernyataan 15 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 15</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan15" id="pernyataan15" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya dapat bekerja seperti sebelumnya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan15" id="pernyataan15" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Dibutuhkan usaha ekstra untuk memulai mengerjakan sesuatu.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan15" id="pernyataan15" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya harus memaksa diri sendiri untuk mengerjakan sesuatu.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan15" id="pernyataan15" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya tidak bisa mengerjakan pekerjaan sama sekali.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 15 -->

                <!-- Pernyataan 16 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 16</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan16" id="pernyataan16" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya dapat tidur nyenyak seperti biasanya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan16" id="pernyataan16" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya tidak tidur nyenyak seperti biasanya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan16" id="pernyataan16" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya bangun 1-2 jam lebih awal dari biasanya dan sulit untuk kembali tidur.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan16" id="pernyataan16" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya bangun beberapa jam lebih awal dari sebelumnya dan tidak bisa kembali tidur.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 16 -->

                <!-- Pernyataan 17 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 17</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan17" id="pernyataan17" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya tidak mudah lelah dari biasanya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan17" id="pernyataan17" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya lebih mudah lelah dari biasanya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan17" id="pernyataan17" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya hampir selalu merasa lelah dalam mengerjakan sesuatu.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan17" id="pernyataan17" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya merasa terlalu lelah untuk mengerjakan apa-apa.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 17 -->

                <!-- Pernyataan 18 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 18</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan18" id="pernyataan18" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Nafsu makan saya masih seperti biasanya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan18" id="pernyataan18" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Nafsu makan saya tidak sebaik dulu.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan18" id="pernyataan18" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Sekarang nafsu makan saya jauh lebih buruk.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan18" id="pernyataan18" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya tidak punya nafsu makan sama sekali lagi.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 18 -->

                <!-- Pernyataan 19 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 19</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan19" id="pernyataan19" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya tidak kehilangan banyak berat badan.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan19" id="pernyataan19" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya telah kehilangan lebih dari 5 kilogram.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan19" id="pernyataan19" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya telah kehilangan lebih dari 10 kilogram.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan19" id="pernyataan19" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya telah kehilangan lebih dari 15 kilogram.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 19 -->

                <!-- Pernyataan 20 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 20</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan20" id="pernyataan20" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya tidak khawatir tentang kesehatan saya dibanding biasanya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan20" id="pernyataan20" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya khawatir tentang masalah fisik seperti sakit, nyeri, sakit perut, atau sembelit.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan20" id="pernyataan20" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya sangat khawatir tentang masalah fisik dan sulit untuk memikirkan hal yang lain.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan20" id="pernyataan20" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya sangat khawatir tentang masalah fisik saya bahwa saya tidak dapat memikirkan hal lain.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 20 -->

                <!-- Pernyataan 21 -->
                <!-- <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Pernyataan 21</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan21" id="pernyataan21" value="0">
                                            <label class="form-check-label" for="gridRadios1">
                                                Saya tidak melihat ada perubahan terbaru dalam minat saya pada seks.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan21" id="pernyataan21" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya kurang tertarik pada seks daripada sebelumnya.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan21" id="pernyataan21" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya hampir tidak memiliki minat pada seks.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pernyataan21" id="pernyataan21" value="3">
                                            <label class="form-check-label" for="gridRadios2">
                                                Saya telah kehilangan minat pada seks sepenuhnya.
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            

                        </div>
                    </div>
                </div>
                </div>
            </section> -->
                <!-- End Pernyataan 21 -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    <button type="reset" class="btn btn-secondary">Batal</button>
                </div>
            </form>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class=" text-dark copyright">
            &copy; Copyright <strong class="text-dark"><span> Mental Care </span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>