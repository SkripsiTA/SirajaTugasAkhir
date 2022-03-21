<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'tb_m_kecamatan';
    protected $primaryKey = 'kecamatan_id';

    protected $fillable = [
        'kecamatan_id', 'kabupaten_id', 'name',
    ];

    public function desaadat()
    {
        return $this->hasMany(DesaAdat::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id', 'kabupaten_id');
    }
}
