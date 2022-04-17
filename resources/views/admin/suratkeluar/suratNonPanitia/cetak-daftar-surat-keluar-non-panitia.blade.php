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
  {{--  <style type="text/css" media="print">
    @page { size: landscape; }
  </style>  --}}

  <style>
    .select2-container .select2-selection {
        line-height: 1.6 !important;
        height: 100% !important;
        border-radius: 3px !important;
        border-block-color: greyscale !important;
    }
    .tab {
        display: inline-block;
        margin-left: 60px;
    }

    .margin-left {
        display: inline-block;
        margin-left: 100px;
    }

    .margin-right {
        display: inline-block;
        margin-right: 100px;
    }

    .space {
        display: inline-block;
        margin-left: 500px;
    }

    .justify {
        text-align: justify;
        text-justify: inter-word;
    }
  </style>

  <style type="text/css">
    @font-face {
        font-family: BaliSdbl;
        src: url('{{ asset('assets/fonts/aksara-bali/balisdbl.ttf') }}');
    }
    </style>

    <style type="text/css">
        @font-face {
            font-family: TimesNewRoman;
            font-color:black;
            src: url('{{ asset('assets/fonts/times-new-roman.ttf') }}');
        }
    </style>

</head>

<body>

  <!-- Main content -->
  <div class="main-content" id="panel">


    <!-- Header -->
    <!-- Header -->
    <div class="header bg pb-6">

    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
            <table style="border: 1px solid transparent;" align="center">
                <tr>
                    <td><img  src="{{ asset('assets/img/logo-desa/'.Auth::user()->desaadat->desadat_logo) }}" style="width:200px; height:200px;" alt="user-img"></td>
                    <td class="text-center">
                        <img  src="{{ asset('assets/img/aksara-bali/'.Auth::user()->desaadat->desadat_aksara_bali) }}"  alt="user-img"><br>
                        <font size="6" class="text-uppercase font-weight-bold" style="font-family: TimesNewRoman;" color="#444444">Desa Adat {{ Auth::user()->desaadat->desadat_nama }}</font><br>
                        <font size="3" class="text-uppercase font-weight-bold" style="font-family: TimesNewRoman;" color="#444444">Kecamatan {{ Auth::user()->desaadat->kecamatan->name }} Kabupaten {{ Auth::user()->desaadat->kecamatan->kabupaten->name }}</font><br>
                        <font size="2" style="font-family: TimesNewRoman;" color="#444444">{{ Auth::user()->desaadat->desadat_alamat_kantor }}, {{ Auth::user()->desaadat->desadat_telpon_kantor }}, {{ Auth::user()->desaadat->desadat_wa_kontak_1 }}</font><br>
                    </td>
                    <td colspan="2"><hr></td>
                </tr>
                <tr>
                    <td colspan="2"><hr style="border-top: 2px solid black;"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <font size="4" class="text-uppercase font-weight-bold" style="font-family: TimesNewRoman;" color="#444444">Data Surat Keluar Non Panitia</font><br><br><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table class="table align-items-left table-flush" style="border: 2px solid black;">
                            <thead class="thead-light" style="border: 2px solid black;">
                                <tr class="text-left" style="border: 2px solid black;">
                                    <th class="col" style="border: 2px solid; color:#444444;">No</th>
                                    <th class="col" style="border: 2px solid; color:#444444;">Kode Surat</th>
                                    <th class="col-3" style="border: 2px solid; color:#444444;">Parindikan</th>
                                    <th class="col" style="border: 2px solid; color:#444444;">Status</th>
                                    <th class="col" style="border: 2px solid; color:#444444;">Tanggal Surat</th>
                                    <th class="col-2" style="border: 2px solid; color:#444444;">Katur Ring</th>
                                    <th class="col" style="border: 2px solid; color:#444444;">Tanggal Keluar</th>

                                </tr>
                            </thead>
                            <tbody class="list" style="border: 2px solid black;">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($suratkeluar as $data)
                                <tr style="border: 2px solid black;">
                                    <td style="border: 2px solid; color:#444444;"> {{ $i++ }} </td>
                                    <td style="border: 2px solid; color:#444444;"> {{ $data->nomor_surat }} </td>
                                    <td style="border: 2px solid; color:#444444;"> {{ $data->parindikan }} </td>
                                    <td style="border: 2px solid; color:#444444;"> {{ $data->status }} </td>
                                    @if ($data->created_at != null)
                                    <td style="border: 2px solid; color:#444444;"> {{ showDateTime($data->created_at, 'd F Y') }}</td>
                                    @else
                                        <td style="border: 2px solid; color:#444444;">{{ $data->created_at }}</td>
                                    @endif
                                    <td style="border: 2px solid; color:#444444;"> {{ $data->pihak_penerima }} </td>
                                    @if ($data->tanggal_keluar != null)
                                    <td style="border: 2px solid; color:#444444;"> {{ showDateTime($data->tanggal_keluar, 'd F Y') }}</td>
                                    @else
                                        <td style="border: 2px solid; color:#444444;">{{ $data->tanggal_keluar }}</td>
                                    @endif

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
      </div>

      <!-- Sweet-Alert -->
      @include('sweetalert::alert')
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>  --}}
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

    {{--  $('.inprogress').click(function(e) {
        e.preventDefault();
        var suratkeluarpanitiaid = $(this).attr('data-id');

            swal({
                title: "Apakah melanjutkan verifikasi surat ?",
                text: "Notifikasi verifikasi akan dikirimkan!",
                icon: "warning",
                buttons: ["Batal", "Lanjutkan"],
                successMode: true,
            })
            .then((isConfirm) => {
                if (isConfirm) {
                    window.location ="/surat/keluar/panitia/cetak/"+suratkeluarpanitiaid+""
                    swal("Berhasil! Notifikasi verifikasi akan dikirimkan!", {
                        icon: "success",
                    });
                } else {
                    swal("Data surat belum diproses!", {
                        icon: "error",
                    });
                }
            });
      });  --}}
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

  <script type="text/javascript">
    setTimeout(
    function() {
        window.print();
    }, 100);
  </script>
</body>

</html>
