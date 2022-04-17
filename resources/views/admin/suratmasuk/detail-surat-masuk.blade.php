<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
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
  <!-- Load CSS file for Select2 -->
  {{--  <link rel="stylesheet" href="{{ asset('assets/dist/css/select2.min.css') }}" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />  --}}
  <link type="text/css" href="{{ asset('assets/dist/css/select2.min.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/dist/js/select2.min.js') }}" defer></script>

  <style>
    .select2-container .select2-selection {
        line-height: 1.6 !important;
        height: 100% !important;
        border-radius: 3px !important;
        border-block-color: greyscale !important;
    }
  </style>

</head>

<body>
  <!-- Sidenav -->
  @include('admin.layouts.sidenav')

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('admin.layouts.navbar')

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
            <!-- Card stats -->
          </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Detail surat Masuk</h3>
                        </div>
                    </div>
                </div>
                <form action="#" method="POST" enctype="multipart/form-data">
                    {{--  {{ csrf_field() }}  --}}
                    <div class="card-body">
                      <h6 class="heading-small text-muted mb-4">Atribut Surat</h6>
                      <div class="pl-lg-4">
                          <div class="row">
                              <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Master Surat</label>
                                    <select name="master_surat" class="form-control" id="master_surat" style="height: 100%" readonly>
                                      <option value="{{ $suratmasuk->master_surat_id }}">{{ $suratmasuk->nomorsurat->kode_nomor_surat }}</option>
                                    </select>
                                </div>
                              </div>
                              <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Nomor Surat</label>
                                    <input type="text" name="nomor_surat_masuk" class="form-control" id="nomor_surat_masuk" placeholder="Nomor Surat" value="{{ $suratmasuk->nomor_surat }}" readonly>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Parindikan</label>
                                    <input type="text" name="parindikan" class="form-control" id="parindikan" placeholder="Parindikan" value="{{ $suratmasuk->perihal }}" readonly>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Mawit Saking</label>
                                    <input type="text" name="mawit_saking" class="form-control" id="mawit_saking" placeholder="Mawit Saking" value="{{ $suratmasuk->asal_surat }}" readonly>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Tanggal Surat</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input name="tanggal_surat" class="form-control datepicker1" placeholder="Tanggal Surat" type="text" value="@if($suratmasuk->tanggal_surat != null){{ showDateTime($suratmasuk->tanggal_surat, 'd F Y') }}@endif" readonly>
                                    </div>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Tanggal Masuk</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input name="tanggal_diterima" class="form-control datepicker1" placeholder="Tanggal Masuk" type="text" value="{{ showDateTime($suratmasuk->tanggal_diterima, 'd F Y') }}" readonly>
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                      <hr class="my-4" />
                      <h6 class="heading-small text-muted mb-4">Daging Surat</h6>
                      <div class="pl-lg-4">
                        <div class="row">
                          <div class="col-lg-8">
                            <label class="form-control-label" for="input-country">Tanggal Kegiatan</label>
                            <div class="input-daterange datepicker2 row align-items-center">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control" name="tanggal_kegiatan_mulai" placeholder="Tanggal Kegiatan Mulai" type="text" value="{{ showDateTime($suratmasuk->tanggal_kegiatan_mulai, 'd F Y') }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control" name="tanggal_kegiatan_berakhir" placeholder="Tanggal Kegiatan Selesai" type="text" value="{{ showDateTime($suratmasuk->tanggal_kegiatan_berakhir, 'd F Y') }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <label class="form-control-label" for="input-email">Waktu Kegiatan</label>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="time" name="waktu_kegiatan_mulai" class="form-control" id="waktu_kegiatan" placeholder="Waktu Kegiatan Mulai" value="{{ $suratmasuk->waktu_kegiatan_mulai }}" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <input type="time" name="waktu_kegiatan_berakhir" class="form-control" id="waktu_kegiatan" placeholder="Waktu Kegiatan Selesai" value="{{ $suratmasuk->waktu_kegiatan_berakhir }}" readonly>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr class="my-4" />
                      <h6 class="heading-small text-muted mb-4">Penerima</h6>
                      <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Prajuru Desa Adat</label>
                                    <input type="text" name="prajuru_desa_adat" class="form-control" id="prajuru_desa_adat" placeholder="Prajuru Desa Adat" value="{{ $suratmasuk->prajurudesaadat->kramamipil->cacahkramamipil->penduduk->nama }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan" value="{{ $suratmasuk->prajurudesaadat->jabatan }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-country">Surat</label>
                                <a href="{{ route('file-surat-masuk', $suratmasuk->surat_masuk_id) }}" type="button" class="btn btn-primary btn-lg btn-block">Detail File</a>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                    </div>
                </form>
            </div>
        </div>
      </div>
      <!-- Footer -->
      @include('admin.layouts.footer')

      <!-- Sweet-Alert -->
      @include('sweetalert::alert')
    </div>
  </div>
  {{--  <input type="hidden" class="d-none form-control" id="kode_surat" value="{{ $kode_surat }}">  --}}
  {{--  <input type="text" class="d-none form-control" id="kode_surat" value="@json($kode_surat)">
  <input type="text" class="d-none form-control" id="kode_surat" value="@json($kode_surat)">  --}}


  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>  --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <!-- Datepicker Indonesia -->
  {{--  <script>
      $(function(){
        $.fn.datepicker.defaults.format = "dd-M-yyyy";
        $('.datepicker').datepicker({
            format: 'dd-M-yyyy',
        });
      });
  </script>  --}}

  <!-- Select2 -->
  <script>
    $(document).ready(function() {
        $('.sekretaris_panitia').select2();
    });
    $(document).ready(function() {
        $('.ketua_panitia').select2();
    });
  </script>

  <!-- Generate Nomor Surat -->
  <script>
      $(function() {
        $.fn.datepicker.defaults.format = "dd-M-yyyy";
        $('.datepicker2').datepicker({
            format: 'dd-M-yyyy',
        });

        $('.datepicker1').datepicker({
            format: 'dd-M-yyyy',
        });


      });

        {{--  let arrayKode = $('#kode_surat').val();
        let data = JSON.parse(arrayKode)
        let kode = data.kode_surat;
        console.log(data)

        generateNomorSurat(kode)

        function generateNomorSurat(kode){
            var kode_surat = data.last_id + "/" +kode+"-"+data.kode_desa+"/"+data.bulan+"/"+data.tahun;
            $('#nomor_surat_keluar').val(kode_surat)
        }

        $('#master_surat').on('change', function() {
            var kode = $(this).find(':selected').data('id');
            generateNomorSurat(kode)
        })  --}}

  </script>


  <!-- Argon Scripts -->
  <script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <!-- Core -->
  <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <script src="{{ asset('asset/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('asset/js/plugins/moment.min.js') }}"></script>
  <script src="{{ asset('asset/js/plugins/datetimepicker.js') }}" type="text/javascript"></script>
  <script src="{{ asset('asset/js/plugins/bootstrap-datepicker.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
</body>

</html>
