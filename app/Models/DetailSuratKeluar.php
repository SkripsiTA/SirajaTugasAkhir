<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'tb_detail_surat_keluar';
    protected $primaryKey = 'detail_surat_keluar_id';

    protected $fillable = [
        'surat_keluar_id', 'penyarikan_id', 'bendesa_id',
    ];

    public function suratkeluar()
    {
        return $this->belongsTo(SuratKeluar::class, 'surat_keluar_id', 'surat_keluar_id');
    }

    public function penyarikan()
    {
        return $this->belongsTo(PrajuruDesaAdat::class, 'penyarikan_id', 'prajuru_desa_adat_id');
    }

    public function bendesa()
    {
        return $this->belongsTo(PrajuruDesaAdat::class, 'bendesa_id', 'prajuru_desa_adat_id');
    }
}
