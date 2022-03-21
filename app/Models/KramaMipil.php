<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KramaMipil extends Model
{
    use HasFactory;

    protected $table = 'tb_krama_mipil';
    protected $primaryKey = 'krama_mipil_id';

    protected $fillable = [
        'nomor_krama_mipil', 'banjar_adat_id', 'cacah_krama_mipil_id', 'status', 'alasan_perubahan', 'tanggal_registrasi',
    ];

    public function prajurudesaadat()
    {
        return $this->hasOne(PrajuruDesaAdat::class);
    }

    public function banjaradat()
    {
        return $this->belongsTo(BanjarAdat::class, 'banjar_adat_id', 'banjar_adat_id');
    }

    public function cacahkramamipil()
    {
        return $this->belongsTo(CacahKramaMipil::class, 'cacah_krama_mipil_id', 'cacah_krama_mipil_id');
    }

    public function prajurubanjaradat()
    {
        return $this->hasOne(PrajuruBanjarAdat::class);
    }
}
