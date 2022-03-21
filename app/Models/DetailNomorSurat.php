<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailNomorSurat extends Model
{
    use HasFactory;

    protected $table = 'tb_detail_master_surat';
    protected $primaryKey = 'detail_master_surat_id';

    protected $fillable = [
        'kode_detail_surat', 'keterangan', 'master_surat_id',
    ];
}
