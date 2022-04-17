<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'tb_surat_masuk';
    protected $primaryKey = 'surat_masuk_id';

    protected $fillable = [
        'nomor_surat', 'perihal', 'asal_surat', 'tanggal_surat', 'tanggal_diterima', 'tanggal_kegiatan_mulai',
        'tanggal_kegiatan_berakhir', 'waktu_kegiatan_mulai', 'waktu_kegiatan_selesai',
        'master_surat_id', 'file', 'prajuru_desa_adat_id', 'desa_adat_id',
    ];

    protected $dates = ['tanggal_surat', 'tanggal_diterima', 'tanggal_kegiatan_mulai', 'tanggal_kegiatan_berakhir'];

    public function nomorsurat()
    {
        return $this->belongsTo(NomorSurat::class, 'master_surat_id', 'master_surat_id');
    }

    public function desaadat()
    {
        return $this->belongsTo(DesaAdat::class, 'desa_adat_id', 'desa_adat_id');
    }

    public function prajurudesaadat()
    {
        return $this->belongsTo(PrajuruDesaAdat::class, 'prajuru_desa_adat_id', 'prajuru_desa_adat_id');
    }
}
