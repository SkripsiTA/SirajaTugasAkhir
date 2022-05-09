<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTimeInterface;

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

    public function detailsuratkeluar()
    {
        return $this->hasMany(DetailSuratKeluar::class);
    }

    public function detailsuratkeluarpanitia()
    {
        return $this->hasMany(DetailSuratKeluarPanitia::class);
    }

    public function suratmasuk()
    {
        return $this->hasMany(SuratMasuk::class);
    }

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('d-M-Y');
      }

      public function AddPrajuruDesaAdat($data) {
        DB::table('tb_prajuru_desa_adat')->insert($data);
      }

      public function HapusPrajuruDesaAdat($id) {
        DB::table('tb_prajuru_desa_adat')
        ->where('prajuru_desa_adat_id', $id)
        ->delete();
      }

      public function EditPrajuruDesaAdat($id, $data) {
        DB::table('tb_prajuru_desa_adat')
        ->where('prajuru_desa_adat_id', $id)
        ->update($data);
      }
}
