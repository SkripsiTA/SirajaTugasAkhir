<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Sistem Surat Menyurat</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo e(asset('assets/img/brand/mail.png')); ?>" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/nucleo/css/nucleo.css')); ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')); ?>" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/argon.css?v=1.2.0')); ?>" type="text/css">
  <!-- Load CSS file for Select2 -->
  
  <link type="text/css" href="<?php echo e(asset('assets/dist/css/select2.min.css')); ?>" rel="stylesheet">
  <script src="<?php echo e(asset('assets/dist/js/select2.min.js')); ?>" defer></script>

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
  <?php echo $__env->make('admin.layouts.sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php echo $__env->make('admin.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                    
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
                            <h3 class="mb-0">Tambah Prajuru Desa Adat</h3>
                        </div>
                    </div>
                </div>
                <form action="<?php echo e(route('update-prajuru-desa-adat', $editprajurudesa->prajuru_desa_adat_id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="card-body">
                      <h6 class="heading-small text-muted mb-4">Data Diri</h6>
                      <div class="pl-lg-4">
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <label class="form-control-label" for="input-email">NIK dan Nama Lengkap<i class="text-danger text-sm text-bold">*</i></label>
                                      <select name="kramamipil_id" class="kramamipil_id form-control" id="kramamipil_id" style="height: 100%" required>
                                        <option value="<?php echo e($editprajurudesa->krama_mipil_id); ?>"><?php echo e($editprajurudesa->kramamipil->cacahkramamipil->penduduk->nik); ?> - <?php echo e($editprajurudesa->kramamipil->cacahkramamipil->penduduk->nama); ?></option>
                                        
                                      </select>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Jabatan<i class="text-danger text-sm text-bold">*</i></label>
                                    <select name="nama_jabatan" class="form-control" id="nama_jabatan" required>
                                        
                                        <option value="bendesa" <?= $editprajurudesa->jabatan === 'bendesa' ? 'selected' : '' ?>>Bendesa</option>
                                        <option value="pangliman" <?= $editprajurudesa->jabatan === 'pangliman' ? 'selected' : '' ?>>Pangliman</option>
                                        <option value="penyarikan" <?= $editprajurudesa->jabatan === 'penyarikan' ? 'selected' : '' ?>>Penyarikan</option>
                                        <option value="patengen" <?= $editprajurudesa->jabatan === 'patengen' ? 'selected' : '' ?>>Patengen</option>
                                        <option value="kasinoman" <?= $editprajurudesa->jabatan === 'kasinoman' ? 'selected' : '' ?>>Kasinoman</option>
                                        <option value="baga palemahan" <?= $editprajurudesa->jabatan === 'baga palemahan' ? 'selected' : '' ?>>Baga Palemahan</option>
                                    </select>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Status<i class="text-danger text-sm text-bold">*</i></label>
                                    <select name="status_prajuru_desa" class="form-control" id="status_prajuru_desa" required>
                                        
                                        <option value="aktif" <?= $editprajurudesa->status_prajuru_desa_adat === 'aktif' ? 'selected' : '' ?>>Aktif</option>
                                        <option value="tidak aktif" <?= $editprajurudesa->status_prajuru_desa_adat === 'tidak aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
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
                                                <input class="form-control" name="masa_mulai" placeholder="Periode Mulai" type="text" value="<?php echo e($editprajurudesa->tanggal_mulai_menjabat); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" name="masa_berakhir" placeholder="Periode Berakhir" type="text" value="<?php echo e($editprajurudesa->tanggal_akhir_menjabat); ?>">
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
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo e($editprajurudesa->desaadat->user[0]->email); ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Password</label>
                                    <input type="password" name="password" class="password form-control" id="password" placeholder="Password" value="<?php echo e($editprajurudesa->desaadat->user[0]->password); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Status<i class="text-danger text-sm text-bold">*</i></label>
                                    <select name="role_prajuru" class="form-control" id="role_prajuru" required>
                                        
                                        <option value="Bendesa" <?= $editprajurudesa->desaadat->user[0]->role === 'Bendesa' ? 'selected' : '' ?>>Bendesa</option>
                                        <option value="Admin" <?= $editprajurudesa->desaadat->user[0]->role === 'Admin' ? 'selected' : '' ?>>Admin</option>
                                    </select>
                                </div>
                              </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?php echo e(route('prajuru-desa-adat')); ?>" type="button" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <!-- Footer -->
      <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <!-- Sweet-Alert -->
      <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  

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
  <script src="<?php echo e(asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
  <!-- Core -->
  <script src="<?php echo e(asset('assets/vendor/jquery/dist/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/js-cookie/js.cookie.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')); ?>"></script>
  <script src="<?php echo e(asset('asset/js/plugins/nouislider.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('asset/js/plugins/moment.min.js')); ?>"></script>
  <script src="<?php echo e(asset('asset/js/plugins/datetimepicker.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('asset/js/plugins/bootstrap-datepicker.min.js')); ?>"></script>
  <!-- Optional JS -->
  <script src="<?php echo e(asset('assets/vendor/chart.js/dist/Chart.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/chart.js/dist/Chart.extension.js')); ?>"></script>
  <!-- Argon JS -->
  <script src="<?php echo e(asset('assets/js/argon.js?v=1.2.0')); ?>"></script>
</body>

</html>
<?php /**PATH D:\Teknologi Informasi\Tugas Akhir\PROJECT\SirajaProject\resources\views/admin/masterdata/pegawai/edit-prajuru-desa.blade.php ENDPATH**/ ?>