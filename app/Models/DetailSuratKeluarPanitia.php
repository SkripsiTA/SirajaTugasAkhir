<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSuratKeluarPanitia extends Model
{
    use HasFactory;

    protected $table = 'tb_detail_surat_keluar_panitia';
    protected $primaryKey = 'detail_surat_keluar_panitia_id';

    protected $fillable = [
        'surat_keluar_id', 'tim_kegiatan', 'ketua_panitia_id',
        'sekretaris_panitia_id', 'bendesa_id',
    ];

    public function suratkeluar()
    {
        return $this->belongsTo(SuratKeluar::class, 'surat_keluar_id', 'surat_keluar_id');
    }

    public function ketuapanitia()
    {
        return $this->belongsTo(KramaMipil::class, 'ketua_panitia_id', 'krama_mipil_id');
    }

    public function sekretarispanitia()
    {
        return $this->belongsTo(KramaMipil::class, 'sekretaris_panitia_id', 'krama_mipil_id');
    }

    public function bendesa()
    {
        return $this->belongsTo(PrajuruDesaAdat::class, 'bendesa_id', 'prajuru_desa_adat_id');
    }
}
