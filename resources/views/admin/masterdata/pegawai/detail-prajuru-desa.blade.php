<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Sistem Surat Menyurat</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/img/brand/mail.png') }}" type="image/png">
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
                            <h3 class="mb-0">Detail Prajuru Desa Adat</h3>
                        </div>
                    </div>
                </div>
                <form action="{{ route('detail-prajuru-desa-adat', $detailprajurudesa->prajuru_desa_adat_id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                      <h6 class="heading-small text-muted mb-4">Data Diri</h6>
                      <div class="pl-lg-4">
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <label class="form-control-label" for="input-email">NIK dan Nama Lengkap<i class="text-danger text-sm text-bold">*</i></label>
                                      <select name="kramamipil_id" class="kramamipil_id form-control" id="kramamipil_id" style="height: 100%" disabled>
                                        <option value="{{ $detailprajurudesa->krama_mipil_id }}">{{ $detailprajurudesa->kramamipil->cacahkramamipil->penduduk->nik }} - {{ $detailprajurudesa->kramamipil->cacahkramamipil->penduduk->nama }}</option>
                                        {{--  @foreach ($editprajurudesa as $data)
                                            <option value="{{ $data->krama_mipil_id }}" data-id="{{ $data->kramamipil->cacahkramamipil->penduduk->nik }}">{{ $data->kramamipil->cacahkramamipil->penduduk->nik }} - {{ $data->kramamipil->cacahkramamipil->penduduk->nama }}</option>
                                        @endforeach  --}}
                                      </select>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Jabatan<i class="text-danger text-sm text-bold">*</i></label>
                                    <select name="nama_jabatan" class="form-control" id="nama_jabatan" readonly>
                                        <option value="{{ $detailprajurudesa->jabatan }}">{{ $detailprajurudesa->jabatan }}</option>
                                        {{--  <option value="bendesa" <?= $editprajurudesa->jabatan === 'bendesa' ? 'selected' : '' ?>>Bendesa</option>
                                        <option value="pangliman" <?= $editprajurudesa->jabatan === 'pangliman' ? 'selected' : '' ?>>Pangliman</option>
                                        <option value="penyarikan" <?= $editprajurudesa->jabatan === 'penyarikan' ? 'selected' : '' ?>>Penyarikan</option>
                                        <option value="patengen" <?= $editprajurudesa->jabatan === 'patengen' ? 'selected' : '' ?>>Patengen</option>
                                        <option value="kasinoman" <?= $editprajurudesa->jabatan === 'kasinoman' ? 'selected' : '' ?>>Kasinoman</option>
                                        <option value="baga palemahan" <?= $editprajurudesa->jabatan === 'baga palemahan' ? 'selected' : '' ?>>Baga Palemahan</option>  --}}
                                    </select>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Status<i class="text-danger text-sm text-bold">*</i></label>
                                    <select name="status_prajuru_desa" class="form-control" id="status_prajuru_desa" readonly>
                                        <option value="{{ $detailprajurudesa->status_prajuru_desa_adat }}">{{ $detailprajurudesa->status_prajuru_desa_adat }}</option>
                                        {{--  <option value="aktif" <?= $editprajurudesa->status_prajuru_desa_adat === 'aktif' ? 'selected' : '' ?>>Aktif</option>
                                        <option value="tidak aktif" <?= $editprajurudesa->status_prajuru_desa_adat === 'tidak aktif' ? 'selected' : '' ?>>Tidak Aktif</option>  --}}
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
                                                <input class="form-control" name="masa_mulai" placeholder="Periode Mulai" type="text" value="{{ showDateTime($detailprajurudesa->tanggal_mulai_menjabat, 'd F Y') }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" name="masa_berakhir" placeholder="Periode Berakhir" type="text" value="{{ showDateTime($detailprajurudesa->tanggal_akhir_menjabat, 'd F Y') }}" readonly>
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
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $detailprajurudesa->desaadat->user[0]->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Password</label>
                                    <input type="password" name="password" class="password form-control" id="password" placeholder="Password" value="{{ $detailprajurudesa->desaadat->user[0]->password }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Status<i class="text-danger text-sm text-bold">*</i></label>
                                    <select name="role_prajuru" class="form-control" id="role_prajuru" readonly>
                                        <option value="{{ $detailprajurudesa->desaadat->user[0]->role }}" selected>{{ $detailprajurudesa->desaadat->user[0]->role }}</option>
                                        {{--  <option value="Bendesa" <?= $editprajurudesa->desaadat->user[0]->role === 'Bendesa' ? 'selected' : '' ?>>Bendesa</option>
                                        <option value="Admin" <?= $editprajurudesa->desaadat->user[0]->role === 'Admin' ? 'selected' : '' ?>>Admin</option>  --}}
                                    </select>
                                </div>
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
