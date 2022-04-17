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
                            <h3 class="mb-0">Edit surat Keluar</h3>
                        </div>
                    </div>
                </div>
                <form action="{{ route('update-surat-keluar-non-panitia', $suratkeluarnonpanitia->surat_keluar_id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                      <h6 class="heading-small text-muted mb-4">Atribut Surat</h6>
                      <div class="pl-lg-4">
                          <div class="row">
                              <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Nomor Surat<i class="text-danger text-sm text-bold">*</i></label>
                                    <input type="text" name="nomor_surat_keluar" class="form-control" placeholder="otomatis" value="{{ $suratkeluarnonpanitia->nomor_surat }}">
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Lepihan<i class="text-danger text-sm text-bold">*</i></label>
                                    <input type="number" name="lepihan" class="form-control" id="lepihan" placeholder="Lepihan" value="{{ $suratkeluarnonpanitia->lepihan }}">
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Parindikan<i class="text-danger text-sm text-bold">*</i></label>
                                    <input type="text" name="parindikan" class="form-control" id="parindikan" placeholder="Parindikan" value="{{ $suratkeluarnonpanitia->parindikan }}">
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Tetujon<i class="text-danger text-sm text-bold">*</i></label>
                                    <input type="text" name="tetujon" class="form-control" id="tetujon" placeholder="Tetujon" value="{{ $suratkeluarnonpanitia->pihak_penerima }}">
                                </div>
                              </div>
                          </div>
                      </div>

                      <hr class="my-4" />
                      <h6 class="heading-small text-muted mb-4">Daging Surat</h6>
                      <div class="pl-lg-4">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">Pemahbah Surat</label>
                                <textarea rows="4" name="pemahbah_surat" class="form-control" placeholder="Pemahbah Surat">{{ $suratkeluarnonpanitia->pamahbah_surat }}</textarea>
                            </div>
                          </div>
                          <div class="col-lg-12">
                              <div class="form-group">
                                  <label class="form-control-label" for="input-username">Daging Surat</label>
                                  <textarea rows="4" name="daging_surat" class="form-control" placeholder="Daging Surat">{{ $suratkeluarnonpanitia->daging_surat }}</textarea>
                              </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">Pamuput Surat</label>
                                <textarea rows="4" name="pamuput_surat" class="form-control" placeholder="Pamuput Surat">{{ $suratkeluarnonpanitia->pamuput_surat }}</textarea>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <label class="form-control-label" for="input-country">Tanggal Kegiatan</label>
                            <div class="input-daterange datepicker row align-items-center">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control" name="tanggal_kegiatan_mulai" placeholder="Tanggal Kegiatan Mulai" type="text" value="{{ $suratkeluarnonpanitia->tanggal_kegiatan_mulai }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control" name="tanggal_kegiatan_berakhir" placeholder="Tanggal Kegiatan Selesai" type="text" value="{{ $suratkeluarnonpanitia->tanggal_kegiatan_berakhir }}">
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
                                        <input type="time" name="waktu_kegiatan_mulai" class="form-control" id="waktu_kegiatan" placeholder="Waktu Kegiatan Mulai" value="{{ $suratkeluarnonpanitia->waktu_kegiatan_mulai }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <input type="time" name="waktu_kegiatan_berakhir" class="form-control" id="waktu_kegiatan" placeholder="Waktu Kegiatan Selesai" value="{{ $suratkeluarnonpanitia->waktu_kegiatan_selesai }}">
                                    </div>
                                </div>
                              </div>
                            </div>
                          <div class="col-lg-8">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Busana/Pakaian</label>
                                <input type="text" name="busana" class="form-control" id="busana" placeholder="Busana/Pakaian" value="{{ $suratkeluarnonpanitia->busana }}">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Tempat Kegiatan</label>
                                <input type="text" name="tempat_kegiatan" class="form-control" id="tempat_kegiatan" placeholder="Tempat Kegiatan" value="{{ $suratkeluarnonpanitia->tempat_kegiatan }}">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                            <label class="form-control-label" for="input-country">Lepihan Surat<i class="text-danger text-sm text-bold">* File dalam format pdf (maksimal 25 MB)</i></label>
                            <input type="file" name="lepihan_surat" class="form-control" placeholder="Lepihan Surat" value="{{ $suratkeluarnonpanitia->lampiran }}" accept="application/pdf">
                            </div>
                        </div>
                        </div>
                      </div>
                      <hr class="my-4" />
                      <h6 class="heading-small text-muted mb-4">Lingga Tangan miwah Pesengan</h6>
                      <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Penyarikan<i class="text-danger text-sm text-bold">*</i></label>
                                    <select name="penyarikan_adat" class="penyarikan_adat form-control" id="bendesa_adat" style="height: 100%">

                                        @foreach($prajurudesa as $data)
                                        @if($data->jabatan == 'penyarikan')
                                            <option value="{{ $data->prajuru_desa_adat_id }}">{{ $data->kramamipil->cacahkramamipil->penduduk->nik }} - {{ $data->kramamipil->cacahkramamipil->penduduk->nama }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Bendesa Adat<i class="text-danger text-sm text-bold">*</i></label>
                                    <select name="bendesa_adat" class="bendesa_adat form-control" id="bendesa_adat" style="height: 100%">

                                        @foreach($prajurudesa as $data)
                                        @if($data->jabatan == 'bendesa')
                                            <option value="{{ $data->prajuru_desa_adat_id }}">{{ $data->kramamipil->cacahkramamipil->penduduk->nik }} - {{ $data->kramamipil->cacahkramamipil->penduduk->nama }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                      </div>
                      <h6 class="heading-small text-muted mb-4">Tumusan Surat</h6>
                      <div class="pl-lg-4">
                          <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Tumusan</label>
                                    <input type="text" name="tumusan" class="form-control" id="tumusan" placeholder="Tumusan" value="{{ $suratkeluarnonpanitia->tumusan }}">
                                </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('home-surat-keluar-non-panitia') }}" type="button" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
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
        $('.datepicker').datepicker({
            format: 'dd-M-yyyy',
        });


      });

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
