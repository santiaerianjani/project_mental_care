<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mental Care - Lihat Data Tes Kesehatan Mental</title>
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
            <img src="assets/img/profil-admin.png" alt="Profile" class="rounded-circle">
            <span class="text-dark dropdown-toggle ps-2"> {{Auth::user()->role}} </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6> {{Auth::user()->name}} </h6>
              <span> Admin Mental Care </span>
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
          <a class="nav-link" href="{{ route('layouts.admin.data_tes_kesehatan_mental.datateskesehatanmental') }}">
            <i class="text-dark bi bi-bar-chart-line-fill"></i><span>Data Tes Kesehatan Mental</span>
          </a>
        </li>
      </ul>
      <ul id="kesiapsiagaan-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a class="nav-link" href="{{ route('layouts.admin.data_pernyataan.datapernyataan') }}">
            <i class="text-dark bi bi-bar-chart-line-fill"></i><span>Data Pernyataan Kuisioner</span>
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
          <a class="nav-link" href="{{ route('layouts.admin.data_solusi_terbaik.datasolusiterbaik') }}">
            <i class="text-dark bi bi-clipboard2-check-fill"></i><span>Data Solusi Terbaik</span>
          </a>
        </li>
      </ul>
    </li><!-- End Tanggap Nav -->

    <!-- Pemulihan -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#pemulihan-nav" aria-expanded="false">
        <i class="text-dark bi bi-check-square-fill"></i><span>Pemulihan</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="pemulihan-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a class="nav-link" href="{{ route('layouts.admin.data_rekam_medis.datarekammedis') }}">
            <i class="text-dark bi bi-database-fill-check"></i><span>Data Rekam Medis</span>
          </a>
        </li>
      </ul>
    </li><!-- End Pemulihan Nav -->

    <!-- Mitigasi -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#mitigasi-nav" aria-expanded="false">
        <i class="text-dark bi bi-check-square-fill"></i><span>Mitigasi</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="mitigasi-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a class="nav-link" href="{{ route('layouts.admin.data_artikel.dataartikel') }}">
            <i class="text-dark bi bi-file-text-fill"></i><span>Data Artikel</span>
          </a>
        </li>
      </ul>
    </li><!-- End Mitigasi Nav -->

    <!-- Settings -->
    <li class="nav-heading">Setting</li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('layouts.admin.data_admin.dataadmin') }}">
        <div class="text-dark bi bi-person-fill"><span> Data Admin </span></div>
      </a>
    </li><!-- End Admin Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('layouts.admin.data_user.datauser') }}">
        <div class="text-dark bi bi-people-fill"><span> Data Pengguna </span></div>
      </a>
    </li><!-- End Penjualan Nav -->

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
      <div class="text-dark"> Hasil Solusi Terbaik </div>
    </h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="text-dark breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="text-dark breadcrumb-item"><a href="{{ route('layouts.user.dashboarduser') }}">Dashboard</a></li>
        <li class="text-dark breadcrumb-item active" aria-current="page">Hasil Solusi Terbaik</li>
      </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="d-grid gap-2 d-md-flex align-content-md-end">
            <a href="{{ route('layouts.user.hasil_solusi_terbaik.hasilsolusiterbaik_create')}}" class="btn btn-success" type="button">
              <i class="bi bi-plus"></i>Tambah Data </a>
          </div>
          <br>
          <div class="card ">
            <div class="card-body">
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Usia</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Gejala Yang Diderita</th>
                    <th scope="col">Hasil Diagnosa</th>
                    <th scope="col">Rentang Waktu</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($diagnosa as $diagnosas)
                  <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $hasilsolusiterbaiks->name_lengkap}}</td>
                    <td>{{ $hasilsolusiterbaiks->usia }}</td>
                    <td>{{ $hasilsolusiterbaiks->alamat }}</td>
                    <td>{{ $hasilsolusiterbaiks->gejala_yang_diderita}}</td>
                    <td>{{ $hasilsolusiterbaiks->hasil_diagnosa }}</td>
                    <td>{{ $hasilsolusiterbaiks->rentang_waktu }}</td>
                    <td>
                      <div class="d-flex">
                        <div class="d-flex">
                          <div class="mr-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$diagnosas->id}}">
                              <i class="bi bi-eye"></i>
                            </button>
                            <!-- <a href="{{ route('layouts.user.diagnosa_penyakit.diagnosapenyakit_read', Crypt::encrypt($diagnosas->id)) }}" class="btn btn-sm btn-primary">
                             
                            </a> -->
                          </div>
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal{{$hasilsolusiterbaiks->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Detail Hasil Solusi Terbaik</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  @php
                                  $data = App\Models\HasilSolusiTerbaik::where('id',$hasilsolusiterbaiks->id)->first();
                                  @endphp
                                  <p>{{$data->name_lengkap}}</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" href="{{ route('layouts.user.hasil_solusi_terbaik.hasilsolusiterbaik_read')}}">Lihat</button>
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </td>
                </tbody>
              </table>
            </div>
          </div>
          </td>
          </tr>
          @empty
          <tr>
            <td colspan="3">Data Tidak Ditemukan</td>
          </tr>
          @endforelse
          </tbody>
          </table>
          <!-- End Table with stripped rows -->
        </div>
      </div>
      </div>
      </div>
    </section>
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