<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TembusanSuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'tb_tembusan_surat_keluar';
    protected $primaryKey = 'tembusan_id';

    protected $fillable = [
        'rincian_pihak', 'desa_adat_id', 'banjar_adat_id', 'surat_keluar_id',
    ];

    public function desaadat()
    {
        return $this->belongsTo(DesaAdat::class, 'desa_adat_id', 'desa_adat_id');
    }

    public function banjaradat()
    {
        return $this->belongsTo(BanjarAdat::class, 'banjar_adat_id', 'banjar_adat_id');
    }

    public function suratkeluar()
    {
        return $this->belongsTo(SuratKeluar::class, 'surat_keluar_id', 'surat_keluar_id');
    }
}
