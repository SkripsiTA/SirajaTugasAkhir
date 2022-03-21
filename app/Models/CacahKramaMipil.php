<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CacahKramaMipil extends Model
{
    use HasFactory;

    protected $table = 'tb_cacah_krama_mipil';
    protected $primaryKey = 'cacah_krama_mipil_id';

    protected $fillable = [
        'nomor_cacah_krama_mipil', 'banjar_adat_id', 'penduduk_id', 'jenis_kependudukan', 'status',
    ];

    public function kramamipil()
    {
        return $this->hasOne(KramaMipil::class);
    }

    public function banjaradat()
    {
        return $this->belongsTo(BanjarAdat::class, 'banjar_adat_id', 'banjar_adat_id');
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id', 'penduduk_id');
    }
}
