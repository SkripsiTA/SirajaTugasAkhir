<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesaAdat extends Model
{
    use HasFactory;

    protected $table = 'tb_m_desa_adat';
    protected $primaryKey = 'desa_adat_id';

    protected $fillable = [
        'desa_adat_id', 'desadat_nama', 'desadat_kode','desadat_kode_surat', 'desadat_kantor_long', 'desadat_kantor_lat', 'desadat_kode_pos', 'desadat_nomor_register', 'desadat_status_register',
        'desadat_alamat_kantor', 'desadat_telpon_kantor', 'desadat_fax_kantor', 'desadat_email', 'desadat_web', 'desadat_luas',
        'desadat_sejarah', 'desadat_file_struktur_pem', 'desadat_logo', 'desadat_aksara_bali', 'desadat_wa_kontak_1', 'kecamatan_id', 'desadat_sebutan_pemimpin',
        'desadat_status_aktif', 'desadat_keterangan',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'kecamatan_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'desa_adat_id', 'desa_adat_id');
    }

    public function prajurudesaadat()
    {
        return $this->hasMany(PrajuruDesaAdat::class, 'desa_adat_id', 'desa_adat_id');
    }

    public function banjaradat()
    {
        return $this->hasMany(BanjarAdat::class);
    }

    public function suratkeluar()
    {
        return $this->hasMany(SuratKeluar::class);
    }

    public function tembusansuratkeluar()
    {
        return $this->hasMany(TembusanSuratKeluar::class);
    }

    public function nomorsurat()
    {
        return $this->hasMany(NomorSurat::class);
    }

    public function suratmasuk()
    {
        return $this->hasMany(SuratMasuk::class);
    }
}
