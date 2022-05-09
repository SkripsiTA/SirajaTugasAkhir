<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTimeInterface;

class PrajuruBanjarAdat extends Model
{
    use HasFactory;

    protected $table = 'tb_prajuru_banjar_adat';
    protected $primaryKey = 'prajuru_banjar_adat_id';

    protected $fillable = [
        'banjar_adat_id', 'krama_mipil_id', 'jabatan', 'status_prajuru_banjar_adat', 'tanggal_mulai_menjabat', 'tanggal_akhir_menjabat',
    ];

    protected $dates = ['tanggal_mulai_menjabat', 'tanggal_akhir_menjabat'];
    public function banjaradat()
    {
        return $this->belongsTo(BanjarAdat::class, 'banjar_adat_id', 'banjar_adat_id');
    }

    public function kramamipil()
    {
        return $this->belongsTo(KramaMipil::class, 'krama_mipil_id', 'krama_mipil_id');
    }

    protected function serializeDate(DateTimeInterface $date){
        return $date->format('d-M-Y');
      }

      public function AddPrajuruBanjarAdat($data) {
        DB::table('tb_prajuru_banjar_adat')->insert($data);
      }

      public function EditPrajuruBanjarAdat($id, $data) {
        DB::table('tb_prajuru_banjar_adat')
        ->where('prajuru_banjar_adat_id', $id)
        ->update($data);
      }

      public function HapusPrajuruBanjarAdat($id) {
        DB::table('tb_prajuru_banjar_adat')
        ->where('prajuru_banjar_adat_id', $id)
        ->delete();
      }

}
