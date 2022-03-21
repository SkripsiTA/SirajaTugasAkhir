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
                            <h3 class="mb-0">Tambah Kode Klasifikasi Surat </h3>
                        </div>
                    </div>
                </div>
                <form action="{{ route('add-nomor-surat') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                      <h6 class="heading-small text-muted mb-4">Kode Master Surat</h6>
                      <div class="pl-lg-4">
                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="form-group">
                                      <label class="form-control-label" for="input-username">Kode Surat</label>
                                      <input type="text" name="kode_nomor_surat" class="form-control" value="{{old('kode_nomor_surat')}}" placeholder="Kode Surat" required>
                                  </div>
                              </div>
                              <div class="col-lg-8">
                                  <div class="form-group">
                                      <label class="form-control-label" for="input-email">Keterangan</label>
                                      <input type="text" name="keterangan" class="form-control" value="{{old('keterangan')}}" placeholder="Keterangan" required>
                                  </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group text-right">
                                    <a href="#" class="addnomorsurat btn btn-primary">Tambah Detail</a>
                                </div>
                              </div>
                          </div>
                      </div>
                      <div class="nomorsurat"></div>

                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('nomor-surat') }}" type="button" class="btn btn-secondary">Batal</a>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    $('.addnomorsurat').on('click', function(){
        addnomorsurat();
    });
    function addnomorsurat(){
        var nomorsurat = '<div><hr class="my-4" /><h6 class="heading-small text-muted mb-4">Kode Detail Surat</h6><div class="pl-lg-4"><div class="row"><div class="col-lg-4"><div class="form-group"><label class="form-control-label" for="input-username">Kode Detail Surat</label><input type="text" name="kode_detail_surat[]" class="form-control" value="{{old('kode_detail_surat')}}" placeholder="Kode Detail Surat" required></div></div><div class="col-lg-8"><div class="form-group"><label class="form-control-label" for="input-email">Rincian</label><input type="text" name="rincian[]" class="form-control" value="{{old('rincian')}}" placeholder="Rincian" required></div></div></div></div><div class="col-lg-12"><div class="form-group text-right"><a href="#" class="remove btn btn-danger">Hapus</a></div></div></div>';
        $('.nomorsurat').append(nomorsurat);
    };
    $('.nomorsurat').on('click', '.remove', function(){
        $(this).parent().parent().parent().remove();
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
