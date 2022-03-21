<div class="modal fade" id="exampleModalAddProvinsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Provinsi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="/add-provinsi" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="modal-body">
                <div class="pl-lg-12">
                    <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label" for="input-username">Kode Provinsi</label>
                        <input type="text" id="input-kode" class="form-control" placeholder="Kode Provinsi" name="provinsi_id">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                        <label class="form-control-label" for="input-email">Nama Provinsi</label>
                        <input type="text" id="input-nama" class="form-control" placeholder="Nama Provinsi" name="nama_provinsi">
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
<?php /**PATH D:\Teknologi Informasi\Tugas Akhir\PROJECT\SirajaProject\resources\views/superadmin/masterdata/wilayah/add-provinsi.blade.php ENDPATH**/ ?>