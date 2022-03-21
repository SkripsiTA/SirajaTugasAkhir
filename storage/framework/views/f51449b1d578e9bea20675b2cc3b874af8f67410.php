<div class="modal fade" id="exampleModalAddDesa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Desa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action=" <?php echo e(route('add-desa')); ?> " method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="modal-body">
                
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Inputan yang anda berikan salah!<br><br>
                    </div>
                <?php endif; ?>
                <div class="pl-lg-12">
                    <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Kode Desa</label>
                            <input type="text" id="input-kode" class="form-control" placeholder="Kode Desa" name="desa_id">
                            <div class="text-danger">
                                <?php $__errorArgs = ['desa_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <?php echo e($message); ?>

                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                        <label class="form-control-label" for="input-email">Nama Desa</label>
                        <input type="text" id="input-nama" class="form-control" placeholder="Nama Desa" name="nama_desa">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Kecamatan</label>
                            <select name="kecamatan_id" class="form-control" id="exampleFormControlSelect1">
                                <option value="">-- Pilih Kecamatan --</option>
                                <?php $__currentLoopData = $kec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->kecamatan_id); ?>"><?php echo e($data->nama_kecamatan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Status Desa</label>
                            <select name="status_desa" class="form-control" id="exampleFormControlSelect2">
                                <option value="">-- Pilih Status Desa --</option>
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Jenis Desa</label>
                        <select name="desa_jenis" class="form-control" id="exampleFormControlSelect3">
                            <option value="">-- Pilih Jenis Desa --</option>
                            <option value="desa">Desa</option>
                            <option value="kelurahan">Kelurahan</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Alamat</label>
                        <textarea type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat" name="alamat_desa"></textarea>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>
<?php /**PATH D:\Teknologi Informasi\Tugas Akhir\PROJECT\SirajaProject\resources\views/superadmin/masterdata/wilayah/add-desa.blade.php ENDPATH**/ ?>