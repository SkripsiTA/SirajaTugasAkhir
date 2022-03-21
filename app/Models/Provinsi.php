<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'tb_m_provinsi';
    protected $primaryKey = 'provinsi_id';

    protected $fillable = [
        'provinsi_id', 'name',
    ];

    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class);
    }
}
