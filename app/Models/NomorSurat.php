<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomorSurat extends Model
{
    use HasFactory;

    protected $table = 'tb_master_surat';
    protected $primaryKey = 'master_surat_id';

    protected $fillable = [
        'kode_nomor_surat', 'keterangan',
    ];
}
