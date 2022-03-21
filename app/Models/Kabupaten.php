<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'tb_m_kabupaten';
    protected $primaryKey = 'kabupaten_id';

    protected $fillable = [
        'kabupaten_id', 'provinsi_id', 'name'
    ];

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'provinsi_id');
    }
}
