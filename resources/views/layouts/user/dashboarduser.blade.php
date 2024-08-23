<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Mental Care - Dashboard </title>
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
</head>
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
      <a class="nav-link active" href="{{ route('home') }}">
        <div class="text-dark bi bi-house-door-fill"><span> Dashboard </span></div>
      </a>
    </li><!-- End Dashboard Nav -->

    <!-- Kesiapsiagaan -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#kesiapsiagaan-nav" aria-expanded="false">
        <i class="text-dark bi bi-check-square-fill"></i><span>Kesiapsiagaan</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="kesiapsiagaan-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a class="nav-link collapsed" href="{{ route('layouts.user.tes_kesehatan_mental.teskesehatanmental') }}">
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
  <h3>
    <div class="font-weight-bold"> Selamat Datang</div>
  </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <h7>
        <div class="text-dark breadcrumb-item active" aria-current="page">Selamat datang di sistem pakar diagnosis kesehatan mental remaja berbasis web.
          Sistem akan membantu anda untuk self-assessment terhadap kesehatan mental anda, sehingga penyakit dan solusi terbaik akan diketahui
          berdasarkan informasi yang anda inputkan pada proses diagnosa dan tes kesehatan mental. Berikut rules yang harus dilakukan untuk dapat mengetes kesehatan mental anda :</div>
      </h7>
    </ol>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <h8>
          <div class="text-dark breadcrumb-item active" aria-current="page">1. Lakukan pengisian data kesehatan mental anda terlebih dahulu pada fitur "Tes Kesehatan Mental" yang terdapat pada menu "Kesiapsiagaan" </div>
        </h8>
        <h8>
          <div class="text-dark breadcrumb-item active" aria-current="page">2. Setelah selesai, lalu masuk ke fitur "Hasil Solusi Terbaik" yang terdapat pada menu "Tanggap", untuk melihat hasil dan solusi terbaik dari tes yang telah anda lakukan</div>
        </h8>
      </ol>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <h8>
            <div class="text-dark breadcrumb-item active" aria-current="page">Selamat Mencoba!</div>
          </h8>
        </ol>
      </nav>
      </div><!-- End Page Title -->


      <a href="#" class="btn btn-dark back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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