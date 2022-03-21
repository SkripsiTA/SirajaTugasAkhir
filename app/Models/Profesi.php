<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    use HasFactory;

    protected $table = 'tb_m_profesi';
    protected $primaryKey = 'profesi_id';

    protected $fillable = [
        'profesi',
    ];

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
