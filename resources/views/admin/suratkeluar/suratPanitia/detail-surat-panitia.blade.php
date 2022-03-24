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

  <style type="text/css">
    @font-face {
        font-family: BaliJenarStd;
        src: url('{{ asset('assets/fonts/aksara-bali/bali-jenar-std.ttf') }}');
    }
    </style>

    <style type="text/css">
        @font-face {
            font-family: TimesNewRoman;
            src: url('{{ asset('assets/fonts/times-new-roman.ttf') }}');
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
                        <div class="col-10">
                            <h3 class="mb-0">Detail surat Keluar</h3>
                        </div>
                        <div class="col-2 float-right">
                            <a href="#" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-print "></i></a>
                            <a href="#" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-spinner"></i></a>
                            <a href="#" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-download"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table style="border: 1px solid transparent;" align="center">
                        <tr>
                            <td><img  src="{{ asset('assets/img/logo-desa/'.$suratkeluarpanitia->desaadat->desadat_logo) }}" style="width:200px; height:200px;" alt="user-img"></td>
                            <td class="text-center">
                                <font size="5" style="font-family: BaliJenarStd;">Desa Adat {{ $suratkeluarpanitia->desaadat->desadat_nama }}</font><br>
                                <font size="6" class="text-uppercase font-weight-bold" style="font-family: TimesNewRoman;">Desa Adat {{ $suratkeluarpanitia->desaadat->desadat_nama }}</font><br>
                                <font size="3" class="text-uppercase font-weight-bold" style="font-family: TimesNewRoman;">Kecamatan {{ $suratkeluarpanitia->desaadat->kecamatan->name }} Kabupaten {{ $suratkeluarpanitia->desaadat->kecamatan->kabupaten->name }}</font><br>
                                <font size="4" class="text-uppercase font-weight-bold" style="font-family: TimesNewRoman;">{{ $suratkeluarpanitia->tim_kegiatan }}</font><br>
                                <font size="2" style="font-family: TimesNewRoman;">{{ $suratkeluarpanitia->desaadat->desadat_alamat_kantor }}, {{ $suratkeluarpanitia->desaadat->desadat_telpon_kantor }}, {{ $suratkeluarpanitia->desaadat->desadat_wa_kontak_1 }}</font><br>
                            </td>
                            <td colspan="2"><hr></td>
                        </tr>
                        <tr>
                            <td colspan="2"><hr></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-right">
                                <font size="3" style="font-family: TimesNewRoman;">{{ $suratkeluarpanitia->desaadat->desadat_nama }}, {{ showDateTime($suratkeluarpanitia->tanggal_keluar, 'd F Y') }}</font><br><br>
                                <font size="3" style="font-family: TimesNewRoman;">Katur Majeng ring : <b>{{ $suratkeluarpanitia->pihak_penerima }}</font><br><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <font size="3" style="font-family: TimesNewRoman;">Nomor Surat : {{ $suratkeluarpanitia->nomor_surat }}</font><br>
                                <font size="3" style="font-family: TimesNewRoman;">Lepihan     : {{ $suratkeluarpanitia->lepihan }}</font><br>
                                <font size="3" style="font-family: TimesNewRoman;">Parindikan  : {{ $suratkeluarpanitia->parindikan }}</font><br><br>
                                <font size="5" style="font-family: BaliJenarStd;">Om Swastyastu</font><br>
                                <font size="3" class="font-weight-bold" style="font-family: TimesNewRoman;">Om Swastyastu</font><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <font size="3" style="font-family: TimesNewRoman;">{{ $suratkeluarpanitia->daging_surat }}</font><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <font size="3" class="font-weight-bold" style="font-family: TimesNewRoman;">Om Santih, Santih, Santih Om</font><br>
                                <font size="5" style="font-family: BaliJenarStd;">Om Santih, Santih, Santih Om</font><br><br>
                                <font size="3" class="font-weight-bold" style="font-family: TimesNewRoman;">{{ $suratkeluarpanitia->tim_kegiatan }}</font><br><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left">
                                <font size="3" style="font-family: TimesNewRoman;">Ketua</font><br><br><br><br>
                                <font size="3" class="font-weight-bold" style="font-family: TimesNewRoman;">{{ $suratkeluarpanitia->detailsuratkeluarpanitia[0]->ketuapanitia->cacahkramamipil->penduduk->nama }}</font><br>
                            </td>
                            <td class="text-right">
                                <font size="3" style="font-family: TimesNewRoman;">Sekretaris</font><br><br><br><br>
                                <font size="3" class="font-weight-bold" style="font-family: TimesNewRoman;">{{ $suratkeluarpanitia->detailsuratkeluarpanitia[0]->sekretarispanitia->cacahkramamipil->penduduk->nama }}</font><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"  class="text-center" >
                                <font size="3" style="font-family: TimesNewRoman;">Bendesa</font><br><br><br><br><br>
                                <font size="3" class="font-weight-bold" style="font-family: TimesNewRoman;">{{ $suratkeluarpanitia->detailsuratkeluarpanitia[0]->bendesa->kramamipil->cacahkramamipil->penduduk->nama }}</font><br>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('home-surat-keluar-panitia') }}" type="button" class="btn btn-secondary">Batal</a>
                </div>
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
