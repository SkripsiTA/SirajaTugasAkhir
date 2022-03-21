<div class="modal fade" id="exampleModalAddKabupaten" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kabupaten</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="/add-kabupaten" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="modal-body">
                <div class="pl-lg-12">
                    <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label" for="input-username">Kode Kabupaten</label>
                        <input type="text" id="input-kode" class="form-control" placeholder="Kode Kabupaten" name="kabupaten_id">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                        <label class="form-control-label" for="input-email">Nama Kabupaten</label>
                        <input type="text" id="input-nama" class="form-control" placeholder="Nama Kabupaten" name="nama_kabupaten">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Provinsi</label>
                            <select name="provinsi_id" class="form-control" id="exampleFormControlSelect1">
                                <option value="">-- Pilih Provinsi --</option>
                                <?php $__currentLoopData = $kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  --}}
                                    <option value="<?php echo e($data->provinsi_id); ?>"><?php echo e($data->provinsi->nama_provinsi); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
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
<?php /**PATH D:\Teknologi Informasi\Tugas Akhir\PROJECT\SirajaProject\resources\views/superadmin/masterdata/wilayah/add-kabupaten.blade.php ENDPATH**/ ?>