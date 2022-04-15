<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'tb_surat_keluar';
    protected $primaryKey = 'surat_keluar_id';

    protected $fillable = [
        'master_surat_id', 'desa_adat_id', 'tanggal_keluar', 'nomor_surat', 'parindikan', 'pamahbah_surat',
        'daging_surat', 'pamuput_surat', 'tanggal_kegiatan_mulai', 'tanggal_kegiatan_berakhir', 'busana', 'tempat_kegiatan', 'waktu_kegiatan_mulai',
        'waktu_kegiatan_selesai', 'tim_kegiatan', 'file', 'lampiran', 'tanggal_surat', 'status', 'pihak_penerima', 'tumusan'
    ];

    protected $dates = ['tanggal_keluar', 'tanggal_surat', 'tanggal_kegiatan_mulai', 'tanggal_kegiatan_berakhir', 'created_at', 'updated_at'];

    public function nomorsurat()
    {
        return $this->belongsTo(NomorSurat::class, 'master_surat_id', 'master_surat_id');
    }

    public function desaadat()
    {
        return $this->belongsTo(DesaAdat::class, 'desa_adat_id', 'desa_adat_id');
    }

    public function detailsuratkeluar()
    {
        return $this->hasMany(DetailSuratKeluar::class);
    }

    public function detailsuratkeluarpanitia()
    {
        return $this->hasMany(DetailSuratKeluarPanitia::class, 'surat_keluar_id', 'surat_keluar_id');
    }

    public function tembusansuratkeluar()
    {
        return $this->hasMany(TembusanSuratKeluar::class);
    }

    public function validasipanitia()
    {
        return $this->hasMany(ValidasiPanitia::class, 'surat_keluar_id', 'surat_keluar_id');
    }

    public function validasiprajurudesa()
    {
        return $this->hasMany(ValidasiPrajuruDesa::class, 'surat_keluar_id', 'surat_keluar_id');
    }
}

