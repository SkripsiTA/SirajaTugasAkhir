<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrajuruDesaAdat extends Model
{
    use HasFactory;

    protected $table = 'tb_prajuru_desa_adat';
    protected $primaryKey = 'prajuru_desa_adat_id';

    protected $fillable = [
        'desa_adat_id', 'krama_mipil_id', 'jabatan', 'status_prajuru_desa_adat', 'tanggal_mulai_menjabat', 'tanggal_akhir_menjabat',
    ];

    protected $dates = ['tanggal_mulai_menjabat', 'tanggal_akhir_menjabat'];

    public function desaadat()
    {
        return $this->belongsTo(DesaAdat::class, 'desa_adat_id', 'desa_adat_id');
    }

    public function kramamipil()
    {
        return $this->belongsTo(KramaMipil::class, 'krama_mipil_id', 'krama_mipil_id');
    }
}
