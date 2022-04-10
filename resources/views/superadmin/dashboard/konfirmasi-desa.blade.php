<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Sistem Surat Menyurat</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/img/brand/logo.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
  <!-- Sidenav -->
  @include('superadmin.layouts.sidenav')

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('superadmin.layouts.navbar')

    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                {{--  <h6 class="h2 text-white d-inline-block mb-0">Default</h6>  --}}
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                    {{--  <li class="breadcrumb-item active" aria-current="page">Default</li>  --}}
                  </ol>
                </nav>
              </div>
              <div class="col-lg-6 col-5 text-right">
                <a href="#" class="btn btn-sm btn-neutral">New</a>
                <a href="#" class="btn btn-sm btn-neutral">Filters</a>
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12 col-7">
                        <h2 class="mb-0">Detail Desa</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card shadow">
                        <form class="contact-form" method="POST" action="{{ route('pendaftaran-desa-berhasil', $desaadatpending->desa_adat_id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="card-body text-left">
                                    <div class="form-section">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Nomor Registrasi Desa</label>
                                                <input name="nomor_register_desa" class="form-control" placeholder="Nomor Registrasi Desa (otomatis)" value="{{ $desaadatpending->desadat_nomor_register }}" type="text" disabled>
                                            </div>
                                        </div>
                                        <hr class="my-4" />
                                        <!-- Address -->
                                        <h6 class="heading-small text-muted mb-4">Data Wilayah</h6>
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-username">Provinsi<i class="text-danger text-sm text-bold">*</i></label>
                                                        <select name="provinsi" class="form-control" id="provinsi" value="" disabled>
                                                            <option value="{{ $desaadatpending->kecamatan->kabupaten->provinsi->provinsi_id }}">{{ $desaadatpending->kecamatan->kabupaten->provinsi->name }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Kabupaten<i class="text-danger text-sm text-bold">*</i></label>
                                                    <select name="kabupaten" class="form-control" id="kabupaten" disabled>
                                                        <option value="{{ $desaadatpending->kecamatan->kabupaten->kabupaten_id }}">{{ $desaadatpending->kecamatan->kabupaten->name }}</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-first-name">Kecamatan<i class="text-danger text-sm text-bold">*</i></label>
                                                        <select name="kecamatan" class="form-control" id="kecamatan" disabled>
                                                            <option value="{{ $desaadatpending->kecamatan->kecamatan_id }}">{{ $desaadatpending->kecamatan->name }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                    <label class="form-control-label" for="input-last-name">Desa<i class="text-danger text-sm text-bold">*</i></label>
                                                    <select name="desa" class="form-control" id="desa" disabled>
                                                        <option value="{{ $desaadatpending->desa_adat_id }}">{{ $desaadatpending->desadat_nama }}</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                    <label class="form-control-label" for="input-kodewilayah">Kode Wilayah<i class="text-danger text-sm text-bold">*</i></label>
                                                    <input type="text" name="kode_wilayah" class="form-control" placeholder="Kode Wilayah" value="{{ $desaadatpending->desadat_kode }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-kodepos">Kode Pos<i class="text-danger text-sm text-bold">*</i></label>
                                                        <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos" value="{{ $desaadatpending->desadat_kode_pos }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                    <label class="form-control-label" for="input-kodepos">Status Desa<i class="text-danger text-sm text-bold">*</i></label>
                                                    <select name="status_desa" class="form-control" id="status_desa" disabled>
                                                        <option value="{{ $desaadatpending->desadat_status_aktif }}">@if ($desaadatpending->desadat_status_aktif == "1")Aktif @else Tidak Aktif @endif</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Alamat<i class="text-danger text-sm text-bold">*</i></label>
                                                    <input name="alamat_desa" class="form-control" placeholder="Alamat Kantor Desa" value="{{ $desaadatpending->desadat_alamat_kantor }}" type="text" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4" />
                                        <!-- Address -->
                                        <h6 class="heading-small text-muted mb-4">Informasi Kontak</h6>
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-city">Telepon<i class="text-danger text-sm text-bold">*</i></label>
                                                        <input type="text" name="telepon_desa" class="form-control" placeholder="Telepon" value="{{ $desaadatpending->desadat_telpon_kantor }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Whatsapp<i class="text-danger text-sm text-bold">*</i></label>
                                                    <input type="text" name="kontak_wa" class="form-control" placeholder="Whatsapp" value="{{ $desaadatpending->desadat_wa_kontak_1 }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Faximile<i class="text-danger text-sm text-bold">*</i></label>
                                                    <input type="text" name="fax_desa" class="form-control" placeholder="Faximile" value="{{ $desaadatpending->desadat_fax_kantor }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Email Desa<i class="text-danger text-sm text-bold">*</i></label>
                                                    <input name="email_desa" class="form-control" placeholder="Email Desa" value="{{ $desaadatpending->desadat_email }}" type="email" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Web Desa<i class="text-danger text-sm text-bold">*</i></label>
                                                    <input name="web_desa" class="form-control" placeholder="Web Desa" value="{{ $desaadatpending->desadat_web }}" type="url" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-section">
                                        <h6 class="heading-small text-muted mb-4">Detail Desa</h6>
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                    <label class="form-control-label" for="input-city">Luas Desa<span> m<sup>2</sup></span><i class="text-danger text-sm text-bold">*</i></label>
                                                    <input type="number" name="luas_desa" class="form-control" placeholder="Luas Desa" value="{{ $desaadatpending->desadat_luas }}" disabled>
                                                </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Struktur Organisasi Desa<i class="text-danger text-sm text-bold">*</i></label>
                                                    <input type="text" name="file_struktur_pem" class="form-control" placeholder="Struktur Pembentukan Desa" value="{{ $desaadatpending->desadat_file_struktur_pem }}" disabled><iframe src="{{ asset('assets/img/struktur-desa/'.$desaadatpending->desadat_file_struktur_pem ) }}"  height="500px" width="100%" style="margin-Top :5px;"></iframe>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-country">Logo Desa<i class="text-danger text-sm text-bold">*</i></label>
                                                        <input type="text" name="logo_desa" class="form-control" value="{{ $desaadatpending->desadat_logo }}" placeholder="Logo Desa" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <img  src="{{ asset('assets/img/logo-desa/'.$desaadatpending->desadat_logo) }}" style="width:250px; height:250px;" alt="user-img">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Sejarah Desa</label>
                                                    <textarea rows="4" name="sejarah_desa" class="form-control" placeholder="Sejarah Desa" value="" disabled>{{ $desaadatpending->desadat_sejarah }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-section">
                                        <h6 class="heading-small text-muted mb-4">Data Pemimpin</h6>
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Sebutan Pemimpin<i class="text-danger text-sm text-bold">*</i></label>
                                                    <input type="text" name="sebutan_pemimpin" class="form-control" placeholder="Sebutan Pemimpin" value="{{ $desaadatpending->desadat_sebutan_pemimpin }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-email">NIK dan Nama Lengkap<i class="text-danger text-sm text-bold">*</i></label>
                                                        <select name="kramamipil_id" class="kramamipil_id form-control" id="kramamipil_id" style="height: 100%" disabled>
                                                          <option value="{{ $desaadatpending->prajurudesaadat[0]->krama_mipil_id }}">{{ $desaadatpending->prajurudesaadat[0]->kramamipil->cacahkramamipil->penduduk->nik }} - {{ $desaadatpending->prajurudesaadat[0]->kramamipil->cacahkramamipil->penduduk->nama }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="form-control-label" for="input-country">Periode Menjabat<i class="text-danger text-sm text-bold">*</i></label>
                                                    <div class="input-daterange datepicker row align-items-center">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                                    </div>
                                                                    <input class="form-control" name="masa_mulai" placeholder="Periode Mulai" type="text" value="{{ showDateTime($desaadatpending->prajurudesaadat[0]->tanggal_mulai_menjabat, 'd F Y') }}" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                                    </div>
                                                                    <input class="form-control" name="masa_berakhir" placeholder="Periode Berakhir" type="text" value="{{ showDateTime($desaadatpending->prajurudesaadat[0]->tanggal_akhir_menjabat, 'd F Y') }}" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <div class="form-navigation">
                                        <a href="{{ route('superadmin') }}" type="button" class="previous btn btn-primary float-left">Batal</a>
                                        <button href="#" type="submit" class="btn btn-success float-right konfirmasi" data-id="{{ $desaadatpending->desa_adat_id }}">Konfirmasi</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- Footer -->
      @include('superadmin.layouts.footer')

      <!-- Sweet-Alert -->
      @include('sweetalert::alert')

    </div>
  </div>

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>

    $('.konfirmasi').click(function(e) {
        e.preventDefault();
        var prajurudesaid = $(this).attr('data-id');

            swal({
                title: "Apakah yakin konfirmasi ?",
                text: "Data desa akan tersimpan!",
                icon: "warning",
                buttons: ["Tolak", "Konfirmasi"],
                successMode: true,
            })
            .then((isConfirm) => {
                if (isConfirm) {
                    window.location ="/superadmin/desa/berhasil/"+prajurudesaid+""
                    swal("Berhasil! Data desa telah disimpan!", {
                        icon: "success",
                    });
                } else {
                    swal("Gagal! Data desa ditolak!", {
                        icon: "error",
                        content: "input",
                      })
                      .then((value) => {
                        {{--  window.location ="/superadmin/desa/tolak/"+prajurudesaid+""  --}}
                        swal(`Alasan ditolak: ${value}`, {
                            icon: "info",
                        });
                    });
                }
            });
    });

  </script>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
</body>

</html>
