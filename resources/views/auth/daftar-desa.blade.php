<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/brand/logo.png')}}">
    <title>
    Sistem Surat Menyurat
    </title>
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/argon-design-system" />
    <!--  Social tags      -->
    <meta name="keywords" content="design system, bootstrap 4 design system, bootstrap 4 design, bootstrap 4 system, bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, argon, argon ui kit, creative tim, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit, argon design system">
    <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Argon - Free Design System for Bootstrap 4 by Creative Tim">
    <meta itemprop="description" content="Start your development with a Design System for Bootstrap 4.">
    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/90/original/opt_argon_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Argon - Free Design System for Bootstrap 4 by Creative Tim">
    <meta name="twitter:description" content="Start your development with a Design System for Bootstrap 4.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/90/original/opt_argon_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Argon Design System by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://demos.creative-tim.com/argon-design-system/index.html" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/90/original/opt_argon_thumbnail.jpg" />
    <meta property="og:description" content="Start your development with a Design System for Bootstrap 4." />
    <meta property="og:site_name" content="Creative Tim" />
    <!--  -->
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{ asset('asset/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('asset/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('asset/css/argon-design-system.min.css?v=1.2.2') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <link type="text/css" href="{{ asset('assets/dist/css/select2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/dist/js/select2.min.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://rawgit.com/select2/select2/master/dist/js/select2.js"></script>
    <link href="https://rawgit.com/select2/select2/master/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        section {
            padding: 100px;
        }
        .form-section{
            display: none;
        }
        .form-section.current {
            display: inherit;
        }
        .btn-primary, .btn-success {
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .parsley-errors-list{
            margin: 2px 0 3px;
            font-size: small;
            padding: 0;
            list-style-type: none;
            color: red;
        }
        .select2-container .select2-selection {
            line-height: 1.6 !important;
            height: 100% !important;
            border-radius: 3px !important;
            border-block-color: greyscale !important;
        }
    </style>
</head>

<body class="main-content color-swatch-header bg-secondary">
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Navbar -->
    @include('theme.navbar')
    <!-- End Navbar -->
    <div class="wrapper">
        <!-- Header -->
        <div class="header bg-gradient-secondary py-0 py-sm-8 pt-lg-0">

        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6 text-center">
            <div class="row justify-content-center">
                <div class="col-xl-8 order-xl-1">
                    <div class="card">
                    <div class="card-header">
                        <div class="row text-center">
                        <div class="col-12">
                            <div class="text-center text-muted mb-4">
                                <div class="col-sm-10 col-10 mx-md-auto">
                                    <img class="col-sm-4" src="{{ asset('assets/img/brand/logo.png')}}" width="100%">
                                    <h5 class="text-primary display-2">Pendaftaran Desa Adat</h5>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <form class="contact-form" method="POST" action="{{ route('save-desa-adat') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="card-body text-left">
                            <div class="form-section">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                    <label class="form-control-label" for="input-address">Nomor Registrasi Desa</label>
                                    <input name="nomor_register_desa" class="form-control" placeholder="Nomor Registrasi Desa (otomatis)" value="" type="text" disabled>
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
                                        <select name="provinsi" class="form-control" id="provinsi" required>
                                            <option value="">-- Pilih Provinsi --</option>
                                            <option value="{{ $provinsi->provinsi_id }}">{{ $provinsi->name }}</option>
                                            {{--  @foreach($provinsi as $prov)
                                                <option value="{{ $prov->provinsi_id }}">{{ $prov->nama_provinsi }}</option>
                                            @endforeach  --}}
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label class="form-control-label" for="input-email">Kabupaten<i class="text-danger text-sm text-bold">*</i></label>
                                        <select name="kabupaten" class="form-control" id="kabupaten" required>
                                        </select>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Kecamatan<i class="text-danger text-sm text-bold">*</i></label>
                                        <select name="kecamatan" class="form-control" id="kecamatan" required>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Desa<i class="text-danger text-sm text-bold">*</i></label>
                                        <select name="desa" class="form-control" id="desa" required>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label class="form-control-label" for="input-kodewilayah">Kode Nomor Surat<i class="text-danger text-sm text-bold">*</i></label>
                                        <input type="text" name="kode_nomor_surat" class="form-control" placeholder="Kode Nomor Surat" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label class="form-control-label" for="input-kodepos">Kode Pos<i class="text-danger text-sm text-bold">*</i></label>
                                        <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label class="form-control-label" for="input-kodepos">Status Desa<i class="text-danger text-sm text-bold">*</i></label>
                                        <select name="status_desa" class="form-control" id="status_desa" required>
                                            <option value="">-- Pilih Status Desa --</option>
                                            <option value="1" <?= $desaadat->desadat_status_aktif === '1' ? 'selected' : '' ?>>Aktif</option>
                                            <option value="0" <?= $desaadat->desadat_status_aktif === '0' ? 'selected' : '' ?>>Tidak Aktif</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                        <label class="form-control-label" for="input-address">Alamat<i class="text-danger text-sm text-bold">*</i></label>
                                        <input name="alamat_desa" class="form-control" placeholder="Alamat Kantor Desa" value="" type="text" required>
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
                                            <input type="text" name="telepon_desa" class="form-control" placeholder="Telepon" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-country">Whatsapp<i class="text-danger text-sm text-bold">*</i></label>
                                            <input type="text" name="kontak_wa" class="form-control" placeholder="Whatsapp" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-country">Faximile<i class="text-danger text-sm text-bold">*</i></label>
                                            <input type="text" name="fax_desa" class="form-control" placeholder="Faximile" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-address">Email Desa<i class="text-danger text-sm text-bold">*</i></label>
                                            <input name="email_desa" class="form-control" placeholder="Email Desa" value="" type="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-address">Web Desa<i class="text-danger text-sm text-bold">*</i></label>
                                            <input name="web_desa" class="form-control" placeholder="Web Desa" value="" type="url" required>
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
                                                <input type="number" name="luas_desa" class="form-control" placeholder="Luas Desa" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-country">Struktur Organisasi Desa<i class="text-danger text-sm text-bold">* File dalam format .jpg,jpeg,pdf (maksimal 3 MB)</i></label>
                                            <input type="file" name="file_struktur_pem" class="form-control" placeholder="Struktur Pembentukan Desa" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-country">Logo Desa<i class="text-danger text-sm text-bold">* File dalam format .jpg,jpeg,png (maksimal 1 MB)</i></label>
                                            <input type="file" name="logo_desa" class="form-control" placeholder="Logo Desa" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-address">Sejarah Desa</label>
                                            <textarea rows="4" name="sejarah_desa" class="form-control" placeholder="Sejarah Desa"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-section">
                                <h6 class="heading-small text-muted mb-4">Data Pemimpin</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-country">Sebutan Pemimpin<i class="text-danger text-sm text-bold">*</i></label>
                                            <input type="text" name="sebutan_pemimpin" class="form-control" placeholder="Sebutan Pemimpin" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">NIK dan Nama Lengkap<i class="text-danger text-sm text-bold">*</i></label>
                                                <select name="kramamipil_id" class="kramamipil form-control" id="kramamipil_id" style="height: 100%" required>
                                                  <option value="">-- Pilih Krama --</option>
                                                  @foreach ($kramamipil as $data)
                                                      <option value="{{ $data->krama_mipil_id }}">{{ $data->cacahkramamipil->penduduk->nik }} - {{ $data->cacahkramamipil->penduduk->nama }}</option>
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
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="form-navigation">
                                <button type="button" class="previous btn btn-primary float-left">Sebelumnya</button>
                                <button type="button" class="next btn btn-primary float-right">Selanjutnya</button>
                                <button type="submit" class="btn btn-success float-right">Kirim</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>


    <!-- Footer -->
    @include('theme.footer')
    <!-- Footer -->

    </div>
    <script src="{{asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>

    <!-- Select2 -->
    <script>
        $(document).ready(function() {
            $('.kramamipil').select2();
        });
    </script>

    <!-- Live Search -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $(document).ready(function() {

            $("#nomor_krama_mipil").on('keyup',function() {
                var nomor_krama_mipil = $(this).val();
                console.log(nomor_krama_mipil)

                $.ajax({
                    type : 'POST',
                    url : '{{ route('caridata') }}',
                    data : {nomor_krama_mipil:nomor_krama_mipil},
                    cache : false,
                    success: function(msg){
                        console.log(msg)
                        $('#nama_krama_mipil').empty();
                        $.each(msg, function(key, data){
                            $('#nama_krama_mipil').append('<option value="'+data.krama_mipil_id+'">'+data.cacahkramamipil.penduduk_id+'</option>');
                        });
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })

            $("#nama_krama_mipil").on('change',function() {
                var id =  $('#nama_krama_mipil').val();
                var text = $('#nama_krama_mipil option:selected').text();
                console.log(id)
                $('#nama_krama_mipil').empty();
                $('#nama_krama_mipil').append('<option selected value="'+id+'">'+text+'</option>');
                $('#nomor_krama_mipil').val(id);

            });


        });
    </script>

    <!-- Datepicker Indonesia -->
    {{--  <script type="text/javascript">
        $('.datepicker').datepicker({
            format: 'dd/mmmm/yyyy',
            startDate: '-3d'
        });
    </script>  --}}

    <!-- Multi Form -->
    <script>
        $(function(){
            $.fn.datepicker.defaults.format = "dd-M-yyyy";
            $('.datepicker').datepicker({
                format: 'dd-M-yyyy',
            });

            var $sections = $('.form-section');

            function navigateTo(index){
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index>0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type=submit]').toggle(atTheEnd);
            }

            function curIndex(){
                return $sections.index($sections.filter('.current'));
            }

            $('.form-navigation .previous').click(function(){
                navigateTo(curIndex()-1);
            });

            $('.form-navigation .next').click(function(){
                $('.contact-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function(){
                    navigateTo(curIndex()+1);
                });
            });

            $sections.each(function(index,section){
                $(section).find(':input').attr('data-parsley-group','block-'+index);
            });

            navigateTo(0);
        });
    </script>

    <!-- Ajax Dropdown Dinamis -->
    <script>
        $(function(){
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $(function() {
                $('#provinsi').on('change', function() {
                    let provinsi_id = $('#provinsi').val();

                    $.ajax({
                        type : 'POST',
                        url : '{{ route('get-kabupaten') }}',
                        data : {provinsi_id:provinsi_id},
                        cache : false,
                        success: function(msg){
                            $('#kabupaten').html(msg);
                            $('#kecamatan').html('');
                            $('#desa').html('');
                        },
                        error: function(data){
                            console.log('error:',data)
                        },
                    })
                })

                $('#kabupaten').on('change', function() {
                    let kabupaten_id = $('#kabupaten').val();

                    $.ajax({
                        type : 'POST',
                        url : '{{ route('get-kecamatan') }}',
                        data : {kabupaten_id:kabupaten_id},
                        cache : false,
                        success: function(msg){
                            $('#kecamatan').html(msg);
                            $('#desa').html('');
                        },
                        error: function(data){
                            console.log('error:',data)
                        },
                    })
                })

                $('#kecamatan').on('change', function() {
                    let kecamatan_id = $('#kecamatan').val();

                    $.ajax({
                        type : 'POST',
                        url : '{{ route('get-desa-adat') }}',
                        data : {kecamatan_id:kecamatan_id},
                        cache : false,
                        success: function(msg){
                            $('#desa').html(msg);
                        },
                        error: function(data){
                            console.log('error:',data)
                        },
                    })
                })

                $('#desa').on('change', function() {
                    let desa_id = $('#desa').val();

                    $.ajax({
                        type : 'POST',
                        url : '{{ route('get-desa-adat') }}',
                        data : {kecamatan_id:kecamatan_id},
                        cache : false,
                        success: function(msg){
                            $('#desa').html(msg);
                        },
                        error: function(data){
                            console.log('error:',data)
                        },
                    })
                })
            });
        });
    </script>



    <!--   Core JS Files   -->
    <script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('asset/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ asset('asset/js/plugins/bootstrap-switch.js') }}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('asset/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('asset/js/argon-design-system.min.js?v=1.2.2') }}" type="text/javascript"></script> <!-- Sharrre libray -->
    <script src="{{ asset('asset/js/plugins/jquery.sharrre.min.js') }}"></script>
    {{-- <!-- Core -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('assets/js/argon.min.js?v=1.2.0') }}"></script> --}}
    <!-- Argon JS -->
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
    <script>
    $(document).ready(function() {



        // Goolge Analytics Code Don't Delete

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-46172202-1']);
        _gaq.push(['_trackPageview']);

        (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
        })();

        // Facebook Pixel Code Don't Delete
        ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
        }(window,
        document, 'script', '//connect.facebook.net/en_US/fbevents.js');

        try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

        } catch (err) {
        console.log('Facebook Track Error:', err);
        }


        //
        //

    });
    </script>
    <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
    </noscript>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
    window.TrackJS &&
        TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-design-system-pro"
        });
    </script>
</body>

</html>
