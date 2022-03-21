@foreach($desa as $data)
<div class="modal fade" id="#edit{{ $data->desa_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Desa {{ $data->nama_desa }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="#" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body">
                {{-- Error Alert --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Inputan yang anda berikan salah!<br><br>
                    </div>
                @endif
                <div class="pl-lg-12">
                    <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Kode Desa</label>
                            <input type="text" id="input-kode" class="form-control" placeholder="Kode Desa" name="desa_id" value="{{$data->desa_id}}">
                            <div class="text-danger">
                                @error('desa_id')
                                  {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                        <label class="form-control-label" for="input-email">Nama Desa</label>
                        <input type="text" id="input-nama" class="form-control" placeholder="Nama Desa" name="nama_desa" value="{{$data->nama_desa}}">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Kecamatan</label>
                            <select name="kecamatan_id" class="form-control" id="exampleFormControlSelect1" value="{{$data->kecamatan->nama_kecamatan}}">
                                <option value="">-- Pilih Kecamatan --</option>
                                @foreach ($kec as $data)
                                    <option value="{{ $data->kecamatan_id }}">{{ $data->nama_kecamatan }}</option>
                                @endforeach
                                {{--  <option value="we">Tapan</option>
                                <option value="qw">Toraja</option>  --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Status Desa</label>
                            <select name="status_desa" class="form-control" id="exampleFormControlSelect2" value="{{$data->status_desa}}">
                                <option value="">-- Pilih Status Desa --</option>
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Jenis Desa</label>
                        <select name="desa_jenis" class="form-control" id="exampleFormControlSelect3" value="{{$data->desa_jenis}}">
                            <option value="">-- Pilih Jenis Desa --</option>
                            <option value="desa">Desa</option>
                            <option value="kelurahan">Kelurahan</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Alamat</label>
                        <textarea type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat" name="alamat_desa" value="{{$data->alamat_kantor_desa}}"></textarea>
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
@endforeach

