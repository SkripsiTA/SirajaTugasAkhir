<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanjarAdat extends Model
{
    use HasFactory;

    protected $table = 'tb_m_banjar_adat';
    protected $primaryKey = 'banjar_adat_id';

    protected $fillable = [
        'desa_adat_id', 'kode_banjar_adat', 'nama_banjar_adat',
    ];

    public function kramamipil()
    {
        return $this->hasMany(KramaMipil::class);
    }

    public function desaadat()
    {
        return $this->belongsTo(DesaAdat::class, 'desa_adat_id', 'desa_adat_id');
    }

    public function cacahkramamipil()
    {
        return $this->hasMany(CacahKramaMipil::class);
    }

    public function prajurubanjaradat()
    {
        return $this->hasMany(PrajuruBanjarAdat::class);
    }

    public function tembusansuratkeluar()
    {
        return $this->hasMany(TembusanSuratKeluar::class);
    }
}
