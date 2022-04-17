<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomorSurat extends Model
{
    use HasFactory;

    protected $table = 'tb_master_surat';
    protected $primaryKey = 'master_surat_id';

    protected $fillable = [
        'kode_nomor_surat', 'keterangan', 'desa_adat_id',
    ];

    public function suratkeluar()
    {
        return $this->hasMany(SuratKeluar::class, 'surat_keluar_id', 'surat_keluar_id')->latest();
    }

    public function desaadat()
    {
        return $this->belongsTo(DesaAdat::class, 'desa_adat_id', 'desa_adat_id');
    }

    public function suratmasuk()
    {
        return $this->hasMany(SuratMasuk::class);
    }
}
