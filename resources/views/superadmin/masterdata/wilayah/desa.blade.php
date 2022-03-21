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
            <!-- Card stats -->
            <div class="row">
              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Desa</h5>
                            <span class="h2 font-weight-bold mb-0">350,897</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                            <i class="ni ni-building"></i>
                            </div>
                        </div>
                    </div>
                    <a href="/desa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Kecamatan</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                          <i class="ni ni-chart-pie-35"></i>
                        </div>
                      </div>
                    </div>
                    <a href="/kecamatan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Kabupaten</h5>
                        <span class="h2 font-weight-bold mb-0">924</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                          <i class="ni ni-money-coins"></i>
                        </div>
                      </div>
                    </div>
                    <a href="/kabupaten" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Provinsi</h5>
                        <span class="h2 font-weight-bold mb-0">21</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                          <i class="ni ni-circle-08"></i>
                        </div>
                      </div>
                    </div>
                    <a href="/provinsi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
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
                    <div class="col-lg-12 col-7 text-right">
                        <a href="#" type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#exampleModalAddDesa"><i class="fa fa-plus"></i>
                        Tambah</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card shadow">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <!-- Card header -->
                                            <div class="card-header border-0">
                                            <h3 class="mb-0">Data Desa</h3>
                                            </div>
                                            <!-- Light table -->
                                            <div class="table-responsive">
                                            <table class="table align-items-center table-flush">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="no">No</th>
                                                    <th scope="col" class="sort" data-sort="desa_id">Kode Desa</th>
                                                    <th scope="col" class="sort" data-sort="nama_desa">Nama</th>
                                                    <th scope="col" class="sort" data-sort="kecamatan_id">Kecamatan</th>
                                                    <th scope="col" class="sort" data-sort="alamat_kantor_desa">Alamat</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col" class="sort" data-sort="desa_jenis">Jenis Desa</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody class="list">
                                                @foreach($desa as $data)
                                                <tr>
                                                    <td> {{ $loop->iteration }} </td>
                                                    <td> {{ $data->desa_id }} </td>
                                                    <th scope="row"> {{ $data->nama_desa }} </th>
                                                    <td> {{ $data->kecamatan->nama_kecamatan }} </td>
                                                    <td> {{ $data->alamat_kantor_desa }} </td>
                                                    <td>
                                                        @if ($data->status_desa == "1")
                                                            <span class="right badge badge-info">Aktif</span>
                                                        @else
                                                        <span class="right badge badge-secondary">Tidak Aktif</span>
                                                        @endif
                                                    </td>
                                                    <td>  {{ $data->desa_jenis}} </td>
                                                    <td class="text-centre">
                                                        <a href="#" class="btn btn-sm btn-flat btn-warning" data-toggle="modal" data-target="#edit{{ $data->desa_id }}"><i class="fa fa-edit"></i></a>
                                                        {{--  <a href="#" class="btn btn-sm btn-flat btn-warning" data-toggle="modal" data-target="#exampleModalEditDesa{{ $data->desa_id }}"><i class="fa fa-edit"></i></a>  --}}
                                                        <button class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#delete{{ $data->desa_id }}"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer py-4">
                                                {{ $desa->links('vendor.pagination.bootstrap-4') }}
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
      <!-- Footer -->
      @include('superadmin.layouts.footer')

      <!-- Sweet-Alert -->
      @include('sweetalert::alert')

      <!-- Modal Add -->
      @include('superadmin.masterdata.wilayah.add-desa')

      <!-- Modal Edit -->
      @include('superadmin.masterdata.wilayah.edit-desa')

    @foreach($desa as $data)
    <div class="modal fade" id="delete{{ $data->desa_id }}">
        <div class="modal-dialog">
            <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">{{ $data->nama_desa }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                <a href="/delete-desa/{{ $data->desa_id }}" type="button" class="btn btn-outline-light">Yes</a>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @endforeach

    </div>
  </div>
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
