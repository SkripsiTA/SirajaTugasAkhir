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
                            <h3 class="mb-0">Tambah Staff</h3>
                        </div>
                    </div>
                </div>
                <form action="<?php echo e(route('add-staff')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="card-body">
                      <h6 class="heading-small text-muted mb-4">Data Diri</h6>
                      <div class="pl-lg-4">
                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="form-group">
                                      <label class="form-control-label" for="input-username">NIK<i class="text-danger text-sm text-bold">*</i></label>
                                      <input type="text" name="penduduk_id" class="form-control" value="<?php echo e(old('penduduk_id')); ?>" placeholder="NIK" required>
                                  </div>
                              </div>
                              <div class="col-lg-8">
                                  <div class="form-group">
                                      <label class="form-control-label" for="input-email">Nama Lengkap<i class="text-danger text-sm text-bold">*</i></label>
                                      <input type="text" name="keterangan" class="form-control" value="<?php echo e(old('nama_lengkap')); ?>" placeholder="Nama Lengkap" required>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Jabatan<i class="text-danger text-sm text-bold">*</i></label>
                                    <select name="nama_jabatan" class="form-control" id="nama_jabatan" required>
                                        <option value="">-- Pilih Jabatan --</option>
                                        <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($data->jabatan_id); ?>"><?php echo e($data->nama_jabatan); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Jabatan</label>
                                    <select name="nama_jabatan" class="form-control" id="nama_jabatan" required>
                                        <option value="">-- Pilih Jabatan --</option>
                                        <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($data->unit_id); ?>"><?php echo e($data->nama_unit); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                <label class="form-control-label" for="input-country">Periode Mulai Menjabat<i class="text-danger text-sm text-bold">*</i></label>
                                    <div class="input-group date" id="datepickermulai">
                                        <input type="date" name="masa_mulai" class="form-control" placeholder="Periode Mulai Menjabat" required/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                <label class="form-control-label" for="input-country">Periode Berakhir Menjabat<i class="text-danger text-sm text-bold">*</i></label>
                                    <div class="input-group date" id="datepickerakhir">
                                        <input type="date" name="masa_berakhir" class="form-control" placeholder="Periode Berakhir Menjabat" required />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                <label class="form-control-label" for="input-address">File SK<i class="text-danger text-sm text-bold">*</i></label>
                                <input type="file" name="file_sk" class="form-control" placeholder="File SK" required>
                                </div>
                            </div>
                          </div>
                      </div>
                      <hr class="my-4" />
                      <h6 class="heading-small text-muted mb-4">Data Akun</h6>
                      <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Email<i class="text-danger text-sm text-bold">*</i></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?php echo e(route('staff')); ?>" type="button" class="btn btn-secondary">Batal</a>
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


  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo e(asset('assets/vendor/jquery/dist/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/js-cookie/js.cookie.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')); ?>"></script>
  <!-- Optional JS -->
  <script src="<?php echo e(asset('assets/vendor/chart.js/dist/Chart.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/chart.js/dist/Chart.extension.js')); ?>"></script>
  <!-- Argon JS -->
  <script src="<?php echo e(asset('assets/js/argon.js?v=1.2.0')); ?>"></script>
</body>

</html>
<?php /**PATH D:\Teknologi Informasi\Tugas Akhir\PROJECT\SirajaProject\resources\views/admin/masterdata/pegawai/add-staff.blade.php ENDPATH**/ ?>