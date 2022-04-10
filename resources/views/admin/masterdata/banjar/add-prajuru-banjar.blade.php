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
                            <h3 class="mb-0">Tambah Prajuru Banjar Adat</h3>
                        </div>
                    </div>
                </div>
                <form action="{{ route('add-prajuru-banjar-adat') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                      <h6 class="heading-small text-muted mb-4">Data Diri</h6>
                      <div class="pl-lg-4">
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <label class="form-control-label" for="input-email">NIK dan Nama Lengkap<i class="text-danger text-sm text-bold">*</i></label>
                                      <select name="kramamipil_id" class="kramamipil_id form-control" id="kramamipil_id" style="height: 100%" required>
                                        <option value="">-- Pilih Krama --</option>
                                        @foreach ($kramamipil as $data)
                                            <option value="{{ $data->krama_mipil_id }}" data-id="{{ $data->cacahkramamipil->penduduk->nik }}">{{ $data->cacahkramamipil->penduduk->nik }} - {{ $data->cacahkramamipil->penduduk->nama }}</option>
                                        @endforeach
                                      </select>
                                  </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Jabatan<i class="text-danger text-sm text-bold">*</i></label>
                                    <select name="nama_jabatan" class="form-control" id="nama_jabatan" required>
                                        <option value="">-- Pilih Jabatan --</option>
                                        <option value="kelihan banjar" <?= $prajurubanjar->jabatan === 'kelihan banjar' ? 'selected' : '' ?>>Kelihan Banjar</option>
                                        <option value="pangliman" <?= $prajurubanjar->jabatan === 'pangliman' ? 'selected' : '' ?>>Pangliman</option>
                                        <option value="penyarikan" <?= $prajurubanjar->jabatan === 'penyarikan' ? 'selected' : '' ?>>Penyarikan</option>
                                        <option value="patengen" <?= $prajurubanjar->jabatan === 'patengen' ? 'selected' : '' ?>>Patengen</option>
                                    </select>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Status<i class="text-danger text-sm text-bold">*</i></label>
                                    <select name="status_prajuru_banjar" class="form-control" id="status_prajuru_banjar" required>
                                        <option value="">-- Pilih Status Prajuru --</option>
                                        <option value="aktif" <?= $prajurubanjar->status_prajuru_banjar_adat === 'aktif' ? 'selected' : '' ?>>Aktif</option>
                                        <option value="tidak aktif" <?= $prajurubanjar->status_prajuru_banjar_adat === 'tidak aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                                    </select>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Banjar Adat<i class="text-danger text-sm text-bold">*</i></label>
                                    <select name="banjar_adat" class="form-control" id="banjar_adat" required>
                                        <option value="">-- Pilih Banjar Adat --</option>
                                        @foreach ($banjaradat as $data)
                                            <option value="{{ $data->banjar_adat_id }}">{{ $data->nama_banjar_adat }}</option>
                                        @endforeach
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
                                                <input class="form-control" name="masa_mulai" placeholder="Periode Mulai" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" name="masa_berakhir" placeholder="Periode Berakhir" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                      <hr class="my-4" />
                      <h6 class="heading-small text-muted mb-4">Data Akun</h6>
                      <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Email<i class="text-danger text-sm text-bold">*</i></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Password</label>
                                    <input type="password" name="password" class="password form-control" id="password" placeholder="Password" readonly>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('prajuru-banjar-adat') }}" type="button" class="btn btn-secondary">Batal</a>
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

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>  --}}

  <!-- Datepicker Indonesia -->
  <script>
      $(function(){
        $.fn.datepicker.defaults.format = "dd-M-yyyy";
        $('.datepicker').datepicker({
            format: 'dd-M-yyyy',
        });
      });
  </script>

  <!-- Select2 -->
  <script>
    $(document).ready(function() {
        $('.kramamipil_id').select2();
    });
  </script>

  <!-- Generate Password -->
  <script>
      $(function() {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $(function() {
            $('.kramamipil_id').on('change', function() {
                var kramamipil_id = $(this).val();
                var nik = $(this).find(':selected').data('id');
                console.log(nik)

                $( "#password" ).val();
                $( "#password" ).val(nik);

            })
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
