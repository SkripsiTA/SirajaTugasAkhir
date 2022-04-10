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
                    <div class="col-lg-12">
                        <div class="float-left">
                            <!-- Search form -->
                            <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                            <div class="form-group mb-0">
                                <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                                </div>
                            </div>
                            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </form>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('create-surat-keluar-panitia') }}" type="button" class="btn btn-md btn-primary"><i class="fa fa-plus"></i>
                            Tambah</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card shadow">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-send mr-2"></i>Menunggu Respon</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-watch-time mr-2"></i>Sedang Diproses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-check-bold mr-2"></i>Telah Dikonfirmasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false"><i class="ni ni-fat-remove mr-2"></i>Dibatalkan</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <!-- Card header -->
                                            <div class="card-header border-0">
                                            <h3 class="mb-0">Data Surat Keluar Panitia</h3>
                                            </div>
                                            <!-- Light table -->
                                            <div class="table-responsive">
                                            <table class="table align-items-center table-flush">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="name">No</th>
                                                    <th scope="col" class="sort" data-sort="name">Kode Surat</th>
                                                    <th scope="col-3" class="sort" data-sort="name">Parindikan</th>
                                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                                    <th scope="col">Tanggal Surat</th>
                                                    <th scope="col-2">Kaatur Ring</th>
                                                    <th scope="col" class="sort" data-sort="completion">Tim Kegiatan</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody class="list">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($suratkeluarwaiting as $data)
                                                <tr>
                                                    <td> {{ $i++ }} </td>
                                                    <td>{{ $data->nomor_surat }}</td>
                                                    <th scope="row">{{ $data->parindikan }}</th>
                                                    <td>
                                                        <span class="badge badge-pill badge-warning">{{ $data->status }}</span>
                                                    </td>
                                                    @if ($data->created_at == null)
                                                        <td>{{ $data->created_at }}</td>
                                                    @else
                                                        <td>{{ showDateTime($data->created_at, 'd F Y') }}</td>
                                                    @endif
                                                    <td>{{ $data->pihak_penerima }}</td>
                                                    <td>{{ $data->tim_kegiatan }}</td>
                                                    <td class="text-right">
                                                        <a href="{{ route('detail-surat-keluar-panitia', $data->surat_keluar_id) }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-eye"></i></a>
                                                    </td>

                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer py-4">
                                                {{ $suratkeluarwaiting->links('vendor.pagination.bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <!-- Card header -->
                                            <div class="card-header border-0">
                                            <h3 class="mb-0">Data Surat Keluar Panitia</h3>
                                            </div>
                                            <!-- Light table -->
                                            <div class="table-responsive">
                                                <table class="table align-items-center table-flush">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" class="sort" data-sort="name">No</th>
                                                        <th scope="col" class="sort" data-sort="name">Kode Surat</th>
                                                        <th scope="col-3" class="sort" data-sort="name">Parindikan</th>
                                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                                        <th scope="col">Tanggal Surat</th>
                                                        <th scope="col-2">Kaatur Ring</th>
                                                        <th scope="col" class="sort" data-sort="completion">Tim Kegiatan</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="list">
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($suratkeluarinprogress as $data)
                                                    <tr>
                                                        <td> {{ $i++ }} </td>
                                                        <td>{{ $data->nomor_surat }}</td>
                                                        <th scope="row">{{ $data->parindikan }}</th>
                                                        <td>
                                                            <span class="badge badge-pill badge-warning">{{ $data->status }}</span>
                                                        </td>
                                                        @if ($data->created_at == null)
                                                            <td>{{ $data->created_at }}</td>
                                                        @else
                                                            <td>{{ showDateTime($data->created_at, 'd F Y') }}</td>
                                                        @endif
                                                        <td>{{ $data->pihak_penerima }}</td>
                                                        <td>{{ $data->tim_kegiatan }}</td>
                                                        <td class="text-right">
                                                            <a href="{{ route('detail-surat-keluar-panitia', $data->surat_keluar_id) }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-eye"></i></a>
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer py-4">
                                                {{ $suratkeluarinprogress->links('vendor.pagination.bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <!-- Card header -->
                                            <div class="card-header border-0">
                                            <h3 class="mb-0">Data Surat Keluar Panitia</h3>
                                            </div>
                                            <!-- Light table -->
                                            <div class="table-responsive">
                                                <table class="table align-items-center table-flush">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" class="sort" data-sort="name">No</th>
                                                        <th scope="col" class="sort" data-sort="name">Kode Surat</th>
                                                        <th scope="col-3" class="sort" data-sort="name">Parindikan</th>
                                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                                        <th scope="col">Tanggal Surat</th>
                                                        <th scope="col-2">Kaatur Ring</th>
                                                        <th scope="col" class="sort" data-sort="completion">Tim Kegiatan</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="list">
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($suratkeluarverified as $data)
                                                    <tr>
                                                        <td> {{ $i++ }} </td>
                                                        <td>{{ $data->nomor_surat }}</td>
                                                        <th scope="row">{{ $data->parindikan }}</th>
                                                        <td>
                                                            <span class="badge badge-pill badge-warning">{{ $data->status }}</span>
                                                        </td>
                                                        @if ($data->tanggal_keluar == null)
                                                            <td>{{ $data->tanggal_keluar }}</td>
                                                        @else
                                                            <td>{{ showDateTime($data->tanggal_keluar, 'd F Y') }}</td>
                                                        @endif
                                                        <td>{{ $data->pihak_penerima }}</td>
                                                        <td>{{ $data->tim_kegiatan }}</td>
                                                        <td class="text-right">
                                                            <a href="{{ route('detail-surat-keluar-panitia', $data->surat_keluar_id) }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-eye"></i></a>
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer py-4">
                                                {{ $suratkeluarverified->links('vendor.pagination.bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <!-- Card header -->
                                            <div class="card-header border-0">
                                            <h3 class="mb-0">Data Surat Keluar Panitia</h3>
                                            </div>
                                            <!-- Light table -->
                                            <div class="table-responsive">
                                                <table class="table align-items-center table-flush">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" class="sort" data-sort="name">No</th>
                                                        <th scope="col" class="sort" data-sort="name">Kode Surat</th>
                                                        <th scope="col-3" class="sort" data-sort="name">Parindikan</th>
                                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                                        <th scope="col">Tanggal Pembuatan</th>
                                                        <th scope="col-2">Kaatur Ring</th>
                                                        <th scope="col" class="sort" data-sort="completion">Tim Kegiatan</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="list">
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($suratkeluarrejected as $data)
                                                    <tr>
                                                        <td> {{ $i++ }} </td>
                                                        <td>{{ $data->nomor_surat }}</td>
                                                        <th scope="row">{{ $data->parindikan }}</th>
                                                        <td>
                                                            <span class="badge badge-pill badge-warning">{{ $data->status }}</span>
                                                        </td>
                                                        @if ($data->created_at == null)
                                                            <td>{{ $data->created_at }}</td>
                                                        @else
                                                            <td>{{ showDateTime($data->created_at, 'd F Y') }}</td>
                                                        @endif
                                                        <td>{{ $data->pihak_penerima }}</td>
                                                        <td>{{ $data->tim_kegiatan }}</td>
                                                        <td class="text-right">
                                                            <a href="{{ route('detail-surat-keluar-panitia', $data->surat_keluar_id) }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-eye"></i></a>
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer py-4">
                                                {{ $suratkeluarrejected->links('vendor.pagination.bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="konfirmDesa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Desa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="card-body text-left">
                            <div class="form-section">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                    <label class="form-control-label" for="input-address">Nomor Registrasi Desa</label>
                                    <input name="nomor_register_desa" class="form-control" placeholder="(otomatis)" value="" type="text" disabled>
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
                                            <option value=""></option>
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
                                        <label class="form-control-label" for="input-kodewilayah">Kode Wilayah<i class="text-danger text-sm text-bold">*</i></label>
                                        <input type="text" name="kode_wilayah" class="form-control" placeholder="Kode Wilayah" value="" required>
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
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-country">Sebutan Pemimpin<i class="text-danger text-sm text-bold">*</i></label>
                                            <input type="text" name="sebutan_pemimpin" class="form-control" placeholder="Sebutan Pemimpin" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">NIK dan Nama Lengkap<i class="text-danger text-sm text-bold">*</i></label>
                                                <select name="kramamipil_id" class="kramamipil_id form-control" id="kramamipil_id" style="height: 100%" required>
                                                  <option value="">-- Pilih Krama --</option>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Nonaktifkan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Footer -->
    @include('admin.layouts.footer')

    <!-- Sweet-Alert -->
    @include('sweetalert::alert')

      <!-- Modal Add -->
      {{--  @include('admin.masterdata.pegawai.edit-prajuru-desa')  --}}

    {{--  @foreach($prajurubanjar as $data)
    <div class="modal fade" id="deletePrajuruDesa{{ $data->prajuru_banjar_adat_id }}">
        <div class="modal-dialog">
            <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">{{ $data->kramamipil->cacahkramamipil->penduduk->nama }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                <a href="/prajuru/desaadat/delete/{{ $data->prajuru_banjar_adat_id }}" type="button" class="btn btn-outline-light">Yes</a>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @endforeach  --}}

    </div>
  </div>


  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
    $('.nonaktif').click(function(e) {
        e.preventDefault();
        var prajurubanjarid = $(this).attr('data-id');

            swal({
                title: "Apakah yakin menonaktifkan ?",
                text: "Data prajuru tidak dapat diubah lagi!",
                icon: "warning",
                buttons: ["Batal", "Nonaktifkan"],
                dangerMode: true,
            })
            .then((isConfirm) => {
                if (isConfirm) {
                    window.location ="/prajuru/banjaradat/nonaktif/"+prajurubanjarid+""
                    swal("Berhasil! Data prajuru desa telah dinonaktifkan!", {
                        icon: "success",
                    });
                } else {
                    swal("Batal! Data prajuru desa aktif!", {
                        icon: "error",
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
