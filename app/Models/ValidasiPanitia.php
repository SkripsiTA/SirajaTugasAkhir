<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidasiPanitia extends Model
{
    use HasFactory;

    protected $table = 'tb_validasi_panitia';
    protected $primaryKey = 'validasi_panitia_id';

    protected $fillable = [
        'surat_keluar_id', 'krama_mipil_id', 'validasi',
    ];

    public function suratkeluar()
    {
        return $this->belongsTo(SuratKeluar::class, 'surat_keluar_id', 'surat_keluar_id');
    }

    public function kramamipil()
    {
        return $this->belongsTo(KramaMipil::class, 'krama_mipil_id', 'krama_mipil_id');
    }
}
