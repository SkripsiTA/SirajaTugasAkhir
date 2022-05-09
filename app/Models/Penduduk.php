<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTimeInterface;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'tb_penduduk';
    protected $primaryKey = 'penduduk_id';

    protected $fillable = [
        'nomor_induk_cacah_krama', 'profesi_id', 'agama', 'nik', 'gelar_depan', 'nama', 'gelar_belakang',
        'nama_alias', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'golongan_darah', 'alamat', 'tanggal_kematian',
        'status_perkawinan', 'pendidikan_terakhir', 'ayah_kandung_id', 'ibu_kandung_id',
    ];

    protected $dates = ['tanggal_lahir'];

    public function user()
    {
        return $this->hasMany(User::class, 'penduduk_id', 'penduduk_id');
    }

    public function cacahkramamipil()
    {
        return $this->hasOne(CacahKramaMipil::class);
    }

    public function ayahkandung()
    {
        return $this->belongsTo(Penduduk::class, 'ayah_kandung_id', 'penduduk_id');
    }

    public function ibukandung()
    {
        return $this->belongsTo(Penduduk::class, 'ibu_kandung_id', 'penduduk_id');
    }

    public function profesi()
    {
        return $this->belongsTo(Profesi::class, 'profesi_id', 'profesi_id');
    }
}
