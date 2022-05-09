<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ValidasiPrajuruDesa extends Model
{
    use HasFactory;

    protected $table = 'tb_validasi_prajuru_desa';
    protected $primaryKey = 'validasi_prajuru_desa_id';

    protected $fillable = [
        'surat_keluar_id', 'prajuru_desa_adat_id', 'validasi',
    ];

    public function suratkeluar()
    {
        return $this->belongsTo(SuratKeluar::class, 'surat_keluar_id', 'surat_keluar_id');
    }

    public function prajurudesaadat()
    {
        return $this->belongsTo(PrajuruDesaAdat::class, 'prajuru_desa_adat_id', 'prajuru_desa_adat_id');
    }

    public function TambahDataValidasiPrajuru($data) {
        DB::table('tb_validasi_prajuru_desa')
        ->insert($data);
    }

    public function EditDataValidasiPrajuru($data, $id, $id_lama) {
        DB::table('tb_validasi_prajuru_desa')
            ->where('surat_keluar_id', $id)
            ->where('prajuru_desa_adat_id', $id_lama)
            ->update($data);
    }
}
