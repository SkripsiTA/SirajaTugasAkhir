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
        'master_surat_id', 'desa_adat_id', 'tanggal_keluar', 'nomor_surat', 'parindikan', 'daging_surat',
        'tanggal_kegiatan', 'busana', 'tempat_kegiatan', 'waktu_kegiatan', 'file', 'lampiran',
        'tanggal_surat', 'status', 'pihak_penerima',
    ];

    protected $dates = ['tanggal_keluar', 'tanggal_kegiatan', 'tanggal_surat'];

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
}

